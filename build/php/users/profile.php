<html>
<head>
    <title>Inicio</title>
    <?php
        include '../modules/nav.php';   
    ?>
</head>
<body>
    <section id="profile-section" class="profile-section">
    </section>
</body>

<script>
    var ActualUrl;
    function formatBirthday(date){
        var splittedDate = date.split("-");
        return `${splittedDate[2]} de ${months[parseInt(splittedDate[1]) - 1]}`;
    }

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
    function generateUserProfile(type, username, name, lastname, birthday, gender, country, image, groupsIds, groupsNames, following, wishes, callback){
        rows = '';

        rows += `<span class="central-container">`;
        rows += (following)? `<span class="profile-title following">` : `<span class="profile-title">`;
        rows += '<span class="wishlist-container">';
        rows += '<span class="wishlist-title"><i class="fas fa-gift"></i> Lista de Deseos</span>';
        rows += '<span class="wishlist">';
        if(wishes.length > 0){
            rows += '<span class="wishes">';
            for(i in wishes){
                rows += `<span class="wish">${wishes[i]} <a class="wish-delete"><i class="fas fa-times"></i></a></span>`;
            }
            rows += '</span>';
        }else{
            rows += `<span class="no-wishes"><i class="fas fa-box-open"></i> No tienes deseos</span>`;
        }
        rows += '</span>';
        rows += '</span>';
        rows += `<img class="title-bg" src="${image}">`;
        //#user-image-file es el input con la imagen.
        rows += (type == 0)? `<span class="profile-img flex-image me"><input type="file" onchange="(readImg(this));" id="user-image-file">` : `<span class="profile-img flex-image">`;
        rows += `<img src="${image}">`;
        rows += `<span class="img-update"><i class="far fa-caret-square-up"></i> Subir imagen</span>`;
        rows += `</span>`;
        rows += `<span class="name-container">`;
        rows += `<span class="user-lastnames">`;
        rows += `${lastname}`;
        rows += `</span>`;
        rows += `<span class="user-names">`;
        rows += `${name}`;
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
        rows += `<span id="btn-wishlist" class="btn-wishlist"><i class="fas fa-gift"></i></span>`;
        rows += `<span class="info-title">Información</span>`;
        rows += `<span class="birthday"><span class="icon"><i class="fas fa-birthday-cake"></i></span> ${birthday}</span>`;
        rows += `<span class="gender"><span class="icon"><i class="fas fa-mars"></i></span> ${gender}</span>`;
        rows += `<span class="country"><span class="icon"><i class="fas fa-globe-americas"></i></span> ${country}</span>`;
        rows += `</span>`;
        switch(type){
            //Usuario que inició sesión.
            case 0:
                rows += `<span class="family-information">`;
                rows += `<span class="info-title relatives">Grupos</span>`;
                for(i in groupsIds){
                    rows += `<span group-id="${groupsIds[i]}" class="users-container">`;
                    rows += `<span class="users-lastname">${groupsNames[i]}</span>`;
                    rows += `</span>`;
                }
                //rows += `<span class="info-title friends">Amigos</span>`;
                rows += `<span class="users-container">`;
                rows += `</span>`;
                break;
            //Cualquier otro usuario.
            case 1:
            rows += `<span class="family-information">`;
                rows += `<span class="info-title relatives">Grupos en común</span>`;
                for(i in groupsIds){
                    rows += `<span group-id="${groupsIds[i]}" class="users-container">`;
                    rows += `<span class="users-lastname">${groupsNames[i]}</span>`;
                    rows += `</span>`;
                }
                //rows += `<span class="info-title friends">Amigos</span>`;
                rows += `<span class="users-container">`;
                rows += `</span>`;
                break;
            rows += `</span>`;
        }
        rows += `</span>`;
        rows += `</span>`;
        
        $('.profile-section').html(rows);
        
        if(type == 1){
            $('.button-section').find('.follow').click((event)=>{
                if($('.profile-title').hasClass('following')){
                    follow(false);
                }else{
                    follow(true);
                }
            });
        }else if(type == 0){
            $('.img-update').click((event)=>{
                var element = $(event.currentTarget);
                $('#user-image-file').click();
            });
        }
        object = $('#profile-section').find('.central-container').find('.profile-title').find('.flex-image').find('img');
        object[0].onload = (event)=>{
            flexImage(event.target);
        }
        //flexImage($('#profile-section').find('.central-container').find('.profile-title').find('.flex-image'));
        setTimeout(() => {
            callback();
            $('.profile-title').css('opacity', '1');
            $('.title-bg').css('opacity', '1');
            $('.title-bg').css('transform', 'scale(1.2)');
            $('.profile-information-container').css('opacity', '1');
            $('#btn-wishlist').click((event)=>{
                object = $('.wishlist-container');
                if(object.hasClass('expanded')){
                    object.removeClass('expanded');
                    $('.btn-wishlist').removeClass('selected');
                } else {
                    object.addClass('expanded');
                    $('.btn-wishlist').addClass('selected');
                }
            });
        }, 10);
    }

    //Función para generar las tarjetas de usuario, que recibe [id] del usuario, [name] primer nombre del usuario, [lastname] que es 0 si el apellido en común es el primer apellido del usuario que inició sesión, 1 si el segundo es el común y 2 si no tienen apellidos en común, [image] que es el path a la imagen del usuario y [following] que es true si el usuario actual está siguiendo a este.
    function generateUserCard(id, name, group, image, following){
        rows = '';
        rows += (following)? `<span user-id="${id}" class="user-card following flex-image">` : `<span user-id="${id}" class="user-card flex-image">`;
        //rows += `<span class="follow-indicator"><i class="fas fa-check-circle"></i></span>`;
        rows += `<img class="image top-left" src="${image}">`;
        rows += `<span class="name">${name}</span>`;
        rows += `</span>`;
        $('.profile-information-container').find('.family-information').find('.users-container').each((index, element)=>{
            var element = $(element);
            if(element.attr('group-id') == group){
                element.append(rows);
                object = element.find('.user-card').last();
                (object.find('img')[0]).onload = (event)=>{
                    flexImage(event.target);
                };
                object.click((event)=>{
                    //TODO: Direccionar al perfil del usuario con el identificador [id].
                });
            }
        });
    }

    var imagenValida = false;
    function readImg(input) {
        if (input.files && input.files[0]) {        
            var file = input.files[0];
            imageFile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
            if (!(imageFile == match[0] || imageFile == match[1] || imageFile == match[2] || imageFile == match[3])){
                //alert("FORMATO NO VALIDO");
            }else {
                imagenValida = true;
                // var reader = new FileReader();
                // reader.onload = function (e) {
                //     $('.image-input-container').addClass('image-selected');
                //     $('#img-viewer').attr('src', e.target.result);
                // };
                // reader.readAsDataURL(input.files[0]);
                if(imagenValida){
                    //GUARDAMOS LA IMAGEN
                    const files = document.querySelector('[type=file]').files;
                    const formData = new FormData();
                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        formData.append('files[]', file);
                    }

                    fetch("../rutas_ajax/perfiles/upload.php?", 
                    {
                        method: 'POST',
                        body: formData
                    })
                    .then(function(response) {
                        return response.text();
                    })
                    .then(function(data) {
                        location.reload();
                    })
                    .catch(function(err) {
                        //console.error(err);
                    });
                }else{
                    //alert("seleccione un archivo valido");
                }                  
            }
        }
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
        flexImage();
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

    function listUserInfo(profile){
        var type = 1;
        if(profile == undefined) {
            profile="";
            type = 0;
        }
        $.ajax({
            url: "../rutas_ajax/perfiles/informacion_usuario.php?perfil=" + profile,
            type: "POST",
            success: function(r){
                obj = JSON.parse(r);
                //en 0 viene la informacion del usuario actual
                // nombreCompleto = obj[0].nombres + " " + obj[0].apellidos;
                var groups = [];
                var groupNames = [];
                var i;
                for(i = 1; i < obj.length; i++){
                    // if(obj[i][1].length > 0){
                        console.log(obj[i][0].apellido);
                        groups.push(obj[i][0].grupo_id);
                        groupNames.push(obj[i][0].apellido);
                    // }
                }
                generateUserProfile(type, obj[0].usuario, obj[0].nombres,obj[0].apellidos, formatBirthday(obj[0].fecha_nacimiento), 'Hombre', obj[0].pais, '../../assets/img/users/' + obj[0].name_img+"."+obj[0].formato_img, groups,groupNames,false, ['Dinero', 'Carro', 'Ropa', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro', 'Otro'], ()=>{
                    for(i = 1; i < obj.length; i++){
                        for(var j = 0; j < obj[i][1].length; j++){
                            generateUserCard(obj[i][1][j].usuario_id, obj[i][1][j].nombres.split(" ")[0], obj[i][0].grupo_id,'../../assets/img/users/' + obj[i][1][j].name_img+"."+obj[i][1][j].formato_img, false);
                        }
                    }
                });                         
            },
        });        
    }

    $(document).ready(()=>{
        actualUrl = window.location.href;
        profile = (actualUrl.split("=")[1]);
        listUserInfo(profile);
        //EXAMPLE: Ejemplo para generar un perfil de usuario ajeno.
        /* generateUserProfile(1, 'fernando.campos', ['Fernando', 'Andrés', 'Campos', 'Ogáldez'], '20 de febrero', 'Hombre', 'Guatemala', '../../assets/img/users/face9.png', true, ()=>{
            //EXAMPLE: Ejemplos para generar tarjetas de grupos como en la pantalla de inicio.
            generateGroupCard(1, 'Hogar', ['../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face3.png','../../assets/img/users/face4.png']);
            generateGroupCard(2, 'Campos', ['../../assets/img/users/face3.png','../../assets/img/users/face5.png','../../assets/img/users/face6.png','../../assets/img/users/face7.png']);
            generateGroupCard(3, 'Ogáldez', ['../../assets/img/users/face8.png','../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face9.png']);
        }); */

        //EXAMPLE: Ejemplo para generar un perfil de usuario actual.
        // generateUserProfile(0, 'henry.campos98', ['Henry', 'Alejandro', 'Campos', 'Ogáldez'], '20 de febrero', 'Hombre', 'Guatemala', '../../assets/img/users/profile.png', [3,4,5], ['Prueba1', 'Prueba2', 'Prueba3'], false, ()=>{
        //     //EXAMPLE: Ejemplos para generar tarjetas de usuario dependiendo del apellido.
        //     //TODO: No sé cómo vamos a hacer esto, podríamos agregar un botón en el perfil para indicar si esa persona es familiar y si es tío o abuela, pero se necesita otra tabla de familiares y en esa indicar si se está siguiendo o no.
        //     //TODO: Hay que verificar los apellidos y si se está siguiendo para mandar a llamar estas funciones.
        //     generateUserCard(1, 'Alex', 3, '../../assets/img/users/face1.png', true);
        //     generateUserCard(2, 'Dulce', 3, '../../assets/img/users/face5.png', true);
        //     generateUserCard(3, 'Henry', 4, '../../assets/img/users/face4.png', false);
        //     generateUserCard(4, 'Jhonathan', 4, '../../assets/img/users/face3.png', false);
            
        //     generateUserCard(5, 'Lorena', 4, '../../assets/img/users/face7.png', false);
        //     generateUserCard(6, 'Nuelmar', 4, '../../assets/img/users/face6.png', false);

        //     generateUserCard(7, 'Julio', 5, '../../assets/img/users/face9.png', true);
        //     generateUserCard(8, 'Luz', 5, '../../assets/img/users/face8.png', false);
        //     generateUserCard(9, 'Vilma', 5, '../../assets/img/users/face2.png', false);
        // });

        $('.expand-profile-picture').click((event)=>{
            $('.profile-title').addClass('expanded');
        });

    });

</script>