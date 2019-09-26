@extends('layouts.app')



@section('content')

<!--

<div class="container">

        <hr size="5">



    <h2>    Subir archivo de asistencias</h2>

    <div class="custom-file mb-3">
      <form action="{{ route('guardarasistencias') }}" method="POST" id="formGuardarAsistencia" role="form" enctype="multipart/form-data">
        {{  csrf_field()    }}
        <div class="form-group">
          <input type="file" id="logRFID" name="logRFID" class="custom-file-input" value="Buscar"/>

          <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
        </div>
        <button type="submit" class="btn btn-primary float-right" name="btnCargarArchivo" id="btnCargarAsistencias">Cargar</button>
      </form> 
       <br>
    </div>
</div>
-->

        <div>
            <h2 align="left">Seguimiento de estadias</h2> 
            <h3 align="center">Jefe de laboratorio</h3>
        </div>
        
            <div class="row" style="justify-content: center">
                <strong>Nombre(s):</strong>&nbsp;  <?= $user->nombre; ?> &nbsp; &nbsp; 

                <strong>Apellido(s):</strong>&nbsp;  <?= $user->apellido; ?>&nbsp;&nbsp; 

                <strong>Correo:</strong>&nbsp;  <?= $user->email; ?>&nbsp;&nbsp; 
        
                <strong>Telefono:</strong>&nbsp;  <?= $user->telefono; ?>
            </div>
        
                @include('layouts.componentes.jefe.tabla')

                @include('layouts.componentes.jefe.modales') 

                @include('layouts.componentes.jefe.gridcontrol') 



        <hr size="5">





@endsection



@section('ubicacion')

INICIO

@endsection





@section('scripts')

    <script src="{{ asset('js/jefe/script3_jefe.js') }}"></script>



    <script>
      //console.log(document.getElementById('app').__vue__);
      //console.log(app.__vue__.$refs);
      var Mostrar = function(id)

        {

          var route = "{{url('/jefe/{id}')}}";

          $.get(route, function(data){

            $("#titulo").val(data.id);

            $("#horas_cubrir").val(data.name);

          });

        }

       

       //$('#tablaj').stacktable({myClass:'stacktable small-only'});

    </script>

@endsection
