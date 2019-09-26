

<div class="container">
	<div style="overflow-x:scroll; overflow-wrap:break-word;">
		<h2>Expedientes</h2>

			@empty ($users)
				<p>Sin usuarios</p>
			@else
			<table class="table table-sm table-bordered">
				<br>
				<thead class="thead-dark">

						<tr>
							<th>Proyecto</th>
							<th>Periodo</th>
							<th>H.cubiertas</th>
							<th>Asistencias</th>
							<th>Faltas</th>
							<th>Permisos</th>
							<th>Generar reporte</th>

						</tr>
				</thead>
				<tbody>
					@forelse ($users as $user)
					<tr>
						<td scope="col">
							<?= isset(
								$user->toArray()
									['proyecto_prestador']['titulo']) 
								? 
								$user->toArray()
									['proyecto_prestador']['titulo'] 
									: "---" 
							?>
						</td>
						<td scope="col">
							<?= isset(
								$user->toArray()
									['proyecto_prestador']['periodo']) 
								? 
								$user->toArray()
									['proyecto_prestador']['periodo'] 
									: "---" 
							?>
						</td>
						<td scope="col">
							<?= isset($user->toArray()
									['asistencias_prestador']['horas_realizadas']) 
								? 
								$user->toArray()
									['asistencias_prestador']['horas_realizadas'] 
									: "---" 
							?> 
						</td>
						<td scope="col">
							<?= isset($user->toArray()
									['asistencias_prestador']['horas_realizadas']) 
								? 
								$user->toArray()
									['asistencias_prestador']['horas_realizadas'] 
									: "---" 
							?> 
						</td>
						<td>
							<?= isset($user->toArray()
									['asistencias_prestador']['falta']) 
								? 
								$user->toArray()
									['asistencias_prestador']['falta'] 
									: "---" 
							?> 
						</td>
						<td>
							<?= isset($user->toArray()
									['incidencias_prestador']['justificada']) 
								? 
								$user->toArray()
									['incidencias_prestador']['justificada'] 
									: "---" 
							?> </td>
						<td align="center">
							<button class="btn btn-danger sprite.svg#si-glyph-document-pdf" data-toggle="modal" data-target="#modalEdicion" onclick="agregaform('')">
								<span>
									<svg xmlns="http://www.w3.org/2000/svg" width="12" height="16" viewBox="0 0 12 16"><path fill-rule="evenodd" d="M8.5 1H1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V4.5L8.5 1zM1 2h4a.68.68 0 0 0-.31.2 1.08 1.08 0 0 0-.23.47 4.22 4.22 0 0 0-.09 1.47c.06.609.173 1.211.34 1.8A21.78 21.78 0 0 1 3.6 8.6c-.5 1-.8 1.66-.91 1.84a7.156 7.156 0 0 0-.69.3c-.362.165-.699.38-1 .64V2zm4.42 4.8a5.65 5.65 0 0 0 1.17 2.09c.275.237.595.417.94.53-.64.09-1.23.2-1.81.33-.618.15-1.223.347-1.81.59s.22-.44.61-1.25c.365-.74.67-1.51.91-2.3l-.01.01zM11 14H1.5a.743.743 0 0 1-.17 0 2.12 2.12 0 0 0 .73-.44 10.14 10.14 0 0 0 1.78-2.38c.31-.13.58-.23.81-.31l.42-.14c.45-.13.94-.23 1.44-.33s1-.16 1.48-.2c.447.216.912.394 1.39.53.403.11.814.188 1.23.23h.38V14H11zm0-4.86a3.743 3.743 0 0 0-.64-.28 4.221 4.221 0 0 0-.75-.11c-.411.003-.822.03-1.23.08a3 3 0 0 1-1-.64 6.07 6.07 0 0 1-1.29-2.33c.111-.661.178-1.33.2-2 .02-.25.02-.5 0-.75a1.05 1.05 0 0 0-.2-.88.82.82 0 0 0-.61-.23H8l3 3v4.14z"/></svg>
								</span>
							</button>
						</td>
					</tr>
					@empty
					@endforelse
				</tbody>
			</table>
		@endempty
	</div>
</div>

