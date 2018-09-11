<html>
<head>
    <title>Inicio</title>
    <?php
        include '../modules/links.php';
    ?>
</head>
<?php
    include '../modules/nav.php';
?>
<body>
    <section class="profile-section">
        <span class="central-container">
            <span class="profile-title">
                <span class="profile-img">
                    <!-- Imagen de perfil del usuario -->
                    <img src="../../assets/img/users/profile.png">
                    <span class="img-update"><i class="fas fa-file-upload"></i> Subir imagen</span>
                </span>
                <span class="name-container">
                    <span class="user-lastnames">
                        Campos Ogáldez
                    </span>
                    <span class="user-names">
                        Henry Alejandro
                    </span>
                    <span class="user-alias">
                        <b>@</b>henry.campos97
                    </span>
                    <span class="button-section">
                        <a class="btn-login">Seguir</a>
                        <a class="btn-login"><i class="fas fa-cog"></i></a>
                    </span>
                </span>
            </span>
            <span class="profile">
                <span class="profile-information">
                    <span class="info-title">Información</span>
                    <span class="birthday"><i class="far fa-calendar"></i> 27/03/1998</span>
                    <span class="gender"><i class="fas fa-mars"></i> Hombre</span>
                </span>
                <span class="groups-information">
                    <span class="info-title">Grupos en Común</span>
                    <span class="groups-container">
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
                        </span>
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
                        </span>
                    </span>
                </span>
                <span class="family-information">
                    <span class="info-title">Familiares</span>
                    <span class="users-container">
                        <span class="users-lastname">Campos</span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face1.png">
                            <span class="name">Alex</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face5.png">
                            <span class="name">Dulce</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face4.png">
                            <span class="name">Henry</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face3.png">
                            <span class="name">Jhonathan</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face7.png">
                            <span class="name">Lorena</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face6.png">
                            <span class="name">Nuelmar</span>
                        </span>
                    </span>
                    <span class="users-container">
                        <span class="users-lastname">Ogáldez</span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face9.png">
                            <span class="name">Julio</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face8.png">
                            <span class="name">Luz</span>
                        </span>
                        <span class="user-card">
                            <img class="image top-left" src="../../assets/img/users/face2.png">
                            <span class="name">Vilma</span>
                        </span>
                    </span>
                </span>
            </span>
        </span>
    </section>
</body>

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
</script>