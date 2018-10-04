        <?php
            include '../modules/links.php';
        ?>
    </head>
    <body>
        <?php
            include '../modules/notification-wall.php';
        ?>
        <span class="mask"></span>
        <span class="the-line"></span>
        <section id="header">
            <ul class="main-nav">
                <span class="logo-division">
                    <li><a href="" class="nav-logo">Fami.ly</a></li>
                </span>
                <span class="options-division">
                    <span class="profile-img-preview">
                        <!-- Imagen del usuario. -->
                        <img src="../../assets/img/users/profile.png">
                    </span>
                    <li class="nav-user">
                        <!-- Nombre de usuario. -->
                        <a>
                            <span class="user-alias"><b>@</b>henry.campos97</span>
                        </a>
                        <span class="profile-link">Ver más</span>
                    </li>
                    <li>
                        <span class="in-searchbox">
                            <span class="search">
                                <input type="text" id="search-text" class="search-input" placeholder="Buscar">
                                <span class="icon">
                                    <i class="fas fa-search"></i>
                                </span>
                            </span>
                        </span>
                    </li>
                    <li><a id="search" class="nav-option search-option"><span class="option-icon"><i class="fas fa-search"></i></span></a></li>
                    <li><a href="../groups/home.php" class="nav-option"><span class="option-icon"><i class="fas fa-home"></i></span></a></li>
                    <!-- En el span .counter se debe colocar la cantidad de notificaciones sin descartar. -->
                    <li><a id="notification" class="nav-option"><span class="option-icon notification"><i class="fas fa-bell"></i></span><span class="counter">2</span></a></li>
                    <li><a href="" class="nav-option"><span class="option-icon"><i class="fas fa-sign-out-alt"></i></span></a></li>
                </span>
                
            </ul>
            <span class="searchbox">
                <span class="search">
                    <input type="text" id="search-text" class="search-input" placeholder="Buscar">
                    <span class="icon">
                        <i class="fas fa-chevron-left search-left"></i>
                        <i class="fas fa-chevron-right search-right"></i>
                        <i class="fas fa-search"></i>
                    </span>
                </span>
            </span>
        </section>
    </body>

<script>
var wall = 0;
var size;
var object;
var rows = '';
var lastId = -1;
var top;
var searchPivot = 0;
var emojiRegex = /^(?:[\u2700-\u27bf]|(?:\ud83c[\udde6-\uddff]){2}|[\ud800-\udbff][\udc00-\udfff]|[\u0023-\u0039]\ufe0f?\u20e3|\u3299|\u3297|\u303d|\u3030|\u24c2|\ud83c[\udd70-\udd71]|\ud83c[\udd7e-\udd7f]|\ud83c\udd8e|\ud83c[\udd91-\udd9a]|\ud83c[\udde6-\uddff]|[\ud83c[\ude01\uddff]|\ud83c[\ude01-\ude02]|\ud83c\ude1a|\ud83c\ude2f|[\ud83c[\ude32\ude02]|\ud83c\ude1a|\ud83c\ude2f|\ud83c[\ude32-\ude3a]|[\ud83c[\ude50\ude3a]|\ud83c[\ude50-\ude51]|\u203c|\u2049|[\u25aa-\u25ab]|\u25b6|\u25c0|[\u25fb-\u25fe]|\u00a9|\u00ae|\u2122|\u2139|\ud83c\udc04|[\u2600-\u26FF]|\u2b05|\u2b06|\u2b07|\u2b1b|\u2b1c|\u2b50|\u2b55|\u231a|\u231b|\u2328|\u23cf|[\u23e9-\u23f3]|[\u23f8-\u23fa]|\ud83c\udccf|\u2934|\u2935|[\u2190-\u21ff])$/s;

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

$(document).ready(function(){
    var text;
    var text2;
    var searchArray = [];
    var searchIndex;

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

    $('.search-right').click(function(){
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

    //Función que se llama al dar click en la parte del usuario y su foto.
    $('.nav-user').click(function(){
        window.location.href = "../users/profile.php";
    });
    $('.profile-img-preview').click(function(){
        window.location.href = "../users/profile.php";
    });
    //Función que se llama al presionar el botón de búsqueda y muestra la barra en modo móvil.
    $('#search').click(function(){
        object = $('.searchbox');
        object.css('z-index','2001');
        object.css('opacity','1');
        triggerMask('searchbox');
        //Autofocus al searchbox, pero no me gustó.
        //object.children('.search').children('.search-input').focus();
    });
    //Función utilizada para desactivar la máscara y los objetos flotantes.
    $('.mask').click(function(){
        if($(this).prop('id') == 'searchbox'){
            $('.searchbox').css('z-index','1998');
            $('.searchbox').css('opacity','0');
            $('.searchbox').children('.search').children('.search-input').val('');
            deactivateMask();
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
            //Si wall == 1 entonces estamos en el mural de algún grupo.
            if(wall == 1){
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
                }
            }else{
                console.log(text);
            }
            $(this).trigger("enterKey");
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
        if(!$('.main-nav').hasClass('post-form-expanded') & ($('.mask').prop('id') != 'searchbox')){
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
