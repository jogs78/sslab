<div class="centerblock">
        <h4>Seleccionar para ver avance del proyecto</h4>
        <br>
 <!-- <input class="form-control" id="myInput" type="text" placeholder="Buscar.."> 
  <br>--->
    @empty ($projects)
            <p>Sin usuarios</p>
    @else


@forelse ($projects as $index => $project)
<div class="accordion" id="accordion">
  <div class="card">
     <div id="myDIV">
          
    <div class="card-header" id="myCard" >
      <h2 class="mb-0">
        <button class="btn" type="button" data-toggle="collapse" data-target="#collapse-{{ $index }}" aria-expanded="true" aria-controls="collapseOne">
          {{$project->titulo}}
        </button>
      </h2>
    </div>
     </div>

    <div id="collapse-{{ $index }}" class="collapse hide" aria-labelledby="headingOne">
      <div class="card-body">
          <div class="row">
          <div class="col-4" align="left">
                <button class="btn btn-success btn-lg" data-proyectoId="{{ $project->id }}" name="btnMostrarModalCalendario"  href="#">Calendario</button>
          </div>   
          <div class="col-4" align="center">
               <a class="btn btn-success btn-lg" data-proyectoId="{{ $project->id }}" name="btnMostrarModalHorarioRevisor" href="#">Horario</a>
          </div>   
          <div class="col-4"align="right">
               
               <a class="btn btn-success btn-lg" name="avancePdf" href="{!! route('avanceToPDF', ['proyecto' => $project->id]) !!}">Avance</a>
          </div>   
          </div>
                 @include('layouts.componentes.revisor.modalesrev')
               
      </div>
    </div>
  </div>
</div>
        @empty
    @endforelse
        @endempty
</div>




