    <?php
        include '../modules/links.php';
    ?>
</head>
<?php
    include '../modules/nav.php';
?>
<body>
    <section class="groups-section">
        <span class="wide-central-container">
            <span class="options">
                <a class="btn-login"><i class="fas fa-th-large"></i> Crear Nuevo</a>
            </span>
        </span>
        <span class="central-container">
            <span class="half-container  plus">
                <span class="group-card">
                    <img class="image top-left" src="../../assets/img/users/face1.png">
                    <img class="image top-right" src="../../assets/img/users/face2.png" alt="">
                    <img class="image bottom-left" src="../../assets/img/users/face3.png" alt="">
                    <img class="image bottom-right" src="../../assets/img/users/face4.png" alt="">
                    <span class="information">
                        <span class="name flexFont">
                            Hogar
                        </span>
                    </span>
                    <span class="counter">1</span>
                    <span class="counter-information">
                        <span class="notification-title">
                            Hay una nueva encuesta de <b>Alex Campos</b>:
                        </span>
                        <span class="notification-text">
                            ¿Qué quieren almorzar?
                        </span>
                    </span>
                </span>
            </span>
            <span class="half-container minus">
                <span class="group-card">
                    <img class="image top-left" src="../../assets/img/users/face3.png">
                    <img class="image top-right" src="../../assets/img/users/face5.png" alt="">
                    <img class="image bottom-left" src="../../assets/img/users/face6.png" alt="">
                    <img class="image bottom-right" src="../../assets/img/users/face7.png" alt="">
                    <span class="information">
                        <span class="name flexFont">
                            Campos
                        </span>
                    </span>
                </span>
                <span class="group-card">
                    <img class="image top-left" src="../../assets/img/users/face8.png">
                    <img class="image top-right" src="../../assets/img/users/face1.png" alt="">
                    <img class="image bottom-left" src="../../assets/img/users/face2.png" alt="">
                    <img class="image bottom-right" src="../../assets/img/users/face9.png" alt="">
                    <span class="information">
                        <span class="name flexFont">
                            Ogáldez
                        </span>
                    </span>
                    <span class="counter">1</span>
                    <span class="counter-information">
                        <span class="notification-title">
                            Hay un nuevo mensaje de <b>Vilma Ogáldez</b>:
                        </span>
                        <span class="notification-text">
                            Hola a todos!!!
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </section>
</body>
</html>

<script>
    flexFont = function () {
        var divs = document.getElementsByClassName("flexFont");
        for(var i = 0; i < divs.length; i++) {
            var relFontsize = divs[i].offsetWidth*0.1;
            divs[i].style.fontSize = relFontsize+'px';
        }
    };

    window.onload = function(event) {
        flexFont();
    };

    window.onresize = function(event) {
        flexFont();
    };

    $(document).ready(function(){
        object = $('.searchbox');
        object.find('.search-right').css('display', 'none');
        object.find('.search-left').css('display', 'none');
    });
</script>