<div class="center-block">
				<!-- Form permisos --> 
	<form  action="{{ url('/jefe/proyecto') }}" method="POST" id="formGuardarPermisos" role="form">
		{{  csrf_field()    }}

		<div class="form-group" align="center">

			<label>Fecha: <input type="date" class="form-control" id="fecha" min="2015-01-01" max="2025-01-01" name="fecha" required></label>

			<label>Entrada:<input type="time" format class="form-control" id="entrada" name="entrada" required></label>
			<label>Salida:<input type="time" class="form-control" id="salida" name="salida" required></label>

			<div class="form-group">
				<input type="hidden" class="form-control" id="justificada" name="justificada" value="1" required>
			</div>
			<button type="submit" class="btn btn-primary" id="btnGuardarPermisos">Guardar</button>
			<button type="button" class="btn btn-danger" >Limpiar</button>
		</div>
	</form>	
						<!-- Fin permisos-->
</div>