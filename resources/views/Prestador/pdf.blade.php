<!DOCTYPE html>
<html>
<head>

	<title>Reporte de avances</title>


	<script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>-->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/octicons/3.5.0/octicons.min.css">

</head>
<body>
	<div align="left">
		<IMG SRC="tecnm.png" width=250 heigth=80 ALIGN=left>
	</div>
		
	<div align="right">
		<IMG SRC="sep.png"  width=250 heigth=200 ALIGN=right>
	</div>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<div align="center">
		<h2>Avance de estadia</h2>
	</div>
	<br>
	<strong>Nombre(s):</strong>&nbsp;  <?= $prestador->nombre; ?> &nbsp; &nbsp; 
	<br>
	<strong>Apellido(s):</strong>&nbsp;  <?= $prestador->apellido; ?>&nbsp;&nbsp; 
	<br>
	<strong>Correo:</strong>&nbsp;  <?= $prestador->email; ?>&nbsp;&nbsp; 
	<br>
	<strong>Telefono:</strong>&nbsp;  <?= $prestador->telefono; ?>
	<br>
	<strong>Proyecto:</strong>&nbsp;  <?= isset($proyecto->titulo) ? $proyecto->titulo: "--/--" ?>
	<br>
	<strong>Responsable:</strong>&nbsp;  {{ $responsable->nombre }}
	<br>
	<strong>Horario</strong>
   	<table class="table table-sm table-bordered">
   		<thead>
   			<tr>
   				<th>Lunes</th>
   				<th>Martes</th>
   				<th>Miércoles</th>
   				<th>Jueves</th>
   				<th>Viernes</th>
   			</tr>
   		</thead>
   		<tbody>
   			<tr>
   				<td>
		   			@isset($horario['Lunes'])
		   				@foreach ($horario['Lunes'] as $horas)
	    					<p>{{ "$horas->hora - $horas->salida" }}</p>
						@endforeach
		   			@endisset
	   			</td>
   				<td>
		   			@isset($horario['Martes'])
		   				@foreach ($horario['Martes'] as $horas)
	    					<p>{{ "$horas->hora - $horas->salida" }}</p>
						@endforeach
		   			@endisset
	   			</td>
   				<td>
		   			@isset($horario['Miércoles'])
		   				@foreach ($horario['Miércoles'] as $horas)
	    					<p>{{ "$horas->hora - $horas->salida" }}</p>
						@endforeach
		   			@endisset
	   			</td>
   				<td>
		   			@isset($horario['Jueves'])
		   				@foreach ($horario['Jueves'] as $horas)
	    					<p>{{ "$horas->hora - $horas->salida" }}</p>
						@endforeach
		   			@endisset
	   			</td>
   				<td>
		   			@isset($horario['Viernes'])
		   				@foreach ($horario['Viernes'] as $horas)
	    					<p>{{ "$horas->hora - $horas->salida" }}</p>
						@endforeach
		   			@endisset
	   			</td>	   				   			
   			</tr>
   		</tbody>
   	</table>

	<strong>Horas a cubrir:</strong>&nbsp;  {{ $proyecto->horas_cubrir }}
	<br>

	<strong>Horas cubiertas:</strong>&nbsp;  {{ $proyecto->horas_cubirtas() }}
	<br>

	<strong>Faltas:</strong>&nbsp;  {{ $proyecto->faltas() }} 
		@if($incidencia->justificada = 1)
			@foreach ($incidencia as $faltas)
				<p>{{	$faltas->fecha	}}{{" - "}}{{	$faltas->observaciones	}}</p> <br>
			@endforeach
		@endif
	<br>

	<strong>Permisos:</strong>&nbsp;  {{ $proyecto->permisos() }}
		@if($incidencia->justificada = 0)
			@foreach ($incidencia as $faltas)
				<p>{{	$faltas->fecha	}}{{" - "}}{{	$faltas->observaciones	}}</p> <br>
			@endforeach
		@endif
	<br>

</body>
</html>