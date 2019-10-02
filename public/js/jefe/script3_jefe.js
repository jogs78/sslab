$(document).ready(function(){
    $("#btnGuardarEstadia").click(function(e){
        e.preventDefault();
        //Guardamos la referencia del boton cliqueado
        var btnAccionado = $(this);
        //deshabilitamos el boton, aquí se puede aplicar difentes efectos, animaciones, etc para indicar que se está haciendo la operación.
        btnAccionado.prop('disabled', true);

        //Obtiene el formulario que es padre del botón
        var form = btnAccionado.parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action');

        //Se puede ocupar $.ajax o sus variantes($.post, $.get ....)
        //form.serialize() obtiene todos los datos del formulario (campos y valores)
        $.post(url, form.serialize(), function(result){
            //Lo que se debede hacer cuándo la operación fue un exito

            //limpia el formulario
            form[0].reset();
            
            //Cierra el modal
            $("#modalNuevo").modal('hide');
            
            console.log(result);

            alert(result.message);
          
            /** Operaciones para agregar la nueva columna **/

            //El nuevo elemento insertado en el dom (un nuevo tr en este caso)
            var newElement;
            //Selecciona el primer tr del tbody e inserta una copia del mismo
              $("tbody > tr").first().before(
                newElement = $("tbody > tr").first().clone(true)
                
              ).html();

            //Se formatean los datos de acuerdo al posicionamiento de los td
            var newData = [
                result.data.titulo,
                result.data.horas_cubrir,
                result.data.horas_cubiertas, //horasCubiertas() 
                result.data.responsable_proyecto.nombre+' '+result.data.responsable_proyecto.apellido,
                undefined,  //verHoras
                result.data.prestador_proyecto.nombre,
                result.data.prestador_proyecto.apellido, 
                result.data.prestador_proyecto.correo, 
                result.data.prestador_proyecto.telefono, 
                undefined, //C. Asistencias
                undefined, //Accion

            ];

            //Para cada td del nuevo elemento, se cambian los datos de acuerdo a los recibidos como respuesta por parte del servidor
            $(newElement).children('td')
            .each(function(i){
                if(newData[i] !== undefined){
                    $(this).text(newData[i])
                }
            })

            //Asignamos una nueva id al tr
            newElement.attr('id', 'trProyecto'+result.data.id);
            //o sin depender de trProyecto
            //newElement.attr('id', newElement.attr('id').replace(/[1-9]/g, '')+result.data.id);

            //Asigna la nueva url al formulario para eliminar
            newElement.find("[name='formEliminar']").attr('action', '/jefe/'+result.data.id); 
            newElement.find("[name='avancePdf']").attr('href', '/proyecto/'+result.data.id+'/avance'); 
            newElement.find("[data-proyectoid]").attr('data-proyectoid', result.data.id);
        }).fail(function(data){
            //La operación falló
            alert(data.responseText);
            console.log(data);
        })
        .always(function() {
            btnAccionado.prop('disabled', false);
        });

    });

    $("#btnActualizarEstadia").click(function(e){
        e.preventDefault();
        //Obtiene el id del proyecto mediante el atributo data-proyectoId 
        //del botón asignado por el accionar del botón btnMostrarModalEdicionEstadia    
        var proyectoId = $(this).attr('data-proyectoId');

        //Obtiene el formulario que es padre del botón
        var form = $(this).parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action')+'/'+proyectoId;

        //Se puede ocupar $.ajax o sus variantes($.post, $.get ....)
        //form.serialize() obtiene todos los datos del formulario (campos y valores)
        $.post(url, form.serialize(), function(result){
            //Lo que se debede hacer cuándo la operación fue un exito
            
            console.log(result);

            alert(result.message);
          
            /** Operaciones para agregar la nueva columna **/

            //buscamos el tr relacionado al id del proyecto editado para actualizar los datos
            var elementoEditado = $('#trProyecto'+result.data.id)

            //Se formatean los datos de acuerdo al posicionamiento de los td
            var newData = [
                result.data.titulo,
                result.data.horas_cubrir,
                result.data.horas_cubiertas, //horasCubiertas() 
                result.data.responsable_proyecto.nombre+' '+result.data.responsable_proyecto.apellido,
                undefined,  //verHoras
                result.data.prestador_proyecto.nombre,
                result.data.prestador_proyecto.apellido, 
                result.data.prestador_proyecto.correo, 
                result.data.prestador_proyecto.telefono, 
                undefined, //C. Asistencias
                undefined, //Accion

            ];

            //se cambian los datos de acuerdo a los recibidos como respuesta por parte del servidor
            $(elementoEditado).children('td')
                .each(function(i){
                    if(newData[i] !== undefined){
                        $(this).text(newData[i])
                    }
                })
            
        }).fail(function(data){
            //La operación falló
            alert(data.responseText);
            console.log(data);
        })
    });

    $("[name='btnEliminarEstadia']").click(function(e){
        
        e.preventDefault();

        //Guardamos la referencia del boton cliqueado
        var btnAccionado = $(this);
        //deshabilitamos el boton, aquí se puede aplicar difentes efectos, animaciones, etc para indicar que se está haciendo la operación.
        btnAccionado.prop('disabled', true);

        //Obtiene el formulario que es padre del botón
        var form = btnAccionado.parents('form');

        //Obtiene la url del formulario, si el formulario no tiene url, entonces se debe de definir aquí url
        var url = form.attr('action');

        //Se puede ocupar $.ajax o sus variantes($.post, $.get ....)
        //form.serialize() obtiene todos los datos del formulario (campos y valores)
        $.post(url, form.serialize(), function(result){
            console.log(result);
            alert(result.message);
            //Eliminamos la fila correspondiente al proyecto eliminado, aquí van los efectos y toda la onda
            /** Ejemplo
                //Desvanecemos el contenedor 
                $('#trProyecto'+result.data.id).fadeOut(2000);
                //Y lo eliminamos del DOM después de cierto tiempo transcurrido
                setTimeout(function(){
                    $('#trProyecto'+result.data.id).remove();
                }, 5000);
            **/
            $('#trProyecto'+result.data.id).remove();
            
        }).fail(function(data){
            //La operación falló
            alert(data.responseText);
            btnAccionado.prop('disabled', false);
            console.log(data);
        })

    } );
    
    /*
        El boton que muestra el modal para editar, tiene un atributo data-proyectoId en donde se
        guarda el id del proyecto.
    */
    $("[name='btnMostrarModalEdicionEstadia']").click(function(e){
        var proyectoId = $(this).attr('data-proyectoId');
        /*
            Cada vez que se abre una nueva estadia para editar
             -> se limpia el formulario 
             -> se elimina el atributo data-proyectoId en el boton btnActualizarEstadia
        */

        var form = $("#formActualizarEstadia");
        
        var horarioEditComponent = app.__vue__.$refs.horarioEditar;
        horarioEditComponent.eliminarCampos();

        form[0].reset();
        //Eliminamos el atributo data-proyectoId por si hubo algún proyecto abierto anteriormente
        $("#btnActualizarEstadia").removeAttr('data-proyectoId');
        //Formamos la url mediante la url base que trae el formulario /jefe/ + la id del proyecto
        var url = form.attr('action')+'/'+proyectoId;

        $.get(url, function(result){
            /*  LLenamos el valor de cada campo del formulario
                $("#idDelCampo").val(result.data.elValorQueLeCorresponde)
                o si los ids de los campos del form coinciden con los de la respuesta
                se puede hacer un recorrido de cada input insertando el valor correspondiente en 
                la respuesta.  
            */
            form.find('input').val(function (index, value) {
                //se asigna el valor del respuesta.data[id del input] al input 
                return result.data[this.id] != undefined 
                            ? result.data[this.id]
                            : $(this).val()
            });
            /*
                Se selecciona los elementos de la respuesta utilizando el nombre del select
                Asignar los valores uno x uno sería:
                $(id o nombre del select).val(result.data.elValorQueLeCorresponde)
            */
            form.find('select').val(function (index, value) {
                return result.data[this.name];
            });

            horarioEditComponent.cargarHorario(result.data.horario);
        });
        //Muestra el modal
        $("#modalEdicion").modal('show');

        //Asignamos la id del proyecto al boton actualizar mediante el atributo data-proyectoId 
        $("#btnActualizarEstadia").attr('data-proyectoId', proyectoId);
        
    }); 

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
                defaultView: 'agendaWeek'
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

//Horario inicio (personal)
$("[name='btnMostrarModalHorarioJefe']").click(function(e){

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
        $("#modalHorarioJefe").modal('show');

        
    });

//          HORARIO FIN---------------

//Horario inicio (de todos)
$("[name='btnMostrarModalHorarios']").click(function(e){
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
        //var url = form.attr('action')+'/proyecto/'+proyectoId+'/ver-horas';
        var url = '/horarios';

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

            
            //Agrega los eventos al calendario
            calendar.addEventSource(asistencias);
            //Renderiza de nuevo el calendario con los nuevos eventos
            $('#calendar').fullCalendar({
                defaultView: 'agendaWeek'
              });
            calendar.render();
        });

        //Muestra el modal
        $("#modalHorarioPrestadores").modal('show');
     
});

//          HORARIO FIN---------------


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
