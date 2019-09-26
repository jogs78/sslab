@extends('layouts.app')

@section('content')
<div class="container">
  
    <div class="centerblock">
    	<br>
        <div>
            <h2 align="left">Seguimiento de estadias</h2> 
            <h5 align="left">Revisor</h3>
        </div>
        
            <div class="row" style="justify-content: center">
                <strong>Nombre(s):</strong>&nbsp;  <?= $user->nombre; ?> &nbsp; &nbsp; 

                <strong>Apellido(s):</strong>&nbsp;  <?= $user->apellido; ?>&nbsp;&nbsp; 

                <strong>Correo:</strong>&nbsp;  <?= $user->email; ?>&nbsp;&nbsp; 
        
                <strong>Telefono:</strong>&nbsp;  <?= $user->telefono; ?>
            </div>
        

    	@include('layouts.componentes.revisor.inforev')
    	
    </div>
    <hr size="5">
</div>
@endsection
@section('ubicacion')
@endsection


@section('scripts')

    <script src="{{ asset('js/revisor/script1_revisor.js') }}"></script>



@endsection

