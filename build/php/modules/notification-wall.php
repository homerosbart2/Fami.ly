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
    //Función para generar notificaciones que recibe [user] que es el usuario que generó la notificación, [text] que es el texto de las publicaciones, [type] que es el tipo de la notificación literal (Mensaje, Votación, etc...), [groupRef] que es el id del grupo, [groupName] que es el nombre del grupo y [createdLater] que debe ser true si la función es llamada después de initNotificationWallListeners(). 
    function generateNotification(id, user, text, type, groupRef, groupName, createdLater){
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
        });
    }

    //Función para indicar que no hay notificaciones.
    function emptyNotificationWall(){
        rows = '<span class="no-notification"><i class="fas fa-circle"></i>No hay notificaciones</span>';
        $('.notifications-container').html(rows);
    }

    $(document).ready(function(){
        //EXAMPLE: ejemplos de generación de notificaciones.
        generateNotification('Lorena', 'Me parece bien el lugar.', 'Mensaje', '123', 'Campos', false);
        generateNotification('Nuelmar', 'Cena familiar Campos', 'Evento', '123', 'Campos', false);
        generateNotification('Nuelmar', 'Cena familiar Campos', 'Evento', '123', 'Campos', false)
        generateNotification('Henry', 'Que onda', 'Mensaje', '123', 'Campos', false);
        generateNotification('Henry', '¿Cómo están?', 'Mensaje', '123', 'Campos', false);

        initNotificationWallListeners();
        
        generateNotification('Marco', 'WUT WUT', 'Mensaje', '123', 'Campos', true);
        generateNotification('Marco', 'WUT WUT', 'Mensaje', '124', 'Jairo',true);
        generateNotification('Marco', 'WUT WUT x2', 'Mensaje', '123', 'Campos', true);

        //EXAMPLE: función que se llama si no hay notificaciones.
        //emptyNotificationWall();
    });
</script>