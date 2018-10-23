<span class="notification-wall-container">
    <span class="central-container">
        <span class="notifications-container">
        </span>
        <span class="wide-central-container">
            <a class="btn-exit-popup hide-notifications"><i class="far fa-times-circle"></i></a>
        </span>
    </span>
</span>

<script>
    var size = 0;
    //Función para generar notificaciones que recibe [user] que es el usuario que generó la notificación, [text] que es el texto de las publicaciones, [type] que es el tipo de la notificación literal (Mensaje, Votación, etc...), [groupRef] que es el id del grupo, [groupName] que es el nombre del grupo y [createdLater] que debe ser true si la función es llamada después de initNotificationWallListeners(). 
    function generateNotification(id, user, text, type, groupRef, groupName, createdLater){
        console.log("IN");
        var finded = 0;
        var inserted = 0;
        rows = '';
        $('.group-notification').each(function(){
            if($(this).attr('group-ref') == groupRef){
                finded = 1;
                $(this).find('.notification').each(function(){
                    if($(this).find('.type').text() == (' Mensaje') && $(this).find('.user-name').text() == user){
                        rows += `<span notification-id="${id}" class="text">${text}</span>`;
                        $(this).append(rows);
                        inserted = 1;
                    }
                });
                if(inserted == 0){
                    rows += `<span class="notification">`;
                    rows += `<span class="user-name">${user}</span>`;
                    rows += `<a class="delete-notification"><i class="far fa-eye-slash"></i></a>`;
                    rows += `<span class="type"><i class="fas fa-circle"></i> ${type}</span>`;
                    rows += `<span notification-id="${id}" class="text">${text}</span>`;
                    rows += `</span>`;
                    object = $(this).find('.group-name');
                    object.after(rows);
                    object = object.find('.number');
                    object.html((parseInt(object.text().split(' ')[0]) + 1) + ' NUEVAS');
                    object = $('#nav-counter');
                    object.html(parseInt(object.text()) + 1);
                    size =  parseInt(object.text()) + 1;
                    if(createdLater){
                        $(this).find('.delete-notification').eq(0).click(function(){
                            removeNotification($(this));
                        });
                    }
                }
            }
        });
        if(finded == 0){
            rows += `<span class="group-notification" group-ref="${groupRef}">`;
            rows += `<span class="group-name">`;
            rows += `${groupName} <span class="number">1 Nueva</span>`;
            rows += `</span>`;
            rows += `<span class="notification">`;
            rows += `<span class="user-name">${user}</span>`;
            rows += `<a class="delete-notification"><i class="far fa-eye-slash"></i></a>`;
            rows += `<span class="type"><i class="fas fa-circle"></i> ${type}</span>`;
            rows += `<span notification-id="${id}" class="text">${text}</span>`;
            rows += `</span>`;
            rows += `</span>`;
            $('.notifications-container').append(rows);
            object = $('#nav-counter');
            object.html(parseInt(object.text()) + 1);
            size =  parseInt(object.text()) + 1;
            if(createdLater){
                $('.notifications-container').find('.group-notification').eq(-1).find('.delete-notification').eq(0).click(function(){
                    removeNotification($(this));
                });
            }
        }
    }

    //Función que elimina la notificación.
    //TODO: Hay que eliminar la notificación de la base de datos, pero se necesita tomar en cuenta el id para esto, me comentas cuando vayas por esta parte.
    function removeNotification(lmnt){
        lmnt.parent().find('.text').each((index, element)=>{
            notifyId = $(element).attr('notification-id');
            //cambiamos el estado de la notificacion a leida
            $.ajax({
                url: "../rutas_ajax/notificaciones/cambiar_estado.php?notificacion=" + notifyId,
                type: "POST",
                success: function(r){
                }
            });  
        });
         

        object = lmnt.parent().parent();
        if(object.find('.notification').length == 1){
            if(object.parent().find('.group-notification').length == 1){
                emptyNotificationWall();
            }
            object.remove();
        }else{
            lmnt.parent().remove();
            object = object.find('.number');
            object.html((parseInt(object.text().split(' ')[0]) - 1) + ' NUEVAS');
        }
        object = $('#nav-counter');
        object.html(parseInt(object.text()) - 1);
        size =  parseInt(object.text()) - 1;
    }

    //Eventos del mural de notificaciones y la generación de notificaciones depende de esta función.
    function initNotificationWallListeners(){
        $('.hide-notifications').click(function(){
            $('.notification-wall-container').removeClass('expanded');
            $('#notification').removeClass('expanded');
            $('.main-nav').removeClass('notification-expanded');
            $('body').removeClass('disableScrollBar');
        });

        $('.delete-notification').click(function(){
            removeNotification($(this));
            size--;
        });
    }

    //Función para indicar que no hay notificaciones.
    function emptyNotificationWall(){
        rows = '<span class="no-notification"><i class="fas fa-circle"></i>No hay notificaciones</span>';
        $('.notifications-container').html(rows);
    }

    function tipoNotify(tipo){
        switch(tipo){
            case "V" : return "Votacio";
            case "E" : return "Evento";
            case "I" : return "Imagen";
            case "P" : return "Pregunta";
            case "M" : return "Mensaje";
        }
    }

    function updateNotifies() {
        setTimeout("listNotifications(0)",2000); 
    }

    function listNotifications(show){
        $.ajax({
            url: "../rutas_ajax/notificaciones/listado.php?show=" + show,
            type: "POST",
            success: function(r){
                objParent = JSON.parse(r);
                for(var i = 0; i < objParent.length; i++){
                    publicacion_id = objParent[i].publicacion_id;
                    notificacion_id = objParent[i].notificacion_id;
                    usuario_creador = objParent[i].usuario_creador;
                    usuario_creador_nombre = objParent[i].nombre;
                    grupo_id = objParent[i].grupo_id;
                    grupo = objParent[i].apellido;
                    tipo = objParent[i].tipo;
                    fecha_creacion = objParent[i].fecha_creacion;
                    //ahora muestro los datos de la publicacion
                    if(tipo == "E"){
                        //EVENTOS
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/eventos/listado.php?grupo=" + grupo_id + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                // evento_id = obj[0][0].evento_id;
                                informacion = obj[0][0].titulo;
                                // informacion = obj[0][0].informacion;
                                // fecha = obj[0][0].fecha;
                                // hora = obj[0][0].hora;
                                // lugar = obj[0][0].lugar;
                            },
                            async: false // <- this turns it into synchronous
                        });               
                    }else if(tipo == "I"){
                        //IMAGENES
                    
                    }else if(tipo == "P"){
                        //PREGUNTAS
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/preguntas/listado.php?grupo=" + grupo_id + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                // var respuestas = [];
                                // var usuarios = [];
                                // var respuestasUsuario = [];
                                obj = JSON.parse(r);
                                // pregunta_id = obj[0][0].pregunta_id;
                                informacion = obj[0][0].informacion;
                            },
                            async: false // <- this turns it into synchronous
                        });                  
                    }else if(tipo == "V"){
                        //VOTOS
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/votaciones/listado.php?grupo=" + grupo_id + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                // votacion_id = obj[0][0].votacion_id;
                                informacion = obj[0][0].informacion;                                 
                            },
                            async: false // <- this turns it into synchronous
                        });                         
                    }else if(tipo == "M"){
                        //MENSAJES                    
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/mensajes/listado.php?grupo=" + grupo_id + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                // mensaje_id = obj[0].mensaje_id;
                                informacion = obj[0].informacion;
                            },
                            async: false // <- this turns it into synchronous
                        });             
                    }  
                    tipo = tipoNotify(tipo);
                    generateNotification(notificacion_id,usuario_creador,informacion,tipo,grupo_id,grupo,true);                                     
                }
                if(size < 2) emptyNotificationWall();
                updateNotifies(1);               
            },
        });         
    }

    $(document).ready(function(){
        initNotificationWallListeners();
        listNotifications(1);
    });
</script>