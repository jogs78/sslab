
<div class="center-block">
				<!-- Form permisos --> 
	<form  action="{{ url('/prestador/insertar-asistencia') }}" method="POST" id="formGuardarAsistencia" role="form">
		{{  csrf_field()    }}

		<div class="form-group" align="center">
		<legend>Insertar horario de trabajo</legend>
		<label>Fecha: 
			<input type="date" class="form-control" id="fecha_relizado" min="2015-01-01" max="2025-01-01" name="fecha_relizado" required>
		</label>
		<label>Entrada:
			<input type="time" step="1" class="form-control" id="hora_llegada" name="hora_llegada" list="lista" required>
		</label>
		<label>Salida:
			<input type="time" step="1" class="form-control" id="hora_salida" name="hora_salida"  list="lista" required>
		</label>
		<button type="submit" class="btn btn-primary" id="btnGuardarAsistencias">Guardar</button>
		<button type="button" class="btn btn-danger" >Limpiar</button>
		</div>
	</form>	
	<datalist id="lista">
		<option value="08:00">
		<option value="09:00">
		<option value="10:00">
		<option value="11:00">
		<option value="12:00">
		<option value="13:00">
		<option value="14:00">
		<option value="15:00">
		<option value="16:00">
		<option value="17:00">
		<option value="18:00">
		<option value="19:00">
		<option value="20:00">
	</datalist>
						<!-- Fin permisos-->
</div>