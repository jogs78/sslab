<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Horario;
use App\Models\Proyecto;
use App\Models\Prestador;
use App\Models\Asistencia;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ResponsableController extends Controller
{

    public function __construct()
    {
        $this->middleware('auxiliar');
    }
	public function homes(){

        $user = Auth::User();//->with('proyectoPrestador')->get();
        $projects = Proyecto::all();    

        $responsables = User::where('tipo_usuario', User::USUARIO_RESPONSABLE)->get();

        $prestadores = User::where('tipo_usuario', User::USUARIO_PRESTADOR)->get();

        $horarios = Horario::all();


		return view('Responsable.homes', compact('user', 'projects', 'responsables', 'prestadores', 'horarios'));
	}
	
    //Modificar calendario - GET

    public function mostrar_calendario(Proyecto $proyecto){


        if(request()->ajax()){

            //Carga las relaciones definidas del proyecto

            $proyecto->load('horarioProyecto');                         

            return response()->json([

                'data' => $proyecto,

            ], 200);
        }
    }

    //inserciones grid control de asistencias

    public function guardarasistencias(Request $request){
        /*
            Modificar de acuerdo a la estructura del archivo generador por el rfid 
            Suponiendo que el archivo tiene la siguiente estructura
            idPrestador, FechaRealización (AAAA-MM-DD), Hora de Entrada (H:m:s), Hora de Salida(H:m:s)
        */

        $this->validate($request, [
            'logRFID' => 'required|file|mimes:txt|mimetypes:text/plain'
        ]);

        $asistenciasRFID = File::get($request->logRFID);
        /*
            $input = Input::all();
            File::get($input['logRFID']);
        */

        /*  Crea un array usando el delimitador salto de línea y luego se crea una colección del array
        */
        $asistenciasRFID = collect(explode("\n", $asistenciasRFID))
            /*Remueve elemento si no tiene 4 elementos (id, fecha, horaen, horasal) o si no cumple con las validaciones*/
            ->reject(function ($item, $key) {
                $item = explode("|", $item);
                $validarCampos = Validator::make($item, [
                    '0' => 'bail|required|exists:proyecto,prestador', 
                    '1' => 'bail|required|date_format:Y-m-d', 
                    '2' => 'bail|required|date_format:H:i:s', 
                    '3' => 'bail|required|date_format:H:i:s', 
                ]);
                return count($item) < 4 || !$validarCampos->passes();
            })
            /*Transforma/Formatea la colección*/
            ->transform(function ($item, $key) {
                $item = explode("|", $item);
                return [
                    'proyecto_id' => Prestador::find($item[0])->proyecto->id,
                    'fecha_relizado' => $item[1],
                    'hora_llegada' => $item[2],
                    'hora_salida' => $item[3],
                    'horas_realizadas' => intval(date_diff( 
                                date_create("$item[1] $item[2]"), 
                                date_create("$item[1] $item[3]")
                            )->format("%H")),
                    'validar' => 1,
                ];
            });
        
        /*Obtiene las asistencias cuyo proyecto_id esté contenido en asistenciasRFID(se obtienen los proyecto_ids, se quitan las repeticiones y se convierte en un array de ids)*/
        $asistenciasRealizadas = Asistencia::whereIn('proyecto_id', $asistenciasRFID->pluck('proyecto_id')->unique()->toArray())->get();
        /*
            Remueve de la colección $asisteciasRFID aquellas asistencias que ya esten insertadas, se hace mediante la comparación de los atributos proyecto_id y fecha_realizado entre las asistencias ya insertadas ($asistenciasRealizadas) y las que vienen en el txt ($asistenciasRFID)
        */
        $asistenciasAInsetar = $asistenciasRFID->reject(function ($item, $key) use($asistenciasRealizadas) {
                return $asistenciasRealizadas->contains(function ($value, $key) use ($item){
                    return $value->proyecto_id == $item['proyecto_id'] && $value->fecha_relizado == $item['fecha_relizado'] && $value->hora_llegada == $item['hora_llegada'] && $value->hora_salida == $item['hora_salida'] ;
                });
                /*
                $asistenciasRealizadas::where('proyecto_id', $item->proyecto_id)->where('fecha_relizado', $item->fecha_relizado)->get()->isEmpty();
                */
            });
        
        Asistencia::insert($asistenciasAInsetar->toArray());

        if($request->ajax()){
            return response()->json([
                'message' =>  'asistencias agregadas.'
            ], 201);
        }
    }
    
    public function validarAsistencia(Request $request, Asistencia $asistencia){

        $this->validate($request, [
            //'fecha_relizado' => 'required|date_format:Y-m-d',
            
            'horas_realizadas' => 'required|numeric',

            'observaciones' => 'nullable|sometimes|required|string',
        ]);

        //$asistencia = $proyecto->asistenciasProyecto->where('fecha_relizado', $request->fecha_relizado)->first();
        /*
            Otra manera de obtener la asitencia
            $asistencia = Asistencia::where('fecha_relizado', $request->fecha_relizado)->where('proyecto_id', $proyecto->id)->first();

        */
        /*
        if($asistencia == null){
            throw new HttpException(404, 'La asistencia no existe');
        }
        */

        $campos = $request->only([
            //'fecha_relizado',
            'horas_realizadas',
            'observaciones',
        ]);
        
        $campos['validar'] = 0;
        /*
            ¿Qué operación se debería de hacer con el campo horas_relizadas?
            -> $campos['horas_realizadas'] o $request->horas_realizadas es lo que se manda desde la vista
            -> $asistencia->horas_realizadas contiene las horas realizadas según la lectura del RFID
            Si no se hace cambio a $campos['horas_realizadas'] reemplazará el valor en $asitencia->horas_realizadas
        */
        //$campos['horas_realizadas'] = La operación que desee hacer;
        
        $asistencia->fill($campos);

        $asistencia->save();

        return response()->json([

            'data' => $asistencia,

            'message' =>  'Asistencia verificada.'

        ], 201);
    }

    public function registrarIncidencia(Request $request, Proyecto $proyecto){

        $this->validate($request, [
            'fecha' => 'required|date_format:Y-m-d',

            'justificada' => 'required|in:0,1',

            'observaciones' => 'nullable|sometimes|required|string',
        ]);

        $campos = $request->only([
            'fecha',
            'justificada',
            'observaciones',
        ]);

        $incidencia = new Incidencia($campos);

        $proyecto->incidenciasProyecto()->save($incidencia);

        return response()->json([

            'data' => $incidencia,

            'message' =>  'Incidencia registrada.'

        ], 201);
    }

    public function verHoras(Request $request, Proyecto $proyecto){

        $asistencias = $proyecto->asistenciasProyecto;
        $incidencias = $proyecto->incidenciasProyecto; 
        $faltas = $incidencias->where('justificada', 0);
        $permisos = $incidencias->where('justificada', 1);

        return response()->json([

            'data' => [
                    'asistencias' => $asistencias,
                    'faltas' => $faltas,
                    'permisos' => $permisos,
                    'incidencias'=> $incidencias
            ],

            'message' =>  'Success.'

        ], 200);
    }

}	