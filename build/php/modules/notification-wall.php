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