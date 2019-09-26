<!-- Modal para elementos en "Ver avances " -->
  <div class="modal fade" id="modalVeravances">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Estado</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div class="progress">
              <div class="progress-bar bg-success" style="width:10%"></div>
          </div>
          <br>
          <input type="text" hidden="" id="idpersona" name="">
          <h6>Proyecto:</h6>
          <label type="text" name="" id="nproyectoa" class="form-control input-sm">
            <?= isset($user->proyectoPrestador->titulo) 
                ? 
                $user->proyectoPrestador->titulo 
                : "---" 
            ?>
          </label>
          <h6>Horas a cubrir:</h6>
          <label type="text" name="" id="hcubrira" class="form-control input-sm">
                <?= isset($user->proyectoPrestador->horas_cubrir) 
                    ? 
                    $user->proyectoPrestador->horas_cubrir 
                    : "---" 
                ?>              
          </label>
          <h6>Responsable:</h6>
          <label type="text" name="" id="responsablea" class="form-control input-sm">
              <?= isset($user->toArray()
                  ['proyecto_prestador']['responsable']) 
                ?   
                App\Models\User::find( $user->toArray()
                  ['proyecto_prestador']['responsable'])->nombre
                  : "---" 
              ?>      
              <?= isset($user->toArray()
                  ['proyecto_prestador']['responsable']) 
                ?   
                App\Models\User::find( $user->toArray()
                  ['proyecto_prestador']['responsable'])->apellido
                  : "---" 
              ?>             
          </label>
          <h6>Horario:</h6>
          <label type="text" name="" id="horarioa" class="form-control input-sm">
            <?= 
                isset($user->horarioPrestador->dia) 
                ? 
                $user->horarioPrestador->dia
                : "---"
            ?>
            <?php echo " / "; ?>
            <?= 
                isset($user->horarioPrestador->horaentrada) 
                ? 
                $user->horarioPrestador->horaentrada
                : "---"
            ?>
            <?php echo " a "; ?>
            <?= 
                isset($user->horarioPrestador->horasalida) 
                ? 
                $user->horarioPrestador->horasalida
                : "---"
            ?>
            
          </label>
          <h6>Nombre:</h6>
          <label type="text" name="" id="nombrea" class="form-control input-sm">

            <?= isset($user->nombre) 
                ? 
                $user->nombre
                : "---" 
            ?>
                
          </label>
          <h6>Apellido:</h6>
          <label type="text" name="" id="apellidoa" class="form-control input-sm">
            <?= isset($user->apellido) 
                ? 
                $user->apellido
                : "---" 
            ?>
          </label>
          <h6>Correo:</h6>
          <label type="text" name="" id="correoa" class="form-control input-sm">
            <?= isset($user->email) 
                ? 
                $user->email
                : "---" 
            ?>
          </label>
          <h6>Telefono:</h6>
          <label type="text" name="" id="telefonoa" class="form-control input-sm">
            <?= isset($user->telefono) 
                ? 
                $user->telefono 
                : "---" 
            ?>
          </label>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        </div>
        
      </div>
    </div>
  </div>