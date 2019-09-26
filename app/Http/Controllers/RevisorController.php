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


class RevisorController extends Controller
{

    public function __construct()
    {
        $this->middleware('revisor');
    }
	public function homev(){

		$user = Auth::User();//->with('proyectoPrestador')->get();

		//obtiene informacion del usuario y proyecto
		//$users = User::where('tipo_usuario', User::USUARIO_PRESTADOR)->with('proyectoPrestador', 'horarioPrestador', 'asistenciasPrestador')->get();
		//dd($users);
		$projects = Proyecto::all();	

		$horarios = Horario::all();
		//dd($projects);
		return view('Revisor.homev', compact('user','projects','horarios'));
		//, compact('users')
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

	//Modificar Horario - GET

	public function horario(Request $request, Proyecto $proyecto){
		$horario = $proyecto->horarioProyecto->groupBy('dia');
		 if($request->ajax()){
				            return response()->json([
	                'data' => $horario,
	                'message' =>  'ok.'
	            ], 200);
		} 
   		return $horario;
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