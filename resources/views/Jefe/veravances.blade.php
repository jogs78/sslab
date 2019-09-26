@extends('layouts.app')


@section('content')
<div class="container">
			<hr size="5">

            @include('layouts.componentes.jefe.listaavances')
            @include('layouts.componentes.jefe.modales')
	
			<hr size="5">
</div>

  <script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script>

@endsection

@section('ubicacion')
INICIO>VER AVANCES
@endsection
