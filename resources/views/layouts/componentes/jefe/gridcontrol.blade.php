
<!-- Modal para "Asistencias " -->
	<div class="modal fade" id="modalAsistencias">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header">
						<h3>Asistencias</h3>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
						<!-- Form Asistencias --> 
						<form method="POST" id="formValAsis" action="{{ url('/jefe/validar-asistencia') }}">
								{{  csrf_field()    }}
								<div class="form-group">
									<label>Asistencia:</label>
									<select id="selectAsistencia" name="selectAsistencia" class="form-control" required="required">
										<option value="">Seleccione la asistencia a validar</option>
									</select>	
								</div>
								<div class="form-group">
									<label>Horas registradas:</label>
									<input type="number" class="form-control" id="horas_registradas" name="horas_registradas" disabled="disabled">
								</div>
								<div class="form-group">
									<label>Horas válidas:</label>
									<input type="number" class="form-control" id="horas_realizadas" name="horas_realizadas" min="0" required>
								</div>
								<div class="form-group">
									<label>Observaciones:</label>
									<textarea class="form-control" name="observaciones"></textarea>
								</div>
								<button type="submit" class="btn btn-primary" id="btnValidarAsistencia">Guardar</button>
								<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
						</form>	
<!-- Fin asistencias -->
			</div>
		</div>
	</div>   
</div>    


<!-- Modal para "Faltas" -->
	<div class="modal fade" id="modalFaltas">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Faltas</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
										<!-- Form Faltas --> 
						<form action="{{ url('/jefe/proyecto') }}" method="POST" id="formGuardarFalta" role="form">
								{{  csrf_field()    }}
								<div class="form-group">
									<label>Fecha:</label>	
									<input type="date" class="form-control" id="fecha" min="2015-01-01" max="2025-01-01" name="fecha" required>
								</div>
								<div class="form-group">
									<label>Observaciones:</label>
									<textarea class="form-control" name="observaciones"></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" class="form-control" id="justificada" name="justificada" value="0" required>
								</div>
								<button type="submit" class="btn btn-primary" id="btnGuardarFaltas">Guardar</button>
								<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
						</form>	
						<!-- Fin Faltas-->
				</div>
		</div>
	</div>     
</div>     


<!-- Modal para "Horas extras" -->
	<div class="modal fade" id="modalHextras">
		<div class="modal-dialog">
			<div class="modal-content">
					 
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Horas extras</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
						<!-- Form Horas Extras --> 
						<form action="" method="POST" id="formGuardarHextras" role="form">
								{{  csrf_field()    }}
								<div class="form-group">
									<label>Fecha:</label>	
									<input type="date" class="form-control" id="fecha" min="2015-01-01" max="2025-01-01" required>
								</div>
								<div class="form-group">
									<label>Horas:</label>
									<input type="number" class="form-control" id="cantidad_horas" min="0" max="6" required>
								</div>
								<button type="submit" class="btn btn-primary" id="btnGuardarHextra">Guardar</button>
								<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
						</form>	
						<!-- Fin horas extras-->
			</div>
		</div>
	</div>   
</div>       


<!-- Modal para "Permisos" -->
	<div class="modal fade" id="modalPermisos">
		<div class="modal-dialog">
			<div class="modal-content">
			
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Permisos</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
										<!-- Form permisos --> 
						<form  action="{{ url('/jefe/proyecto') }}" method="POST" id="formGuardarPermisos" role="form">
								{{  csrf_field()    }}
								<div class="form-group">
									<label>Fecha:</label>	
									<input type="date" class="form-control" id="fecha" min="2015-01-01" max="2025-01-01" name="fecha" required>
								</div>
								<div class="form-group">
									<label>Observaciones:</label>
									<textarea class="form-control" name="observaciones"></textarea>
								</div>
								<div class="form-group">
									<input type="hidden" class="form-control" id="justificada" name="justificada" value="1" required>
								</div>
								<button type="submit" class="btn btn-primary" id="btnGuardarPermisos">Guardar</button>
								<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
						</form>	
						<!-- Fin permisos-->
			</div>
		</div>
	</div>
</div>          






