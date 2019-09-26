
	//Filtro

	function filtro() {
	    var input, filter, ul, li, a, i, txtValue;
	    input = document.getElementById("myInput");
	    filter = input.value.toUpperCase();
	    ul = document.getElementById("myList");
	    li = ul.getElementsByTagName("li");
	    for (i = 0; i < li.length; i++) {
	        a = li[i].getElementsByTagName("a")[0];
	        txtValue = a.textContent || a.innerText;
	        if (txtValue.toUpperCase().indexOf(filter) > -1) {
	            li[i].style.display = "";
	        } else {
	            li[i].style.display = "none";
	        }
	    }
	}
    // Filtrar

  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myDIV *").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
    //filtrar fin

    //HORARIO ---------->MOSTRAR MODAL<---------------

    /*
        El boton que muestra el modal del calendario, tiene un atributo data-proyectoId en donde se
        guarda el id del proyecto.
    */
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: [ 'dayGrid', 'timeGrid' ],
            locale: 'es',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek'
            },
            views: {
                dayGridMonth: { // name of view
                    displayEventTime: true,
                    displayEventEnd: true
                },
            },
            //defaultDate: '2019-06-12',
            eventRender: function(info) {
                //console.log(info.event.extendedProps.description);
                var tooltip = new Tooltip(info.el, {
                    title: info.event.extendedProps.description,
                    placement: 'top',
                    trigger: 'hover',
                    container: 'body'
                });
            },
            events: [],
        });

        calendar.render();

    $("[name='btnMostrarModalCalendario']").click(function(e){
        /*Elimina los eventos (datos) cargados por otro proyecto*/
        $.each(calendar.getEventSources(), function(i,resource){
            resource.remove();
        });

        var proyectoId = $(this).attr('data-proyectoId');
        /*
            Cada vez que se abre una nueva estadia para editar
             -> se limpia el formulario 
             -> se elimina el atributo data-proyectoId en el boton btnGuardarAsistencia
        */

        var form = $("#formCalendario");

        //Formamos la url mediante la url base que trae el formulario /jefe/ + la id del proyecto
        var url = form.attr('action')+'/proyecto/'+proyectoId+'/ver-horas';

        $.get(url, function(result){
            /*Aquí van los eventos a mostrar (datos)*/
            var asistencias = [];
            $.each(result.data.asistencias, function(i,item){
                asistencias[i] = {
                    title: 'Asistencia',
                    start: item.fecha_relizado+'T'+item.hora_llegada,
                    end: item.fecha_relizado+'T'+item.hora_salida,
                    color: '#4caf50',
                    description: item.observaciones,
                };
            });

            var incidencias = [];
            $.each(result.data.incidencias, function(i,item){
                var titulo = item.justificada == 0 ? 'Falta' : 'Permiso';
                var color = item.justificada == 0 ? '#f44336' : '#f0e68c';
                incidencias[i] = {
                    title: titulo,
                    start: item.fecha,
                    color: color,
                    allDay: true,
                    description: item.observaciones,
                };
            });

            //Agrega los eventos al calendario
            calendar.addEventSource(asistencias);
            calendar.addEventSource(incidencias);
            //Renderiza de nuevo el calendario con los nuevos eventos
            calendar.render();
        });

        //Muestra el modal
        $("#modalCalendario").modal('show');

        
    });

//Horario inicio
$("[name='btnMostrarModalHorarioRevisor']").click(function(e){

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
        $("#modalHorarioRevisor").modal('show');

        
    });

//          HORARIO FIN---------------

