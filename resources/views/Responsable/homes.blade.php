@extends('layouts.app')

@section('content')
    	<br>
        <div class="container">
            <h2 align="left">Seguimiento de estadias</h2> 
            <h5 align="left">Auxiliar</h3>
        </div>
        <br>
        
            <div class="row" style="justify-content: center">
                <strong>Nombre(s):</strong>&nbsp;  <?= $user->nombre; ?> &nbsp; &nbsp; 

                <strong>Apellido(s):</strong>&nbsp;  <?= $user->apellido; ?>&nbsp;&nbsp; 

                <strong>Correo:</strong>&nbsp;  <?= $user->email; ?>&nbsp;&nbsp; 
        
                <strong>Telefono:</strong>&nbsp;  <?= $user->telefono; ?>
            </div>
        

        @include('layouts.componentes.responsable.tablaresponsable') 
        @include('layouts.componentes.responsable.modalesres')    

 

@endsection
@section('ubicacion')
INICIO
@endsection

@section('scripts')

    <script src="{{ asset('js/responsable/script2_responsable.js') }}"></script>



@endsection
