<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Support\Arr;
use PDF;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
	public function avanceToPDF(Request $request, Proyecto $proyecto){
		$prestador = $proyecto->prestadorProyecto;
		$responsable = $proyecto->responsableProyecto;
		$horario = $proyecto->horarioProyecto->groupBy('dia');
		$incidencia = $proyecto->incidenciasProyecto;
		$pdf = PDF::loadView('Prestador.pdf', compact('proyecto', 'responsable', 'prestador', 'horario', 'incidencia'));
		return $pdf->download(str_slug("avance-".$proyecto->titulo."-".now()).".pdf");
	}
	
	// VER HORARIO
	public function mostrar_horario(Request $request, Proyecto $proyecto){
		$dias = collect([
			['nombre' => 'Lunes', 'clave' => 'lunes'],
			['nombre' => 'Martes', 'clave' => 'martes'],
			['nombre' => 'Miércoles', 'clave' => 'miercoles'],
			['nombre' => 'Jueves', 'clave' => 'jueves'],
			['nombre' => 'Viernes', 'clave' => 'viernes']
		]);
		$horario = $proyecto->horarioProyecto
	    		->map(function ($item, $key) use ($dias) {
	    			$item = $item->toArray();
	    			$item['entrada'] = $item['hora'];
	    			$item['claveDia'] = $dias->where('nombre', $item['dia'])->first()['clave'];
	    			return Arr::except($item, ['hora']);
				});
	    	$horario = $horario->groupBy('claveDia');

	    	
	        return response()->json([

	            'data' => $horario,

	        ], 200);
	}
	// VER HORARIO de todos
	public function mostrar_horarios(Request $request, Proyecto $proyecto){
		$dias = collect([
			['nombre' => 'Lunes', 'clave' => 'lunes'],
			['nombre' => 'Martes', 'clave' => 'martes'],
			['nombre' => 'Miércoles', 'clave' => 'miercoles'],
			['nombre' => 'Jueves', 'clave' => 'jueves'],
			['nombre' => 'Viernes', 'clave' => 'viernes']
		]);
		$horario = $proyecto->horarioProyecto
	    		->map(function ($item, $key) use ($dias) {
	    			$item = $item->toArray();
	    			$item['entrada'] = $item['hora'];
	    			$item['claveDia'] = $dias->where('nombre', $item['dia'])->first()['clave'];
	    			return Arr::except($item, ['hora']);
				});
	    	$horario = $horario->groupBy('claveDia');

	    	
	        return response()->json([

	            'data' => $horario,

	        ], 200);
	}

}
