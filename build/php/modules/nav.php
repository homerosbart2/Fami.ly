<html>
    <body>
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
                    <li><a class="nav-option"><span class="option-icon notification"><i class="fas fa-bell"></i></span><span class="counter">2</span></a></li>
                    <li><a href="" class="nav-option"><span class="option-icon"><i class="fas fa-sign-out-alt"></i></span></a></li>
                </span>
                
            </ul>
            <span class="searchbox">
                <span class="search">
                    <input type="text" id="search-text" class="search-input" placeholder="Buscar">
                    <span class="icon">
                        <i class="fas fa-search"></i>
                    </span>
                </span>
            </span>
        </section>
    </body>
</html>

<script>
var wall = 0;

//Funciones para activar y desactivar la máscara.
function triggerMask(lmnt){
    $('.mask').css('z-index','10');
    $('.mask').prop('id', lmnt);
}

function deactivateMask(){
    $('.mask').css('z-index','-1');
    $('.mask').prop('id', '');
}


$(document).ready(function(){
    var text;
    var text2;
    var searchArray = [];
    var searchIndex;

    function removeSearchResult(){
        for(i = 0; i <= searchArray.length; i++){
            object = $('#' + searchArray.pop()).children('.text');
            text2 = object.text();
            object.html(text2);
        }
    }

    //Función que se llama al dar click en la parte del usuario y su foto.
    $('.nav-user').click(function(){
        window.location.href = "../users/profile.php";
    });
    $('.profile-img-preview').click(function(){
        window.location.href = "../users/profile.php";
    });
    //Función que se llama al presionar el botón de búsqueda y muestra la barra en modo móvil.
    $('#search').click(function(){
        $('.searchbox').css('z-index','2001');
        $('.searchbox').css('opacity','1');
        triggerMask('searchbox');
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
            $('.questionbox').css('bottom', '20px');
            $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
            $('.chatbox-input').removeAttr('id');
            deactivateMask();
        }
    });
    //Función que se llama al presionar enter en la barra de búsqueda y obtiene el texto en la variable [text].
    $('.search-input').keyup(function(e){
        if(e.keyCode == 13)
        { 
            text = $(this).val();
            //Si wall == 1 entonces estamos en el mural de algún grupo.
            if(wall == 1){
                removeSearchResult(searchArray);
                $('.post').each(function(){
                    object = $(this).children('.text');
                    text2 = object.text();
                    searchIndex = text2.search(text);
                    if(searchIndex != -1){
                        searchArray.push($(this).prop('id'));
                        object.html(text2.substring(0,searchIndex) + '<span class="search-result">' + text + '</span>' + text2.substring(searchIndex + text.length,text2.length));
                    }
                });
            }else{
                console.log(text);
            }
            $(this).trigger("enterKey");
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
        if (st > lastScrollTop && st > navbarHeight){
            // Scroll Down
            $('.the-line').css('top', '-55px');
            $('.main-nav').css('top', '-59px');
        } else {
            $('.the-line').css('top', '0');
            $('.main-nav').css('top', '4px');
        }
        
        lastScrollTop = st;
    }
});
</script>
