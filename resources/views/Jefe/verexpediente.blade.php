@extends('layouts.app')


@section('content')


<!-- Se muestra información del “Prestador”: Nombre del proyecto, periodo, horas acumuladas, actividades, asistencias, faltas, permisos y perfil, así como la opción: “Generar reporte”
-->

<div class="container">
	<div class="centerblok">
		<hr size="5">

            @include('layouts.componentes.jefe.tablaexp')
            @include('layouts.componentes.jefe.modalesexp')
					
		<hr size="5">
	</div>
</div>

@endsection

@section('ubicacion')
INICIO>VER EXPEDIENTES
@endsection
