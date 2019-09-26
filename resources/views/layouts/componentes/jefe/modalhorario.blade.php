
<!-- Modal para edicion de datos -->


  <div class="modal fade" id="modalHorario">
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
            <ul>
                @foreach ($project->horarioProyecto as $entrada)
                              
                    <li>
                        {{ $entrada->dia }} <br> DE {{ $entrada->hora }} - {{ $entrada->salida }} 
                    </li>

                @endforeach
            </ul>

        </div>

            <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>

