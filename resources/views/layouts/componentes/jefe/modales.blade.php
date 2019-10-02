
	<!-- Modal para registros nuevos -->
	<div class="modal fade" id="modalNuevo">
		<!-- 
	<input type="hidden" name="_token" value="{{  csrf_token()  }}" id="token"> -->
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Agrega nueva estadia</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
						<form action="guardarestadias" method="POST" id="modalguardar" role="form">
								{{  csrf_field()    }}
								<div class="form-group">
										<label>Nombre del proyecto</label>
										<input type="text" name="titulo" class="form-control" placeholder="Escriba el nombre del proyecto" required>
								</div>
								<div class="form-group">
										<label>Horas a cubrir</label>
										<input type="number" name="horas_cubrir" class="form-control" placeholder="Escriba las horas a cubrir" required>
								</div>
								<div class="form-group">
										<label>Responsable</label>
											 <select name="responsable" class="form-control">
														<option>-- Seleccionar --</option>
												@foreach ($responsables as $responsable)
														<option value="{{   $responsable->id  }}" >
																{{  $responsable->nombre  }} 
														</option>
												@endforeach
											 </select>
								</div>
								<div class="form-group">
										<label>Prestador</label>
										<select name="prestador" class="form-control">
														<option>-- Seleccionar --</option>
												@foreach ($prestadores as $prestador)
													@if ($prestador->activo == 1)
														<option  value="{{  $prestador->id    }} ">
															{{  $prestador->numcontrol    }}
															{{	"--"	}}
															{{  $prestador->nombre    }} 
															{{  $prestador->apellido    }} 
														</option>
													@endif
												@endforeach
										</select>
								</div>
								<div class="form-group">
									<label>Horario</label>
									<horario ref="horario"></horario>
								</div>
								<button type="submit" class="btn btn-primary" id="btnGuardarEstadia">Guardar</button>
								<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
						</form>
				</div>
			</div>
		</div>
	</div> 





<!-- Modal para edicion de datos -->

	<div class="modal fade" id="modalEdicion">
		@csrf
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Actualizar datos</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body">
						<form action="{{ url('/jefe') }}" method="POST" role="form" id="formActualizarEstadia">
								{{  method_field('PUT')    }}
								{{  csrf_field()    }}
								<div class="form-group">
										<input type="text" hidden="" id="idpersona" name="">
								</div>
								<div class="form-group">
										<label>Nombre del proyecto</label>
										<input type="text" id="titulo" name="titulo" class="form-control" required>
								</div>
								<div class="form-group">
										<label>Horas a cubrir</label>
										<input type="number" id="horas_cubrir" name="horas_cubrir" class="form-control" required="number">
								</div>
								<div class="form-group">
										<label>Responsable</label>
											 <select name="responsable" class="form-control">
														<option>-- Seleccionar --</option>
												@foreach ($responsables as $responsable)
														<option value="{{   $responsable->id  }}" >
																{{  $responsable->nombre  }} 
														</option>
												@endforeach
											 </select>
								</div>
								<div class="form-group">
										<label>Prestador</label>
											 <select name="prestador" class="form-control">
														<option>-- Seleccionar --</option>
												@foreach ($prestadores as $prestador)
														<option value="{{   $prestador->id  }}" >
																{{  $prestador->nombre  }} 
														</option>
												@endforeach
											 </select>
								</div>
								<div class="form-group">
									<label>Horario</label>
									<horario ref="horarioEditar"></horario>
								</div>
								<br>
								<button type="submit" class="btn btn-primary" id="btnActualizarEstadia">Actualizar</button>
								<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
						</form>
				</div>
			</div>
		</div>
	</div>




<!-- Modal para Calendarios -->
	<div class="modal fade" id="modalCalendario">
		@csrf
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Horarios</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body"> 
					<div id='calendar'></div>
					<form action="{{ url('/jefe') }}" method="GET" role="form" id="formCalendario">
						<!--
						<ul>
								@foreach ($horarios as $horario)
										<li class="border">
												{{ $horario->dia }} DE {{ $horario->hora }} - {{ $horario->salida }} 
										</li>
								@endforeach
						</ul>
						-->
					</form>
				</div>
						<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>



<!-- Modal para mostrar horario -->
	<div class="modal fade" id="modalHorarioJefe">
		@csrf
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Horario</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body"> 
					<form action="{{ url('/proyecto') }}" method="GET" role="form" id="formHorario">
						
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
   			<tr id="horas"></tr>
   		</tbody>
   	</table>
					</form>
				</div>
						<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
			</div>
		</div>
	</div>

	<!-- Modal para mostrar todos los horarios -->
	<div class="modal fade" id="modalHorarioPrestadores">
		@csrf
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Horario de todos</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<!-- Modal body -->
				<div class="modal-body"> 
					<div id='calendar'></div>
					<form action="{{ url('/jefe') }}" method="GET" role="form" id="formCalendario">
						<!--
						<ul>
								@foreach ($horarios as $horario)
										<li class="border">
												{{ $horario->dia }} DE {{ $horario->hora }} - {{ $horario->salida }} 
										</li>
								@endforeach
						</ul>
						-->
					</form>
				</div>
						<button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
			</div>
		</div>




		
	</div>

