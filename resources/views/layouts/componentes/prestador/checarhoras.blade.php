
<div class="center-block">
				<!-- Form permisos --> 
	<form  action="{{ url('/prestador/insertar-asistencia') }}" method="POST" id="formGuardarAsistencia" role="form">
		{{  csrf_field()    }}

		<div class="form-group" align="center">
	<legend>Insertar horario de trabajo</legend>

			<label>Fecha: <input type="date" class="form-control" id="fecha_relizado" min="2015-01-01" max="2025-01-01" name="fecha_relizado" required></label>

			<label>Entrada:<input type="time" step="1" class="form-control" id="hora_llegada" name="hora_llegada" required></label>
			<label>Salida:<input type="time" step="1" class="form-control" id="hora_salida" name="hora_salida" required></label>

			<button type="submit" class="btn btn-primary" id="btnGuardarAsistencias">Guardar</button>
			<button type="button" class="btn btn-danger" >Limpiar</button>
		</div>
	</form>	
						<!-- Fin permisos-->
</div>