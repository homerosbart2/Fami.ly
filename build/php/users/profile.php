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
    </section>
</body>

<script>
    function generateGroupCard(id, name, images){
        rows = '';
        rows += (images.length == 0)? `<span id="${id}" class="group-card empty">` : `<span id="${id}" class="group-card">`;
        for(i in images){
            if(i == 0){
                rows += `<img class="image top-left" src="${images[i]}">`;
            }else if(i == 1){
                rows += `<img class="image top-right" src="${images[i]}">`;
            }else if(i == 2){
                rows += `<img class="image bottom-left" src="${images[i]}">`;
            }else if(i == 3){
                rows += `<img class="image bottom-right" src="${images[i]}">`;
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

    //Función para generar los perfiles de los usuarios, recibe [type] que es el tipo de usuario (0 si es el usuario actual y 1 si es cualquier otro usuario), [username] que es el nombre de usuario, [name] que es un arreglo con los nombres y apellidos (['nombre', 'nombre', 'apellido', 'apellido']), [birthday] que es el cumpleaños (como 27 de marzo), [gender] que es el género, [country] que es el país, [image] que es el path de la imagen del usuario, [following] booleano que indica si se está siguiendo (debe ser false si es el perfil del usuario actual) y [callback] que es una función que se ejecuta al finalizar la generación del perfil (En el callback podes llamar a los métodos de generación de tarjetas).
    function generateUserProfile(type, username, name, birthday, gender, country, image, following, callback){
        rows = '';

        rows += `<span class="central-container">`;
        rows += (following)? `<span class="profile-title following">` : `<span class="profile-title">`;
        rows += `<img class="title-bg" src="${image}">`;
        rows += `<span class="profile-img">`;
        rows += `<img src="${image}">`;
        rows += `<span class="img-update"><i class="far fa-caret-square-up"></i> Subir imagen</span>`;
        rows += `</span>`;
        rows += `<span class="name-container">`;
        rows += `<span class="user-lastnames">`;
        rows += `${name[2]} ${name[3]}`;
        rows += `</span>`;
        rows += `<span class="user-names">`;
        rows += `${name[0]} ${name[1]}`;
        rows += `</span>`;
        rows += `<span class="user-alias">`;
        rows += `<b>@</b>${username}`;
        rows += `</span>`;
        rows += `<span class="button-section">`;
        if(type == 1){
            if(following){
                rows += `<a class="follow btn-login"><i class="fas fa-check-circle"></i> Siguiendo</a>`;
                rows += `<a class="relative btn-login solid"><i class="fas fa-plus"></i>Familiar</a>`;
            }else{
                rows += `<a class="follow btn-login">Seguir</a>`
            }
        }else if(type == 0){
            rows += `<a class="config btn-login"><i class="fas fa-cog"></i> Configuración</a>`;
        }
        rows += `</span>`;
        rows += `</span>`;
        rows += `</span>`;
        rows += `<span class="profile-information-container">`;

        

        rows += `<span class="profile-information">`;
        rows += `<span class="info-title">Información</span>`;
        rows += `<span class="birthday"><span class="icon"><i class="fas fa-birthday-cake"></i></span> ${birthday}</span>`;
        rows += `<span class="gender"><span class="icon"><i class="fas fa-mars"></i></span> ${gender}</span>`;
        rows += `<span class="country"><span class="icon"><i class="fas fa-globe-americas"></i></span> ${country}</span>`;
        rows += `</span>`;
        switch(type){
            //Usuario que inició sesión.
            case 0:
                rows += `<span class="family-information">`;
                rows += `<span class="info-title relatives">Familiares</span>`;
                rows += `<span class="users-container">`;
                rows += `<span class="users-lastname">${name[2]}</span>`;
                rows += `</span>`;
                rows += `<span class="users-container">`;
                rows += `<span class="users-lastname">${name[3]}</span>`;
                rows += `</span>`;
                rows += `<span class="info-title friends">Amigos</span>`;
                rows += `<span class="users-container">`;
                rows += `</span>`;
                break;
            //Cualquier otro usuario.
            case 1:
                rows += `<span class="groups-information">`;
                rows += `<span class="info-title">Grupos en Común</span>`;
                rows += `<span class="groups-container">`;
                rows += `</span>`;
                rows += `</span>`;
                break;
            rows += `</span>`;
        }
        rows += `</span>`;
        rows += `</span>`;
        
        $('.profile-section').html(rows);

        $('.button-section').find('.follow').click((event)=>{
            if($('.profile-title').hasClass('following')){
                follow(false);
            }else{
                follow(true);
            }
        });

        callback();
    }

    //Función para generar las tarjetas de usuario, que recibe [id] del usuario, [name] primer nombre del usuario, [lastname] que es 0 si el apellido en común es el primer apellido del usuario que inició sesión, 1 si el segundo es el común y 2 si no tienen apellidos en común, [image] que es el path a la imagen del usuario y [following] que es true si el usuario actual está siguiendo a este.
    function generateUserCard(id, name, lastname, image, following){
        rows = '';
        rows += (following)? `<span user-id="${id}" class="user-card following">` : `<span user-id="${id}" class="user-card">`;
        //rows += `<span class="follow-indicator"><i class="fas fa-check-circle"></i></span>`;
        rows += `<img class="image top-left" src="${image}">`;
        rows += `<span class="name">${name}</span>`;
        rows += `</span>`;
        object = $('.profile-information-container').find('.family-information').find('.users-container').eq(lastname);
        object.append(rows);
        object.find('.user-card').last().click((event)=>{
            //TODO: Direccionar al perfil del usuario con el identificador [id].
            console.log(id);
        })
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

    function follow(follow){
        if(!follow){
            //TODO: Eliminar el follow al usuario.
            $('.profile-title').removeClass('following');
            $('.button-section').find('.follow').html('Seguir');
        }else{
            //TODO: Hacer follow al usuario.
            $('.profile-title').addClass('following');
            $('.button-section').find('.follow').html('<i class="fas fa-check-circle"></i> Siguiendo');
        }
    }

    $(document).ready(()=>{
        //EXAMPLE: Ejemplo para generar un perfil de usuario ajeno.
        generateUserProfile(1, 'fernando.campos', ['Fernando', 'Andrés', 'Campos', 'Ogáldez'], '20 de febrero', 'Hombre', 'Guatemala', '../../assets/img/users/face9.png', true, ()=>{
            //EXAMPLE: Ejemplos para generar tarjetas de grupos como en la pantalla de inicio.
            generateGroupCard(1, 'Hogar', ['../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face3.png','../../assets/img/users/face4.png']);
            generateGroupCard(2, 'Campos', ['../../assets/img/users/face3.png','../../assets/img/users/face5.png','../../assets/img/users/face6.png','../../assets/img/users/face7.png']);
            generateGroupCard(3, 'Ogáldez', ['../../assets/img/users/face8.png','../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face9.png']);
        });

        //EXAMPLE: Ejemplo para generar un perfil de usuario actual.
        /*generateUserProfile(0, 'henry.campos98', ['Henry', 'Alejandro', 'Campos', 'Ogáldez'], '20 de febrero', 'Hombre', 'Guatemala', '../../assets/img/users/profile.png', false, ()=>{
            //EXAMPLE: Ejemplos para generar tarjetas de usuario dependiendo del apellido.
            //TODO: No sé cómo vamos a hacer esto, podríamos agregar un botón en el perfil para indicar si esa persona es familiar y si es tío o abuela, pero se necesita otra tabla de familiares y en esa indicar si se está siguiendo o no.
            //TODO: Hay que verificar los apellidos y si se está siguiendo para mandar a llamar estas funciones.
            generateUserCard(1, 'Alex', 0, '../../assets/img/users/face1.png', true);
            generateUserCard(2, 'Dulce', 0, '../../assets/img/users/face5.png', true);
            generateUserCard(3, 'Henry', 0, '../../assets/img/users/face4.png', false);
            generateUserCard(4, 'Jhonathan', 0, '../../assets/img/users/face3.png', false);
            generateUserCard(5, 'Lorena', 0, '../../assets/img/users/face7.png', false);
            generateUserCard(6, 'Nuelmar', 0, '../../assets/img/users/face6.png', false);

            generateUserCard(7, 'Julio', 1, '../../assets/img/users/face9.png', true);
            generateUserCard(8, 'Luz', 1, '../../assets/img/users/face8.png', false);
            generateUserCard(9, 'Vilma', 1, '../../assets/img/users/face2.png', false);
        });*/

        $('.expand-profile-picture').click((event)=>{
            $('.profile-title').addClass('expanded');
        });
    });

</script>