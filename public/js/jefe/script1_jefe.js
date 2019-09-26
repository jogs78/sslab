jQuery(document).ready(function(){
            jQuery('#registrar').click(function(e){
               e.preventDefault();
               var token = $("#token").val(); X-CSRF-TOKEN

               $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': token
                  },
              });
               jQuery.ajax({
                  url: "{{ route('guardarestadias') }}",
                  method: 'post',
                  data: {
                     nproyecto: jQuery('#nproyecto').val(),
                     periodo: jQuery('#periodo').val(),
                     hcubrir: jQuery('#hcubrir').val(),
                     responsable: jQuery('#responsable').val(),
                  },
                  success: function(result){
                     jQuery('.alert').show();
                     jQuery('.alert').html(result.success);
                  }
                });
               });
            });





  $( function() {
    $( "#slider-range" ).slider({
      value: 4,
      min: 1,
      max: 8,
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.value );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "value" ) );
  } );
