<?php 
    session_start();
    include 'links.php'; 
    $usuario_actual = "";
    $correo_actual = "";
    $usuario_actual_nombre = "";
    if(isset($_SESSION['usuario_actual'])){
        $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
        $usuario_actual = $_SESSION['usuario_actual']; 
        $usuario_actual_id = $_SESSION['usuario_actual_id'];
        $correo_actual = $_SESSION['correo_actual'];
        $usuario_actual_nombre = $_SESSION['usuario_actual_nombre'];
        $recordatorio = $_SESSION['recordatorio'];
        $group_array = array();
        $query = "SELECT P.grupo_id FROM PerteneceGrupo As P WHERE P.usuario_id=$usuario_actual_id";
        $result = pg_query($link, $query);
        if($result){
            $i = 0;
            while($row = pg_fetch_assoc($result)){
                $group_array[$i] = $row["grupo_id"];
                $i++;
            }
            //se guardan los grupos del usuario se utilizara para seguridad
            $_SESSION['grupos'] = json_encode($group_array);
        }      
        //solicitamos la informacion del usuario
        $user_img_path = "../../assets/img/users/default.png";
        $query = "SELECT U.formato_img,U.name_img FROM Usuarios As U WHERE U.usuario_id=$usuario_actual_id";
        $result = pg_query($link, $query);
        $row = pg_fetch_assoc($result);
        if($result){
            $user_img_path = "../../assets/img/users/".$row["name_img"].".".$row["formato_img"];
        }
        if($recordatorio == 1) $_SESSION['recordatorio'] = 0;
        echo "<script>";
            echo "var recordatorio=".$recordatorio.";";                 
        echo "</script>";                
    }else{       
        echo "<script>";
            echo "$(location).attr('href', '../login/login.php')";                 
        echo "</script>";    
    }
?>  
    </head>
    <body>
        <script>
            function flexImage(element) {
                //console.log(element);
                if(element !== undefined){
                    setSize(element)
                }else{
                    $(document).find('.flex-image').find('img').each((index, element)=>{
                        setSize(element);
                    });
                }

                function setSize(element){
                    var width = element.width;
                    var height = element.height;
                    if(width > height){
                        $(element).css('height', '100%');
                        $(element).css('width', 'auto');
                    }else{
                        $(element).css('height', 'auto');
                        $(element).css('width', '100%');
                    }
                    height = element.height / 2;
                    width = element.width / 2;
                    $(element).css('margin-top', `-${height}px`);
                    $(element).css('margin-left', `-${width}px`);
                    $(element).css('opacity', '1');
                }
            }
        </script>
        <?php
            include '../modules/notification-wall.php';
            include '../modules/reminder.php';
        ?>
        <span class="mask"></span>
        <span class="the-line"></span>
        <section id="header">
            <ul class="main-nav">
                <span class="logo-division">
                    <li><a href="" class="nav-logo">Fami.ly</a></li>
                </span>
                <span class="options-division">
                    <span class="profile-img-preview flex-image">
                        <!-- Imagen del usuario. -->
                        <img src=<?php echo $user_img_path?>>
                    </span>
                    <li class="nav-user">
                        <!-- Nombre de usuario. -->
                        <a>
                            <span class="user-alias"><b>@</b><?php echo $usuario_actual ?></span>
                        </a>
                        <span class="profile-link">Ver más</span>
                    </li>
                    <li>
                        <span class="in-searchbox">
                            <span class="search">
                                <input type="text" id="in-search-text" class="search-input" placeholder="Buscar">
                                <span class="icon">
                                    <span class="search-button in"><i class="fas fa-search"></i></span>
                                    <span class="search-left"><i class="fas fa-chevron-left"></i></span>
                                    <span class="search-right"><i class="fas fa-chevron-right"></i></span>
                                </span>
                            </span>
                        </span>
                    </li>
                    <li><a id="search" class="nav-option search-option"><span class="option-icon"><i class="fas fa-search"></i></span></a></li>
                    <li><a href="../groups/home.php" class="nav-option"><span class="option-icon"><i class="fas fa-home"></i></span></a></li>
                    <!-- En el span .counter se debe colocar la cantidad de notificaciones sin descartar. -->
                    <li><a id="notification" class="nav-option"><span class="option-icon notification"><i class="fas fa-bell"></i></span><span id="nav-counter" class="counter">0</span></a></li>
                    <li><a href="../rutas_ajax/session/logout.php" class="nav-option"><span class="option-icon"><i class="fas fa-sign-out-alt"></i></span></a></li>
                </span>
                
            </ul>
            <span class="searchbox">
                <span class="search">
                    <input type="text" id="search-text" class="search-input" placeholder="Buscar">
                    <span class="icon">
                        <span class="search-left"><i class="fas fa-chevron-left"></i></span>
                        <span class="search-right"><i class="fas fa-chevron-right"></i></span>
                        <span class="search-button"><i class="fas fa-search"></i></span>
                    </span>
                </span>
            </span>
            
            <span class="search-people-container">
                <span class="search-people">
                    <span class="search-people-result-container">
                    </span>
                    <span class="wide-central-container">
                        <a class="btn-exit-popup hide-search-people"><i class="far fa-times-circle"></i></a>
                    </span>
                </span>
            </span>
        </section>
    </body>

