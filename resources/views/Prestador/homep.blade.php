@extends('layouts.app')

@section('content')
<div class="container">
    <div class="centerblock">
        <h2>Avance de estadia</h2>
        
            <div class="row" style="justify-content: center">
                <strong>Nombre(s):</strong>&nbsp;  <?= $user->nombre; ?> &nbsp; &nbsp; 

                <strong>Apellido(s):</strong>&nbsp;  <?= $user->apellido; ?>&nbsp;&nbsp; 

                <strong>Correo:</strong>&nbsp;  <?= $user->email; ?>&nbsp;&nbsp; 
        
                <strong>Telefono:</strong>&nbsp;  <?= $user->telefono; ?>
            </div>
        
        @include('layouts.componentes.prestador.horarioprestador')
        @include('layouts.componentes.prestador.tablaprestador')
        <br>
        @include('layouts.componentes.prestador.checarhoras')


    </div>   
</div>
@endsection
@section('ubicacion')
INICIO
@endsection


@section('scripts')
    <script src="{{ asset('js/prestador/script1_prestador.js') }}"></script>
@endsection
