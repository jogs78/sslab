$(document).ready(function(){
    
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

        //Formamos la url mediante la url base que trae el formulario /revisor/ + la id del proyecto
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


    //CONTROL DE ASISTENCIAS -------->MOSTRAR MODALES<---------
    //--1

    /*
        El boton que muestra el modal para validar asistencias, tiene un atributo data-proyectoId en donde se
        guarda el id del proyecto.
    */
    $("[name='btnMostrarModalAsistencias']").click(function(e){
        var proyectoId = $(this).attr('data-proyectoId');
        /*
            Cada vez que se abre una nueva estadia para editar
             -> se limpia el formulario 
             -> se elimina el atributo data-proyectoId en el boton btnGuardarAsistencia
        */

        var form = $("#formValAsis");

        form[0].reset();
        //Eliminamos el atributo data-asistenciaId por si hubo algún proyecto abierto anteriormente
        $("#btnValidarAsistencia").removeAttr('data-asistenciaId');
        //Muestra el modal
        $("#modalAsistencias").modal('show');
        /*Limpia el select de valores anteriores*/
        $("#selectAsistencia > option").not(":first").remove();
        /*Cargamos las asistencias del proyecto*/
        var formCalendario = $("#formCalendario");
        var url = formCalendario.attr('action')+'/proyecto/'+proyectoId+'/ver-horas';

        $.get(url, function(result){
            /*Agregamos un nuevo <option></option> al select asitencia por cada asistencia sin verificar*/
            $.each(result.data.asistencias, function(i, asistencia){
                if(asistencia.validar == 1){
                    $("#selectAsistencia > option").last().clone(true).appendTo('#selectAsistencia')
                        .attr('value', asistencia.id)
                        .attr('data-horas-registradas', asistencia.horas_realizadas)
                        .text(asistencia.fecha_relizado+' '+asistencia.hora_llegada+'-'+asistencia.hora_salida);
                }
            });
        });
        
    });

    /*
        Ante el cambio de la asistencia seleccionada, se asignan los valores correspondientes al 
        input horas_registradas y btnValidarAsistencia
    */
    $("#selectAsistencia").change(function(){
        var optionSelected = $(this).children('option:selected');
        $("#horas_registradas").val(optionSelected.attr('data-horas-registradas'));
        //Asignamos la id de la asitencia al boton actualizar mediante el atributo data-asistenciaId 
        $("#btnValidarAsistencia").attr('data-asistenciaId', optionSelected.val());
    }); 

    //--2

    /*
        El boton que muestra el modal para validar asistencias, tiene un atributo data-proyectoId en donde se
        guarda el id del proyecto.
    */
    $("[name='btnMostrarModalFaltas']").click(function(e){
        var proyectoId = $(this).attr('data-proyectoId');
        /*
            Cada vez que se abre una nueva estadia para editar
             -> se limpia el formulario 
             -> se elimina el atributo data-proyectoId en el boton btnGuardarAsistencia
        */

        var form = $("#formGuardarFalta");

        form[0].reset();
        //Eliminamos el atributo data-proyectoId por si hubo algún proyecto abierto anteriormente
        $("#btnGuardarFaltas").removeAttr('data-proyectoId');
        //Muestra el modal
        $("#modalFaltas").modal('show');

        //Asignamos la id del proyecto al boton actualizar mediante el atributo data-proyectoId 
        $("#btnGuardarFaltas").attr('data-proyectoId', proyectoId);
        
    });


    //--3


    /*
        El boton que muestra el modal para validar asistencias, tiene un atributo data-proyectoId en donde se
        guarda el id del proyecto.
    */
    $("[name='btnMostrarModalHextras']").click(function(e){
        var proyectoId = $(this).attr('data-proyectoId');
        /*
            Cada vez que se abre una nueva estadia para editar
             -> se limpia el formulario 
             -> se elimina el atributo data-proyectoId en el boton btnGuardarAsistencia
        */

        var form = $("#formGuardarHextras");

        form[0].reset();
        //Eliminamos el atributo data-proyectoId por si hubo algún proyecto abierto anteriormente
        $("#btnGuardarHextras").removeAttr('data-proyectoId');
        //Muestra el modal
        $("#modalHextras").modal('show');

        //Asignamos la id del proyecto al boton actualizar mediante el atributo data-proyectoId 
        $("#btnGuardarHextras").attr('data-proyectoId', proyectoId);
        
    });


    //--4

    /*
        El boton que muestra el modal para validar asistencias, tiene un atributo data-proyectoId en donde se
        guarda el id del proyecto.
    */
    $("[name='btnMostrarModalPermisos']").click(function(e){
        var proyectoId = $(this).attr('data-proyectoId');
        /*
            Cada vez que se abre una nueva estadia para editar
             -> se limpia el formulario 
             -> se elimina el atributo data-proyectoId en el boton btnGuardarAsistencia
        */

        var form = $("#formGuardarPermisos");

        form[0].reset();
        //Eliminamos el atributo data-proyectoId por si hubo algún proyecto abierto anteriormente
        $("#btnGuardarPermisos").removeAttr('data-proyectoId');
        //Muestra el modal
        $("#modalPermisos").modal('show');

        //Asignamos la id del proyecto al boton actualizar mediante el atributo data-proyectoId 
        $("#btnGuardarPermisos").attr('data-proyectoId', proyectoId);
        
    });


    //CONTROL DE ASISTENCIAS -------->CRUD MODALES<---------

    $("#btnCargarAsistencias").click(function(e){
        e.preventDefault();
        //Guardamos la referencia del boton cliqueado
        var btnAccionado = $(this);
        //deshabilitamos el boton, aquí se puede aplicar difentes efectos, animaciones, etc para indicar que se está haciendo la operación.
        btnAccionado.prop('disabled', true);

        //Obtiene el formulario que es padre del botón
        var form = btnAccionado.parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action');
        
        $.ajax({
            url: url, 
            type: "POST",             
            data: new FormData(form[0]),
            contentType: false,       
            cache: false,             
            processData:false, 
            success: function(result) {
                form[0].reset();
                console.log(result);
                alert(result.message);
            },
            error: function(data) {
                alert(data.responseText);
                console.log(data);
            },
            complete: function(jqXHR, textStatus) {
                btnAccionado.prop('disabled', false);
            }
        });

    });

    $("#btnValidarAsistencia").click(function(e){
        e.preventDefault();
        //Obtiene el id de la asistencia mediante el atributo data-asistenciaId 
        //del botón asignado por el accionar del botón btnMostrarModalEdicionEstadia    
        var asistenciaId = $(this).attr('data-asistenciaId');

        //Obtiene el formulario que es padre del botón
        var form = $(this).parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action')+'/'+asistenciaId;

        //Se puede ocupar $.ajax o sus variantes($.post, $.get ....)
        //form.serialize() obtiene todos los datos del formulario (campos y valores)
        $.post(url, form.serialize(), function(result){
            //Lo que se debede hacer cuándo la operación fue un exito
            
            console.log(result);

            alert(result.message);
            
        }).fail(function(data){
            //La operación falló
            alert(data.responseText);
            console.log(data);
        })
    });

    $("#btnGuardarPermisos,#btnGuardarFaltas").click(function(e){
        e.preventDefault();
        //Guardamos la referencia del boton cliqueado
        var btnAccionado = $(this);
        
        //Obtiene el id del proyecto mediante el atributo data-proyectoId 
        //del botón asignado por el accionar del botón btnMostrarModalEdicionEstadia    
        var proyectoId = $(this).attr('data-proyectoId');

        //Obtiene el formulario que es padre del botón
        var form = $(this).parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action')+'/'+proyectoId+'/registrar-incidencia';

        //Se puede ocupar $.ajax o sus variantes($.post, $.get ....)
        //form.serialize() obtiene todos los datos del formulario (campos y valores)
        $.post(url, form.serialize(), function(result){
            //Lo que se debede hacer cuándo la operación fue un exito
            console.log(result);

            alert(result.message);
            
        }).fail(function(data){
            //La operación falló
            alert(data.responseText);
            console.log(data);
        })
    });
/*
    $('#alert').hide();
    $(".btn-delete").click(function(e){
        e.preventDefault();
        if (!confirm("¿Está seguro de eliminar?")) {
            return false;
        }
        
        var row     = $(this).parents('tr');
        var form    = $(this).parents('form');
        var url     = form.attr('action');
                
        $('#alert').show();
        $.post(url, form.serialize(), function(result){
            row.fadeOut();
            $('#products-total').html(result.total);
            $('#alert').html(result.message);
        }).fail(function(){
            $('#alert').html("algo salió mal");
        });
    });
*/
});
