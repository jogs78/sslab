<div class="centerblock">
		<h2>Seleccionar</h2>
    	<p>Seleccionar para ver informacion sobre el proyecto</p>  
    	<input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    	<br>
      @empty ($users)
          <p>Sin usuarios</p>
      @else
   		<ul class="list-group" id="myList">
         @forelse ($users as $user)
    		<li class="list-group-item border-secondary">	
       
          <a href="#" class="list-group-item bg-light text-dark" data-toggle="modal" data-target="#modalVeravances" title="Seleccionar">
      				<?= isset(
                $user->toArray()
                  ['proyecto_prestador']['titulo']) 
                ? 
                $user->toArray()
                  ['proyecto_prestador']['titulo'] 
                  : "---" 
              ?>

      		</a>
                 @include('layouts.componentes.jefe.modalavances')
	  		</li>
        @empty
        @endforelse
      </ul>  
      @endempty
	</div>