<script>
var wall = 0;
var lockNavSlide = false;
var size;
var object;
var rows = '';
var lastId = -1;
var top;
var searchPivot = 0;
var text;
var groupId;
var text2;
var searchArray = [];
var searchIndex;
var emojiRegex = /^(?:[\u2700-\u27bf]|(?:\ud83c[\udde6-\uddff]){2}|[\ud800-\udbff][\udc00-\udfff]|[\u0023-\u0039]\ufe0f?\u20e3|\u3299|\u3297|\u303d|\u3030|\u24c2|\ud83c[\udd70-\udd71]|\ud83c[\udd7e-\udd7f]|\ud83c\udd8e|\ud83c[\udd91-\udd9a]|\ud83c[\udde6-\uddff]|[\ud83c[\ude01\uddff]|\ud83c[\ude01-\ude02]|\ud83c\ude1a|\ud83c\ude2f|[\ud83c[\ude32\ude02]|\ud83c\ude1a|\ud83c\ude2f|\ud83c[\ude32-\ude3a]|[\ud83c[\ude50\ude3a]|\ud83c[\ude50-\ude51]|\u203c|\u2049|[\u25aa-\u25ab]|\u25b6|\u25c0|[\u25fb-\u25fe]|\u00a9|\u00ae|\u2122|\u2139|\ud83c\udc04|[\u2600-\u26FF]|\u2b05|\u2b06|\u2b07|\u2b1b|\u2b1c|\u2b50|\u2b55|\u231a|\u231b|\u2328|\u23cf|[\u23e9-\u23f3]|[\u23f8-\u23fa]|\ud83c\udccf|\u2934|\u2935|[\u2190-\u21ff])$/s;
var months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];

//Funciones para activar y desactivar la máscara.
function triggerMask(lmnt){
    $('.mask').css('z-index','10');
    $('.mask').prop('id', lmnt);
}

function deactivateMask(){
    $('.mask').css('z-index','-1');
    $('.mask').prop('id', '');
}

function scrollToMiddle(id) {
    var elem_position = $(id).offset().top;
    var window_height = $(window).height();
    var y = elem_position - window_height/4;
    window.scroll({
        top: y, 
        left: 0, 
        behavior: 'smooth' 
    });
}

//Función para enseñar la barra de búsqueda, si se manda [mask = true] se activa la máscara para descativar con click, si no, no se activa.
function showMobileSearchBar(mask){
    $('.searchbox').addClass('expanded');
    if(wall != 1){
        $('.search-people-container').addClass('expanded');
        $('body').addClass('disableScrollBar');
    }
    if(mask && wall == 1){
        triggerMask('searchbox');
    }
}

//Función opuesta de showMobileSearchBar.
function hideMobileSearchBar(mask){
    object = $('.searchbox');
    object.removeClass('expanded');
    object.children('.search').children('.search-input').val('');
    if(mask){
        deactivateMask();
    }
}

function removeSearchResult(){
    $('#'+searchArray[searchPivot]).parent().removeClass('search-result');
    size = searchArray.length;
    for(i = 0; i < size; i++){
        $('#' + searchArray.pop()).find('.searchable').each(function(){
            text2 = $(this).text();
            $(this).html(text2);
        }); 
    }
}

function hideCreateGroupBar(){
    deactivateMask();
    object = $('.group-creation-input-container');
    object.removeClass('expanded');
    $('.create-group').html('<i class="fas fa-th-large"></i> Crear Nuevo</a>');
}

//Función para generar un resultado de búsqueda, recibe [user] que es el nombre completo del usuario, [country] el país del usuario, [userImage] que es la ruta a la imagen del usuario e [invite] que es un booleano para saber si es un resultado de búsqueda para invitar a un grupo. Agrega los resultados dependiendo de [top], si es true los agrega al principio, si es false los agrega de último.
function generatePeopleResult(userId, user, country, userImage, invite, top){
    rows = '';
    rows += '<span class="people-result-container">';
    rows += '<img class="card-bg" src="'+userImage+'">';
    rows += '<span class="user-card flex-image">';
    rows += '<img src="'+userImage+'">';
    rows += '</span>';
    rows += '<span class="information">';
    rows += '<span class="user-name">'+user+'</span>';
    rows += '<span class="user-country"><i class="fas fa-globe-americas"></i> '+country+'</span>';
    rows += '</span>';
    rows += '<span class="options">';
    rows += '<a class="btn-login profile" id="'+ userId + '">Perfil</a>';
    if(invite){
        rows += '<a class="btn-login invite" id="' + userId + '">Invitar</a>';
    }
    rows += '</span>';
    rows += '</span>';
    object = $('.search-people-result-container');
    if(top){
        object.prepend(rows);
        object = object.find('.people-result-container').first().find('.flex-image').find('img');
        object[0].onload = (event)=>{
            flexImage(event.target);
        };
        setTimeout(() => {
            $('.search-people-result-container').find('.people-result-container').first().css('opacity', '1');
        }, 10);
    }else{
        object.append(rows);
        object = object.find('.people-result-container').last().find('.flex-image').find('img');
        object[0].onload = (event)=>{
            flexImage(event.target);
        };
        setTimeout(() => {
            $('.search-people-result-container').find('.people-result-container').last().css('opacity', '1');
        }, 10);
    }
}

//Función que se debe de llamar antes de empezar a llenar con resultados
function clearPeopleSearch(){
    rows = '';
    $('.search-people-result-container').html(rows);
}

//Función a llamar cuando no se encontró resultado en una búsqueda.
function noResultInSearch(){
    rows = '<span class="no-result"><i class="fas fa-search"></i> No hay resultado</span>';
    $('.search-people-result-container').html(rows);
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

$(document).ready(function(){

    $('#header').find('.flex-image').find('img').each((index, element)=>{
        flexImage(element);
    });

    noResultInSearch();

    $(document).on('click', '.profile', function() {
        id = $(this).attr("id"); //id de usuario
        // var params = "id=" + id;
        // code = btoa(params);
        // decode = atob(code);
        // console.log("code " + code);
        // console.log("decode " + decode);
        $(location).attr('href', '../users/profile.php?id=' + id);  
    });

    $(document).on('click', '.invite', function () {
        id = $(this).attr("id"); //id de usuario
        $.ajax({
            url: "../rutas_ajax/invitaciones/invitar.php?",
            type: "POST",
            data: "to=" + id + "&grupo=" + groupId,
            success: function(r){
                if(r == 1){
                    //alert("NOTIFICACION CREADA");
                }else{
                    showMessage("warning","Invitación.","El usuario ya tiene una invitación al grupo pendiente.");
                }
            },
        }); 
    });

    $('.hide-search-people').click(function(){
        $('.search-people-container').removeClass('expanded');
        $('.chatbox-container').removeClass('hidden');
        $('body').removeClass('disableScrollBar');
        windowWidth = $(window).width();
        if($('.searchbox').hasClass('expanded')){
            hideMobileSearchBar(false);
        }
    });

    $('.search-right').click(function(){
        $('.searchbox').find('#search-text').focus();
        if(searchArray.length > 0){
            $('#'+searchArray[searchPivot]).parent().removeClass('search-result');
            searchPivot++;
            if(searchPivot == searchArray.length){
                searchPivot = 0;
            }
            scrollToMiddle($('#'+searchArray[searchPivot]));
            $('#'+searchArray[searchPivot]).parent().addClass('search-result');
        }
    });

    $('.search-left').click(function(){
        $('.searchbox').find('#search-text').focus();
        if(searchArray.length > 0){
            $('#'+searchArray[searchPivot]).parent().removeClass('search-result');
            searchPivot--;
            if(searchPivot == -1){
                searchPivot = searchArray.length - 1;
            }
            scrollToMiddle($('#'+searchArray[searchPivot]));
            $('#'+searchArray[searchPivot]).parent().addClass('search-result');
        }
    });

    $('.search-button').click(function(){
        if(!$(this).hasClass('in')){
            object = $('.searchbox').find('#search-text');
        }else{
            object = $('.in-searchbox').find('#in-search-text');
        }
        object.focus();
        if(!$(this).hasClass('with-result')){
            var e = $.Event("keyup", {keyCode: 13});
            object.trigger(e);
        }else{
            removeSearchResult();
            $(this).html('<i class="fas fa-search"></i>');
            $(this).removeClass('with-result');
            object = $('.in-searchbox');
            object.find('.icon').removeClass('expanded');
            object.find('.search-input').removeClass('expanded');
            lockNavSlide = false;
        }
    });

    //Función que se llama al dar click en la parte del usuario y su foto.
    $('.nav-user').click(function(){
        window.location.href = "../users/profile.php";
    });
    $('.profile-img-preview').click(function(){
        window.location.href = "../users/profile.php";
    });
    //Función que se llama al presionar el botón de búsqueda y muestra la barra en modo móvil.
    $('#search').click(function(){
        showMobileSearchBar(true);f
        //Autofocus al searchbox, pero no me gustó.
        //object.children('.search').children('.search-input').focus();
    });
    //Función utilizada para desactivar la máscara y los objetos flotantes.
    $('.mask').click(function(){
        if($(this).prop('id') == 'searchbox'){
            hideMobileSearchBar(true);
            if(wall == 1){
                removeSearchResult(searchArray);
            }
        }else if($(this).prop('id') == 'questionbox'){
            $('.questionbox-container').css('bottom', '20px');
            $('.questionbox-container').css('color','#000B2B');
            $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
            $('.chatbox-input').removeAttr('id');
            deactivateMask();
            object = $('.emojibox-container');
            object.removeClass('double');
        }else if($(this).prop('id') == 'create-group'){
            hideCreateGroupBar();
        }
    });

    $('.notification-wall-container').click(function(){
        if($('.mask').prop('id') == 'searchbox'){
            $('.searchbox').css('z-index','1998');
            $('.searchbox').css('opacity','0');
            $('.searchbox').children('.search').children('.search-input').val('');
            deactivateMask();
            if(wall == 1){
                removeSearchResult(searchArray);
            }
        }
    });
    //Función que se llama al presionar enter en la barra de búsqueda y obtiene el texto en la variable [text].
    $('.search-input').keyup(function(e){
        lastId = -1;
        if(e.keyCode == 13)
        { 
            text = $(this).val();
            if(/\S/.test(text)){
                //Si wall == 1 entonces estamos en el mural de algún grupo.
                if(wall == 1 && !$('.search-people-container').hasClass('expanded')){
                    removeSearchResult(searchArray);
                    $('.post').each(function(){
                        object = $(this);
                        object.find('.searchable').each(function(){
                            text2 = $(this).text();
                            searchIndex = text2.search(new RegExp(text, "i"));
                            if(searchIndex != -1){
                                if(lastId != object.prop('id')){
                                    searchArray.push(object.prop('id'));
                                    lastId = object.prop('id');
                                }
                                $(this).html(text2.substring(0,searchIndex) + '<span class="search-result">' + text2.substring(searchIndex,searchIndex + text.length) + '</span>' + text2.substring(searchIndex + text.length,text2.length));
                            }
                        });
                    });
                    searchPivot = 0;
                    if(searchArray.length > 0){
                        scrollToMiddle($('#'+searchArray[0]));
                        $('#'+searchArray[0]).parent().addClass('search-result');
                        if($(this).prop('id') == 'in-search-text'){
                            object = $(this).parent().find('.search-button');
                            object.html('<i class="fas fa-times"></i>');
                            object.addClass('with-result');
                            object = $('.in-searchbox');
                            object.find('.icon').addClass('expanded');
                            object.find('.search-input').addClass('expanded');
                            lockNavSlide = true;
                        }
                    }
                }else{
                    //Esto sucede al buscar en otro lado que no sea wall.
                    //Se expanden los resultados al presionar enter.
                    if(!$('.search-people-container').hasClass('expanded') && $(this).prop('id') == 'in-search-text'){
                        $('.search-people-container').addClass('expanded');
                    }

                    clearPeopleSearch(); 
                    var type = false;
                    if(wall != 1) groupId = -1;
                    $.ajax({
                        url: "../rutas_ajax/personas/buscar.php?",
                        type: "POST",
                        data: "palabra=" + text + "&wall=" + wall + "&grupo=" + groupId,
                        success: function(r){
                            obj = JSON.parse(r);
                            if(obj.length > 0){
                                for(var i = 0; i < obj.length; i++){
                                    var tipo = true;
                                    if(obj[i].tipo == 'f') tipo = false;
                                    generatePeopleResult(obj[i].usuario_id, obj[i].nombres + " " + obj[i].apellidos,obj[i].pais,'../../assets/img/users/' + obj[i].name_img+'.'+obj[i].formato_img,tipo,true);
                                }
                            }else{
                                noResultInSearch();
                            }
                        },
                    });                            

                    //EXAMPLE: ejemplo para agregar resultados de una búsqueda en otro lado que no sea wall.
                    /*clearPeopleSearch();
                    generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/profile.png', false, true);
                    generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face4.png', false, true);
                    generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face3.png', false, true);
                    generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face5.png', false, true);
                    generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face6.png', false, true);*/
                }
                $(this).trigger("enterKey");
            }
        }
    });

    $('#notification').click(function(){
        object = $('.notification-wall-container');
        if(!object.hasClass('expanded')){
            object.addClass('expanded');
            $(this).addClass('expanded');
            $('.main-nav').addClass('notification-expanded');
            $('body').addClass('disableScrollBar');
        }else{
            /*object.removeClass('expanded');
            $(this).removeClass('expanded');
            $('.main-nav').removeClass('notification-expanded');*/
        }
    });

    // Hide Header on on scroll down
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('.main-nav').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);

    function hasScrolled() {
        var st = $(this).scrollTop();
        
        // Make sure they scroll more than delta
        if(Math.abs(lastScrollTop - st) <= delta)
            return;
        
        // If they scrolled down and are past the navbar, add class .nav-up.
        // This is necessary so you never see what is "behind" the navbar.
        if(!$('.main-nav').hasClass('post-form-expanded') & ($('.mask').prop('id') != 'searchbox') &!lockNavSlide){
            if (st > lastScrollTop && st > navbarHeight){
                // Scroll Down
                $('.the-line').css('top', '-55px');
                $('.main-nav').css('top', '-59px');
            } else {
                $('.the-line').css('top', '0');
                $('.main-nav').css('top', '4px');
            }
        }
        
        lastScrollTop = st;
    }
});
</script>
