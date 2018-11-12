<span class="reminder-outer-container">
    <span class="reminder-inner-container">
        <span id="reminder" class="reminder"></span>
    </span>
</span>

<script>
    function generateReminder(reminderId, user, userImage, date, wishes, show){
        rows = '';
        rows += `<span class="user-container">`;
        rows += `<span class="card-container">    `;
        rows += `<img class="card-bg" src="${userImage}">`;
        rows += `<span class="text">`;
        rows += `<span class="icon">🎂</span> ¡Se acerca el cumpleaños de ${user}!`;
        rows += `</span>`;
        rows += `<span class="birthday-text">`;
        rows += date;
        rows += `</span>`;
        rows += `</span>`;
        rows += `<span class="user-card flex-image">`;
        rows += `<img src="${userImage}">`;
        rows += `</span>`;
        rows += `</span>`;
        rows += `<span class="wishlist-container expanded">`;
        rows += `<span class="wishlist-title"><i class="fas fa-gift"></i> ¿Por qué no le compras algo?</span>`;
        rows += `<span class="wishlist">`;
        if(wishes.length > 0){
            rows += '<span class="wishes">';
            for(i in wishes){
                rows += `<span wish-id="${wishes[i].deseo_id}" class="wish">${wishes[i].nombre}</span>`;
            }
            rows += '</span>';
        }else{
            rows += `<span class="no-wishes"><i class="fas fa-box-open"></i> Este usuario no tiene deseos</span>`;
        }
        rows += `</span>`;
        rows += `</span>`;
        rows += `<span class="options">`;
        rows += `<a class="reminder-cancel btn-floating"><i class="far fa-times-circle"></i></a>`;
        rows += `<a class="reminder-accept btn-floating"><i class="far fa-check-circle"></i></a>`;
        rows += `</span>`;
        object = $('#reminder');
        object.html(rows);
        object = object.find('.user-container').find('.flex-image').find('img');
        object[0].onload = (event)=>{
            flexImage(event.target);
        };

        $('#reminder').find('.options').find('.reminder-accept').click((event)=>{
            $.ajax({
                url: "../rutas_ajax/perfiles/recordatorio_deshabilitar.php?",
                type: "POST",
                data: 'sigue=' + reminderId,
                success: function(r){
                    showMessage("success","Recordatorio.","Recordatorio deshabilitado correctamente.");                      
                },
            });         
            hideReminder();
        });

        $('#reminder').find('.options').find('.reminder-cancel').click((event)=>{
            hideReminder();
        });

        setTimeout(() => {
            $('.reminder-outer-container').addClass('expanded');
            //$('#profile-section').css('filter', 'blur(4px)');
            //$('#header').css('filter', 'blur(4px)');
            //$('.the-line').css('filter', 'blur(4px)');
            //$('.search-people-container').css('display', 'none');
            //$('.notification-wall-container').css('display', 'none');
        }, 10);

        function hideReminder(){
            $('.reminder-outer-container').removeClass('expanded');
            //$('#profile-section').css('filter', 'blur(0)');
            //$('#header').css('filter', 'blur(0)');
            //$('.the-line').css('filter', 'blur(0)');
            //$('.search-people-container').css('display', 'flex');
            //$('.notification-wall-container').css('display', 'flex');
        }
    }

    function showMessage(type,title,text){
        var opts = {
        };
        opts.title = title;
        opts.text = text;
        opts.type = type;
        opts.styling = 'bootstrap3';
        new PNotify(opts);
    }

    function searchReminder(){
        $.ajax({
            url: "../rutas_ajax/perfiles/recordatorios.php?",
            type: "POST",
            data: '',
            success: function(r){                        
                obj = JSON.parse(r);
                for(var i = 0; i < obj.length; i++){
                    wishes = []
                    userImg = '../../assets/img/users/' + obj[i][0].name_img + "." + obj[i][0].formato_img;
                    //recorremos los deseos
                    for(var a = 0; a < obj[i][1].length; a++){
                        wishes.push(obj[i][1][a]);
                    }
                    generateReminder(obj[i][0].sigue_id, obj[i][0].nombres.split(" ")[0] + " " + obj[i][0].apellidos, userImg, formatBirthday(obj[i][0].fecha_nacimiento), wishes, true);                
                } 
            },
        });     
    }

    $(document).ready(()=>{
        if(recordatorio == 1){
            searchReminder();
        }
        // generateReminder(235, 'Diego Alay', '../../assets/img/users/face9.png', '28 de marzo', [{id: '1', wish: 'Dinero'}, {id: '2', wish: 'Carrosss'}], true);
    });
</script>