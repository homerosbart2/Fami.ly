<span class="notification-wall-container">
    <span class="central-container">
        <span class="notifications-container">
            <span class="title">
                Notificaciones
            </span>
            <span class="group-notification">
                <span class="group-name">
                    Campos <span class="number">3 Nuevas</span>
                </span>
                <span class="notification">
                    <span class="user-name">Henry</span>
<<<<<<< Updated upstream
                    holiiiiii jajaja
                </span>
                <span class="notification">
                    <span class="user-name">Henry</span>
                    holiiiiii jajaja
                </span>
                <span class="notification">
                    holiiiiii jajaja
                </span>
                <span class="notification">
                    holiiiiii jajaja
=======
                    <a class="delete-notification"><i class="far fa-eye-slash"></i></a>
                    <span class="text">holiiiiii jajaja</span> 
                    <span class="type"><i class="fas fa-circle"></i> Mensaje</span>
                </span>
                <span class="notification">
                    <span class="user-name">Nuelmar</span>
                    <a class="delete-notification"><i class="far fa-eye-slash"></i></a>
                    <span class="text">Cena familiar Campos</span> 
                    <span class="type"><i class="fas fa-circle"></i> Evento</span>
                </span>
                <span class="notification">
                    <span class="user-name">Lorena</span>
                    <a class="delete-notification"><i class="far fa-eye-slash"></i></a>
                    <span class="text">Me parece bien el lugar.</span> 
                    <span class="type"><i class="fas fa-circle"></i> Mensaje</span>
>>>>>>> Stashed changes
                </span>
            </span>
            <span class="group-notification">
                <span class="group-name">
                    Campos
                </span>
                <span class="notification">

                </span>
            </span>
        </span>
        <span class="wide-central-container">
            <a class="btn-login hide-notifications"><i class="far fa-times-circle"></i></a>
        </span>
    </span>
</span>

<script>
    $(document).ready(function(){
        $('.hide-notifications').click(function(){
            $('.notification-wall-container').removeClass('expanded');
            $('#notification').removeClass('expanded');
            $('.main-nav').removeClass('notification-expanded');
        });
    });
</script>