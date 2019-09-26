
<!-- Modal para edicion de datos -->
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
          <form action="{{ url('/revisor') }}" method="GET" role="form" id="formCalendario">
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
  <div class="modal fade" id="modalHorarioRevisor">
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




