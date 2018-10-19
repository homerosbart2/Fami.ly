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
                <img class="title-bg" src="../../assets/img/users/profile.png">
                <span class="profile-img">
                    <!-- Imagen de perfil del usuario -->
                    <img src="../../assets/img/users/profile.png">
                    <span class="img-update"><i class="far fa-caret-square-up"></i> Subir imagen</span>
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
                    <span class="birthday"><span class="icon"><i class="fas fa-birthday-cake"></i></span> 27 de marzo</span>
                    <span class="gender"><span class="icon"><i class="fas fa-mars"></i></span> Hombre</span>
                    <span class="country"><span class="icon"><i class="fas fa-globe-americas"></i></span> Guatemala</span>
                </span>
                <span class="groups-information">
                    <span class="info-title">Grupos en Común</span>
                    <span class="groups-container">
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
    function generateGroupCard(id, name, images){
        rows = '';
        if(images.length == 0){
            rows += '<span id="'+id+'" class="group-card empty">';
        }else{
            rows += '<span id="'+id+'" class="group-card">';
        }
        for(i in images){
            if(i == 0){
                rows += '<img class="image top-left" src="'+images[i]+'">';
            }else if(i == 1){
                rows += '<img class="image top-right" src="'+images[i]+'">';
            }else if(i == 2){
                rows += '<img class="image bottom-left" src="'+images[i]+'">';
            }else if(i == 3){
                rows += '<img class="image bottom-right" src="'+images[i]+'">';
            }
        }
        rows += '<span class="information">';
        rows += '<span class="name flexFont">';
        rows += name;
        rows += '</span>';
        rows += '</span>';
        rows += '</span>';
        $('.groups-container').append(rows);
        flexFont();
    }

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

    $(document).ready(()=>{
        generateGroupCard(1, 'Hogar', ['../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face3.png','../../assets/img/users/face4.png']);
        generateGroupCard(1, 'Campos', ['../../assets/img/users/face3.png','../../assets/img/users/face5.png','../../assets/img/users/face6.png','../../assets/img/users/face7.png']);
        generateGroupCard(1, 'Ogáldez', ['../../assets/img/users/face8.png','../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face9.png']);
    });

</script>