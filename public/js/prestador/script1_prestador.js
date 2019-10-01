






//Horario inicio
$("[name='btnMostrarModalHorarioPrestador']").click(function(e){

	var proyectoId = $(this).attr('data-proyectoId');

	var url = '/proyecto/'+proyectoId+'/ver-horario';
	
	$('#horas').empty();

	$.get(url, function(result){var dias = {
		lunes:'<td>-</td>', 
		martes: '<td>-</td>', 
		miercoles: '<td>-</td>', 
		jueves: '<td>-</td>', 
		viernes: '<td>-</td>', 
	};
	//console.log(result.data);
	$.each(result.data, function(iDia,dia){
		//console.log(iDia);

		dias[iDia]= '<td>';
		$.each(dia, function(i,item){

			dias[iDia] += item.entrada + '-' + item.salida+'<br>';
		});
		dias[iDia] += '</td>';

	});
	$('#horas').append(dias.lunes,dias.martes,dias.miercoles,dias.jueves,dias.viernes);
});
        //Muestra el modal
        $("#modalHorarioPrestador").modal('show');

        
    });

//          HORARIO FIN---------------


// CARGAR ASISTENCIAS
/*
	$('btnGuardarAsistencias').click(function(e){

        var form = $("#formGuardarAsistencia");form[0].reset();
        var url = form.attr('action')+proyectoId;

        $.get(url, function(result){
        	/*Agregamos un nuevo <option></option> al select asitencia por cada asistencia sin verificar*/
/*            $.each(result.data.asistencias, function(i, asistencia){
                if(asistencia.validar == 1){
                    $("#selectAsistencia > option").last().clone(true).appendTo('#selectAsistencia')
                        .attr('value', asistencia.id)
                        .attr('data-horas-registradas', asistencia.horas_realizadas)
                        .text(asistencia.fecha_relizado+' '+asistencia.hora_llegada+'-'+asistencia.hora_salida);
                }
            });
        });
	}
	*/
	$("#btnGuardarAsistencias").click(function(e){
		e.preventDefault();

        //Obtiene el formulario que es padre del botón
        var form = $(this).parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action');

        //Se puede ocupar $.ajax o sus variantes($.post, $.get ....)
        //form.serialize() obtiene todos los datos del formulario (campos y valores)
    var a = form.serialize();
    var b = a.split("&");
    var c = JSON.stringify(b);
        $.post(url, a, function(result){
            //Lo que se debede hacer cuándo la operación fue un exito
            
            console.log(result);

            alert(result.message);
            
        }).fail(function(data){
            //La operación falló
            alert(data.responseText);
            console.log(data);
        })
    });



// FIN CARGAR ASISTENCIAS
