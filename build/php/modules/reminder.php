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
        rows += `<span id="wishlist" class="wishlist">`;
        if(wishes.length > 0){
            rows += '<span class="wishes">';
            for(i in wishes){
                rows += `<span wish-id="${wishes[i].id}" class="wish">${wishes[i].wish}</span>`;
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
            //TODO Que ya no le siga recordando.
            console.log('Eliminar recordatorio: ' + reminderId);
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

    $(document).ready(()=>{
        generateReminder(234, 'Henry Campos', '../../assets/img/users/face9.png', '27 de marzo', [{id: '1', wish: 'Dinero'}, {id: '2', wish: 'Carrosss'}], true);
    });
</script>