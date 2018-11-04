    <?php
        include '../modules/links.php';
    ?>
</head>
<?php
    include '../modules/nav.php';
?>
<body>
    <section class="groups-section">
        <span class="wide-central-container group-creation-input-container">
            <span class="group-creation-input">
                <input class="group-creation" type="text" placeholder="Nombre del grupo">
            </span>
        </span>
        <span class="wide-central-container options-container">
            <span class="options">
                <a class="btn-login create-group"><i class="fas fa-th-large"></i> Crear Nuevo</a>
            </span>
        </span>
        <span class="central-container">
            <span class="groups-container">
            </span>
        </span>
    </section>
</body>
</html>

<script>

function flexFont() {
    var divs = document.getElementsByClassName("flexFont");
    for(var i = 0; i < divs.length; i++) {
        var relFontsize = divs[i].offsetWidth*0.12;
        divs[i].style.fontSize = relFontsize+'px';
    }
};

window.onload = function(event) {
    flexFont();
};

window.onresize = function(event) {
    flexFont();
};

    //Función para generar las tarjetas de los grupos, que recibe el [id] del grupo, [name] del grupo, [images] que son 4 imágenes al azar de los miembros del grupo, podrían ser las imágenes de las primeras 4 personas del grupo e [invitationId] que es el identificador de la invitación. (Si no es una invitación, no se debe enviar el argumento [invitationId])
    function generateGroupCard(id, name, images, invitationId){
        rows = '';
        var count = 0;
        var empty = (images.length == 0)? ' empty' : '';
        var invite = (invitationId !== undefined)? ' invitation' : '';
        rows += `<span id="${id}" class="group-card${empty}${invite}">`;
        for(i in images){
            rows += '<span class="image flex-image">';
            rows += `<img src="${images[i]}">`;
            rows += '</span>';
            count ++;
        }
        while(count < 4){
            rows += '<span class="image flex-image">';
            rows += '</span>';
            count++;
        }
        rows += '<span class="information">';
        rows += `<span class="name flexFont">${name}</span>`;
        rows += (invitationId !== undefined)? '<span class="invite-text">Invitación</span>' : '';
        rows += '</span>';
        if(invitationId !== undefined){
            rows += `<span invitation-id="${invitationId}" class="options">`;
            rows += '<a class="cancel btn-login"><i class="far fa-times-circle"></i></a>';
            rows += '<a class="accept btn-login"><i class="far fa-check-circle"></i></a>';
            rows += '</span>';
        }
        rows += '</span>';
        $('.groups-container').append(rows);
        flexImage($(`#${id}`));
        flexFont();
        if(invitationId !== undefined){
            $('#' + id).find('.options').find('.accept').click((event)=>{
                //alert("entra");
                $.ajax({
                    url: "../rutas_ajax/invitaciones/cambiar_estado.php?invitacion=" + invitationId + "&tipo=1",
                    type: "POST",
                    success: function(r){
                        if(r > 0){
                            // $(location).attr('href', 'wall.php?id=' + r);
                        }
                    },
                });                
            });

            $('#' + id).find('.options').find('.cancel').click((event)=>{
                $.ajax({
                    url: "../rutas_ajax/invitaciones/cambiar_estado.php?invitacion=" + invitationId + "&tipo=0",
                    type: "POST",
                    success: function(r){
                        if(r == -1){
                            // $(location).attr('href', 'home.php?');
                        }
                    },
                });  ;
            });
        }
        $(`#${id}`).css('opacity', '1');
    }

function listGroups(){
    //lista los grupos a los que el usuario pertenece
    $.ajax({
        url: "../rutas_ajax/grupos/listado.php?",
        type: "POST",
        success: function(r){
            obj = JSON.parse(r);
            for(var i = 0; i < obj.length; i++){
                grupo_id = obj[i][0].grupo_id;
                apellido = obj[i][0].apellido;
                var personas = [];
                for(var j = 0; (j < obj[i][1].length && j < 4); j++){
                    path = "../../assets/img/users/" + obj[i][1][j].name_img + "." + obj[i][1][j].formato_img;
                    personas.push(path);
                }
                generateGroupCard(grupo_id, apellido, personas); 
            }                         
        },
    });
}

function listInvitaciones(){
    //lista los grupos a los que el usuario pertenece
    $.ajax({
        url: "../rutas_ajax/invitaciones/listado.php?",
        type: "POST",
        success: function(r){
            obj = JSON.parse(r);
            for(var i = 0; i < obj.length; i++){
                grupo_id = obj[i].grupo_id;
                apellido = obj[i].apellido; //apellido del grupo
                usuario_receptor_apellidos = obj[i].apellidos;
                usuario_receptor_nombres = obj[i].nombres;
                invitacion_id = obj[i].invitacion_id;
                generateGroupCard(grupo_id, apellido, [], invitacion_id); 
            }                         
        },
    });
}


$(document).ready(function(){
    $('.options-container').css('opacity', '1');
    listInvitaciones();
    listGroups();
    object = $('.searchbox');
    object.find('.search-right').css('display', 'none');
    object.find('.search-left').css('display', 'none');

        // generateGroupCard(1, 'Hogar', ['../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face3.png','../../assets/img/users/face4.png']);
        // generateGroupCard(2, 'Campos', ['../../assets/img/users/face3.png','../../assets/img/users/face5.png','../../assets/img/users/face6.png','../../assets/img/users/face7.png']);
        // generateGroupCard(3, 'Ogáldez', ['../../assets/img/users/face8.png','../../assets/img/users/face1.png','../../assets/img/users/face2.png','../../assets/img/users/face9.png'], 345);

        $(document).on('click', '.group-card', function () {
            id = $(this).attr("id");
            $(location).attr('href', 'wall.php?id=' + id);
        });

        $('.create-group').click(function(){
            object = $('.group-creation-input-container');
            if(!object.hasClass('expanded')){
                object.addClass('expanded');
                $(this).html('<i class="fas fa-check-circle"></i> Aceptar');
                triggerMask('create-group');
            }else{
                var e = $.Event("keyup", {keyCode: 13});
                $('.group-creation').trigger(e);
            }
        });

    $('.group-creation').keyup(function(e){
        if(e.keyCode == 13){
            text = $(this).val();
            if(/\S/.test(text)){
                //CREAMOS EL GRUPO EN LA DB             
                $.ajax({
                    url: "../rutas_ajax/grupos/insertar.php?apellido=" + text,
                    type: "POST",
                    success: function(r){
                        if(r > 0){
                            groupId = r;
                            generateGroupCard(groupId, text, []);
                            hideCreateGroupBar();
                            $(this).val('');
                            $(this).trigger("enterKey");                            
                        }
                    },
                    async: false // <- this turns it into synchronous
                });                             
            }
        }
    });
});
</script>