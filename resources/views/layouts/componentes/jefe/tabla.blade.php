<div class="content">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                    	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
</div>
		
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo" onclick="$('#modalguardar')[0].reset(); app.__vue__.$refs.horario.eliminarCampos();">
				Agregar estadia
		</button>
		<button class="btn btn-primary" data-toggle="modal"  name="btnMostrarModalHorarios">
				Mostrar horarios <!-- data-target="#modalHorarioPrestadores" -->
		</button>
		<br>
		@empty ($projects)
			<p>Sin usuarios</p>
		@else
		<div style="overflow-x: scroll;">
			
			<table class="table table-condensed table-bordered table-hover" border="1" style="width:auto; height:20px;" cellspacing="0" id="tablaj">
				<br>
				<thead class="thead-dark">
					<tr>
					<th scope="col">Proyecto</th>
					<th scope="col">H.cubrir</th>
					<th scope="col">H.cubiertas</th>
					<th scope="col">Auxiliar</th>
					<th scope="col">Horario</th>
					<th scope="col">Nombre</th>
					<th scope="col">Apellido</th>
					<th scope="col">Correo</th>
					<th scope="col">Telefono</th>
					<th scope="col">Control</th>
					<th scope="col">Acciones</th>
				</tr>
				</thead>
				<tbody>
				@forelse ($projects as $project)
					<tr id="trProyecto{{ $project->id }}">
						<td scope="col">
							<?= isset(      
								$project->titulo) 
								? 
								$project->titulo
								: "---" 
							?>
						</td>
						<td scope="col" align="center">
							<?= isset(      
								$project->horas_cubrir) 
								? 
								$project->horas_cubrir
								: "---"  
							?>
						</td>
						<td scope="col" align="center">
							{{$project->horas_cubirtas()}} 
						</td>
						<td scope="col">
							{{$project->responsableProyecto->nombre}} 
						</td>
						<td scope="col" align="center">	
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccionar
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

									<a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalCalendario"  href="#">Calendario</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalHorarioJefe" href="#">Horario</a>
								</div>
							</div>

						</td> 
						<td scope="col">{{  $project->prestadorProyecto->nombre }}</td>
						<td scope="col">{{  $project->prestadorProyecto->apellido }}</td>
						<td scope="col">{{  $project->prestadorProyecto->email }}</td>
						<td scope="col">{{  $project->prestadorProyecto->telefono }}</td>
						<td scope="col">	
							<div class="dropdown">
								<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Seleccionar
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalAsistencias" href="#">Asistencias</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" data-proyectoId="{{ $project->id }}" name="btnMostrarModalFaltas" href="#">Faltas</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item"  data-proyectoId="{{ $project->id }}" name="btnMostrarModalPermisos" href="#">Permisos</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" name="avancePdf" href="{!! route('avanceToPDF', ['proyecto' => $project->id]) !!}">Avance</a>
								</div>
							</div>
						</td>
					<td scope="col">
						<div class="dropdown">
							<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Seleccionar</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
									<button class="dropdown-item glyphicon glyphicon-pencil" data-proyectoId="{{ $project->id }}" name="btnMostrarModalEdicionEstadia">
										<span>Actualizar&nbsp;&nbsp;
											<svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 14 16"><path fill-rule="evenodd" d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"/></svg>
										</span>
									</button>
									<div class="dropdown-divider"></div>
									<form action="{!! route('eliminarestadia', ['project' => $project->id]) !!}" method="POST" name="formEliminar">
			                			{{  method_field('DELETE')    }}
			                			{{  csrf_field()    }}
									<button  name="btnEliminarEstadia" class="dropdown-item glyphicon glyphicon-remove" type="submit">
										<span>Eliminar  &nbsp;&nbsp;
											<svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16"><path fill-rule="evenodd" d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"/></svg>
										</span>
									</button>
									</form>
								</div>
							</div>
						</div>
					</td>
					</tr>
				@empty
				@endforelse
				</tbody>
			</table>
		</div>
		@endempty
		<br>
<div class="center-block">
		<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar estadia
		</button>
</div>