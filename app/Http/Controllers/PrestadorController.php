<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prestador;
use App\Models\Proyecto;
use App\Models\Horario;
use App\Models\Asistencia;
use App\Models\Incidencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF;

class PrestadorController extends Controller
{

	public function __construct()
	{
		$this->middleware('prestador');
	}
	public function homep(){
	//dd(Prestador::find(Auth::user()->id)->proyecto->id);

		$user = Auth::User();//->with('proyectoPrestador')->get();

		$proyecto = Proyecto::Where('prestador', $user->id)->first();
		//$horario = $user->horarioPrestador->dia." / ".$user->horarioPrestador->horaentrada." ".$user->horarioPrestador->horasalida;
		//$hcubiertas= $user->proyectoPrestador->horas_cubrir - $user->asistenciasPrestador->horas_realizadas;
		//$proyecto = User::with('proyectoPrestador', 'horarioPrestador', 'asistenciasPrestador')->get();
		//dd($user);
		//dd($user->responsableProyecto);
		//dd($proyecto);
		//dd($horario);
		return view('Prestador.homep', compact('user', 'proyecto'));
	}

	//INSERTAR HORAS
	public function insertarAsistencia(Request $request){

		$this->validate($request, [
			'fecha_relizado' => 'required|date_format:Y-m-d',
			'hora_llegada' => 'required|date_format:H',
			'hora_salida' => 'required|date_format:H',
		]);

		$campos = $request->only([
			'fecha_relizado',
			'hora_llegada',
			'hora_salida',
		]);
		//$prestador = Prestador::find( Auth::user()->id)->proyecto->id;

		$campos['proyecto_id'] = Prestador::find(Auth::user()->id)->proyecto->id;

		$campos['validar'] = 1;

		
		$campos['horas_realizadas'] = intval(date_diff( 
			date_create($campos['fecha_relizado'].' '.$campos['hora_llegada']),
			date_create($campos['fecha_relizado'].' '.$campos['hora_salida'])
		)->format("%H"));

		$asistencia= Asistencia::create($campos);

		return response()->json([
			'data' => $asistencia,
			'message' =>  'Asistencia insertada.'
		], 201);
	}


	// PDF
	public function pdf(){
		
		$pdf = PDF::loadView('Prestador.pdf');

		return $pdf->stream('Reporte.pdf');

	}

}
