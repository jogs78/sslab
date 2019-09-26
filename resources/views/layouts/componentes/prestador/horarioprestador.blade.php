
<!-- Modal para mostrar horario -->
	<div class="modal fade" id="modalHorarioPrestador">
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


