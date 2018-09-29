<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
<?php
    include '../modules/nav.php';
?>
<body>
    <span class="wall">
        <span class="central-container">
            <span class="group-title">
                <span class="information">
                    <span class="name">Ogáldez</span>
                    <span class="members">11 integrantes</span>
                </span>
            </span>
            <span class="posts">
                <span class="date-separator">
                    Hoy
                </span>
                <span class="post-container">
                    <span id="10" class="post event im-in">
                        <span class="user-name">Marco</span>
                        <span class="event-date">
                            <i class="far fa-calendar"></i> 20 de marzo
                        </span>
                        <span class="text searchable">¡Cumpleaños de Fernando!</span>
                        <span class="extra-information">
                            <span class="description searchable">
                                Va a estar muy alegre, vengan todos!!
                            </span>
                            <span class="event-place">
                                <i class="fas fa-map-marker-alt"></i> <span class="searchable">Villas de Fátima</span>
                            </span>
                            <span class="event-time">
                                <i class="far fa-clock"></i> 1:00 PM
                            </span>
                        </span>
                        <span class="options">
                            <a class="confirmed">Confirmados <i class="fas fa-angle-down"></i></a>
                            <a class="assist">No Asistiré</a>
                        </span>
                        <span class="confirmed-users">
                            <!-- Lista de respuestas de la pregunta -->
                            <span class="user-container">
                                <i class="far fa-check-square"></i>
                                <img class="user" src="../../assets/img/users/face8.png">
                                <span class="name">Lilly</span>
                            </span>
                            <span class="user-container">
                                <i class="far fa-check-square"></i>
                                <img class="user" src="../../assets/img/users/face1.png">
                                <span class="name">Alex</span>
                            </span>
                            <span class="user-container">
                                <i class="far fa-check-square"></i>
                                <img class="user" src="../../assets/img/users/face2.png">
                                <span class="name">Vilma</span>
                            </span>
                            <span class="user-container">
                                <i class="far fa-check-square"></i>
                                <img class="user" src="../../assets/img/users/face9.png">
                                <span class="name">Jhonathan</span>
                            </span>
                            <span class="user-container me">
                                <i class="far fa-check-square"></i>
                                <img class="user" src="../../assets/img/users/profile.png">
                                <span class="name">Has indicado que asistirás a este evento.</span>
                            </span>
                        </span>
                        <span class="time">10:27 AM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="20" class="post poll">
                        <span class="user-name">Henry</span>
                        <span class="text searchable">¿A dónde quieren salir en la noche?</span>
                        <form class="answers">
                            <span class="answer">
                                <span class="radio-container">
                                    <input id="poll20-0" type="radio" name="poll" value="0">
                                    <label for="poll20-0" class="radio-button" >
                                        <i class="fas fa-check-circle"></i>
                                    </label>
                                    <span class="searchable"> Pollo Campero </span> 
                                </span>
                                <span class="quantity">3</span>
                                <span class="percent-container">
                                    <span class="percent"></span>
                                </span>
                            </span>
                            <span class="answer">
                                <span class="radio-container">
                                    <input id="poll20-1" type="radio" name="poll" value="1"> 
                                    <label for="poll20-1" class="radio-button" >
                                        <i class="fas fa-check-circle"></i>
                                    </label>
                                    <span class="searchable"> Nais </span> 
                                </span>
                                <span class="quantity">1</span>
                                <span class="percent-container">
                                    <span class="percent"></span>
                                </span>
                            </span>
                            <span class="answer">
                                <span class="radio-container">
                                    <input id="poll20-2" type="radio" name="poll" value="2"> 
                                    <label for="poll20-2" class="radio-button" >
                                        <i class="fas fa-check-circle"></i>
                                    </label>
                                    <span class="searchable"> La Estancia </span> 
                                </span>
                                <span class="quantity">1</span>
                                <span class="percent-container">
                                    <span class="percent"></span>
                                </span>
                            </span>
                        </form>
                        <span class="time">12:35 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container me">
                    <span id="4" class="post question">
                        <span class="text searchable">¿A dónde quieren salir en la noche?</span>
                        <span class="options">
                            <a class="see-more">Respuestas <i class="fas fa-angle-down"></i></a>
                            <a class="answer">Responder</a>
                        </span>
                        <span class="answers">
                            <!-- Lista de respuestas de la pregunta -->
                            <span class="answer"><span class="user">Alex</span><span class="searchable">A Nais!!!</span> </span>
                            <span class="answer me"><span class="searchable">No sé de qué tengo ganas jajaja</span> </span>
                            <span class="answer"><span class="user">Vilma</span><span class="searchable"> Mejor a Pollo Campero, más barato.</span></span>
                        </span>
                        <span class="time">10:27 AM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="3" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="1" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Adiós ): </span>
                        <span class="text searchable">Adiós ): </span>
                        <span class="text searchable">Adiós ): </span>
                        <span class="text searchable">Adiós ): </span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="date-separator">
                    27 de septiembre de 2018
                </span>
                <span class="post-container">
                    <span id="111" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="112" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="113" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="114" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="115" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="116" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">zzz</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="117" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="118" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="119" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="120" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="121" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="122" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="123" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="124" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
                <span class="post-container">
                    <span id="125" class="post message">
                        <span class="user-name">Vilma</span>
                        <span class="text searchable">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                        <span class="time">3:15 PM</span>
                        <span class="type"><i class="fas fa-circle"></i></span>
                    </span>   
                </span>
            </span>
        </span>
    </span>
    <span class="chatbox-container">
        <span class="chatbox">
            <input type="text" class="chatbox-input" placeholder="Escribe un mensaje">
            <a class="btn-chat"><i class="fas fa-bars"></i></a>
        </span>
        <span class="questionbox-container">
            <span class="questionbox">Pregunta</span>
        </span>
        <span class="post-form-container">
            <span class="form-container">
                <span class="arrow left-arrow">
                    <i class="fas fa-arrow-left"></i>
                </span>
                <span class="inputs-container">
                    <span class="inputs-left">
                        <span class="form event">
                            <span class="form-title">
                                <i class="far fa-calendar"></i> Evento
                            </span>
                            <span class="input-date">
                                <input type="text" class="day" placeholder="Día">
                                <span class="slash-separator">|</span>
                                <input type="text" class="month" placeholder="Mes">
                                <span class="slash-separator">|</span>
                                <input type="text" class="year" placeholder="Año">
                            </span>
                            <span class="input-time">
                                <input type="text" class="hour" placeholder="Hora">
                                <span class="slash-separator">:</span>
                                <input type="text" class="minutes" placeholder="Minutos">
                            </span>
                            <input type="text" class="event-ubication" id="poll-option-1" placeholder="Ubicación">
                            <input type="text" class="event-description" id="poll-option-1" placeholder="Descripción">
                        </span>
                    </span>
                    <span class="inputs-center">
                        <span class="form poll">
                            <span class="form-title">
                                <i class="fas fa-poll-h"></i> Votación
                            </span>
                            <input type="text" class="poll-option" id="poll-option-1" placeholder="Opción 1">
                            <input type="text" class="poll-option" id="poll-option-2" placeholder="Opción 2">
                            <input type="text" class="poll-option" id="poll-option-3" placeholder="Opción 3">
                            <input type="text" class="poll-option" id="poll-option-4" placeholder="Opción 4">
                        </span>
                    </span>
                    <span class="inputs-right">
                        <span class="form image-video">
                            <span class="form-title">
                                <i class="fas fa-image"></i> Imagen o Video
                            </span>
                        </span>
                    </span>
                </span>
                <span class="arrow right-arrow">
                    <i class="fas fa-arrow-right"></i>
                </span>
            </span>
            <span class="wide-central-container">
                <a class="btn-login hide-post-form"><i class="far fa-times-circle"></i></a>
            </span>
        </span>
    </span>
</body>
</html>

<script>
    var question;
    var postId;
    var quantity;
    var quantities = [];
    var sum;
    var time;
    var answers = [];
    var users = [];
    var options = [];
    var success = 1;

    function updatePercents(post){
        object = $('#' + post).children('.answers').find('.answer');
        object.each(function(){
            quantity = $(this).children('.quantity').text();
            quantities.push(quantity);
            sum += parseInt(quantity);
        });
        object.each(function(){
            quantity = $(this).children('.quantity').text();
            if(sum == 0){
                quantity = 0;
                $(this).children('.percent-container').children('.percent').css('width', quantity + '');
            }else{
                quantity = Math.round((quantity / sum) * 100);
                $(this).children('.percent-container').children('.percent').css('width', quantity + '%');
            }
            
        });
    }

    function updateQuantities(lmnt){
        object = lmnt.parent().parent();
        postId = object.parent().parent().prop('id');
        if(!object.parent().hasClass('answered')){
            quantity = parseInt(object.children('.quantity').text()) + 1;
            object.children('.quantity').html(quantity);
            object.parent().addClass('answered');
            object.addClass('selected');
        }else{
            if(!object.hasClass('selected')){
                quantity = parseInt(object.children('.quantity').text()) + 1;
                object.children('.quantity').html(quantity);
                quantity = parseInt(object.parent().children('.selected').children('.quantity').text()) - 1;
                object.parent().children('.selected').children('.quantity').html(quantity);
                object.parent().children('.selected').removeClass('selected');
                object.addClass('selected');
            }
        }
        sum = 0;
        updatePercents(postId);
    }

    function generateMessage(id, user, text, time, me){
        rows = '';
        if(me){
            rows += '<span class="post-container me">';
            rows += '<span id="'+id+'" class="post message">';
        }else{
            rows += '<span class="post-container">';
            rows += '<span id="'+id+'" class="post message">';
            rows += '<span class="user-name">'+user+'</span>';
        }
        rows += '<span class="text searchable">'+text+'</span>';
        rows += '<span class="time">'+time+'</span>';
        rows += '<span class="type"><i class="fas fa-circle"></i></span>';
        rows += '</span>';
        rows += '</span>';
        $('.posts').prepend(rows);
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }

    function generateQuestion(id, user, text, answers, users, time, me){
        rows = '';
        if(me){
            rows += '<span class="post-container me">';
            rows += '<span id="'+id+'" class="post question">';
        }else{
            rows += '<span class="post-container">';
            rows += '<span id="'+id+'" class="post question">';
            rows += '<span class="user-name">'+user+'</span>';
        }
        rows += '<span class="text searchable">'+text+'</span>';
        rows += '<span class="options">';
        rows += '<a class="see-more">Respuestas <i class="fas fa-angle-down"></i></a>';
        rows += '<a class="answer">Responder</a>';
        rows += '</span>';
        rows += '<span class="answers">';
        //Lista de respuestas de la pregunta
        for(i in answers){
            if(false){
                //Esto pasa si la respuesta es del usuario actual (Cambiar ).
                rows += '<span class="answer me"><span class="searchable">'+answers[i]+'</span></span>';
            }else{
                rows += '<span class="answer"><span class="user">'+users[i]+'</span><span class="searchable">'+answers[i]+'</span></span>';
            }
        }
        rows += '</span>';
        rows += '<span class="time">'+time+'</span>';
        rows += '<span class="type"><i class="fas fa-circle"></i></span>';
        rows += '</span>   ';
        rows += '</span>';
        $('.posts').prepend(rows);

        object = $('#'+id).children('.options');

        object.children('.answer').click(function(){
            showQuestionBoxContainer($(this));
        });

        object.children('.see-more').click(function(){
            showQuestionAnswers($(this));
        });
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }

    //Función que genera una publicación:votación la cual recibe un [id] nuevo de publicación, el [user] al que pertenece la publicación (Debe ser un string vacío si es del usuario actual), [text] que es el mensaje de la votación, [options] que son las opciones que ingresó el usuario (pueden venir de 1 a 4 opciones, tal vez más), [quantities] que es el arreglo de cantidades de votos por pregunta (¡DEBEN VENIR EN EL MISMO ORDEN QUE LAS OPCIONES!), [time] que es el tiempo de la publicación y [me] que es true si la publicación es del usuario que tiene a sesión y false si la publicación es de cualquier otro.
    function generatePoll(id, user, text, options, quantities, time, me){
        rows = '';
        if(me){
            rows += '<span class="post-container me">';
            rows += '<span id="'+id+'" class="post poll">';
        }else{
            rows += '<span class="post-container">';
            rows += '<span id="'+id+'" class="post poll">';
            rows += '<span class="user-name">'+user+'</span>';
        }
        rows += '<span class="text searchable">'+text+'</span>';
        rows += '<form class="answers">';
        for(i in options){
            rows += '<span class="answer">';
            rows += '<span class="radio-container">';
            rows += '<input id="poll'+id+'-'+i+'" type="radio" name="poll" value="0">';
            rows += '<label for="poll'+id+'-'+i+'" class="radio-button" >';
            rows += '<i class="fas fa-check-circle"></i>';
            rows += '</label>';
            rows += '<span class="searchable">'+options[i]+'</span>';
            rows += '</span>';
            rows += '<span class="quantity">'+quantities[i]+'</span>';
            rows += '<span class="percent-container">';
            rows += '<span class="percent"></span>';
            rows += '</span>';
            rows += '</span>';
        }
        rows += '</form>';
        rows += '<span class="time">'+time+'</span>';
        rows += '<span class="type"><i class="fas fa-circle"></i></span>';
        rows += '</span>   ';
        rows += '</span>';
        object = $('.chatbox-container');
        object.removeClass('expanded');
        hidePostCreatorForm();
        $('.posts').prepend(rows);
        sum = 0;
        updatePercents(id);
        $('#'+id).children('.answers').find('.answer').each(function(){
            $(this).children('.radio-container').children('.radio-button').click(function(){
                updateQuantities($(this));
            });
        });
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });

    }

    function showQuestionBoxContainer(lmnt){
        if(lmnt.parent().parent().hasClass('question')){
            question = lmnt.parent().parent().children('.text').html();
            postId = lmnt.parent().parent().prop('id');
            $('.questionbox').html(question);
            $('.questionbox-container').css('bottom', '55px');
            $('.questionbox-container').css('color', 'white');
            $('.chatbox-input').prop('placeholder', 'Responde la pregunta');
            $('.chatbox-input').prop('id', 'id' + postId);
            $('.chatbox-input').focus();
            triggerMask('questionbox');
        }
    }

    function showQuestionAnswers(lmnt){
        object = lmnt.parent().parent().children('.answers');
        if(!lmnt.hasClass('expanded')){
            object.css('height','auto');
            lmnt.addClass('expanded');
        }else{
            object.css('height','0');
            lmnt.removeClass('expanded');
        }
    }

    function hidePostCreatorForm(){
        object = $('.btn-chat');
        $('.chatbox-container').removeClass('expanded');
        $('.main-nav').removeClass('post-form-expanded');
        $('.the-line').css('top', '0');
        $('.main-nav').css('top', '4px');
        object.html('<i class="fas fa-bars"></i>');
        $('body').removeClass('disableScrollBar');
        $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
        object.removeClass('poll');
        object.removeClass('event');
        object.removeClass('image-video');
    }
    
    $(document).ready(function(){
        //Variable que indica que estamos en el wall de un grupo.
        wall = 1;

        //Función que se llama al dar click en la opción responder de las preguntas y muestra la pregunta sobre el chatbox.
        $('.answer').click(function(){
            showQuestionBoxContainer($(this))
        });

        $('.see-more').click(function(){
            showQuestionAnswers($(this));
        });

        //Función que se llama al presionar enter en el chat y obtiene el texto en la variable [text]. Si es una respuesta obtiene el id de la pregunta en la variable [postId] y agrega el comentario debajo de la pregunta.
        $('.chatbox-input').keyup(function(e){
            if(e.keyCode == 13)
            {
                success = 1;
                text = $(this).val();
                if(/\S/.test(text)){
                    if($('.btn-chat').hasClass('poll')){
                        //Esto sucede si es una votación
                        //Hay que generar un nuevo id y obtener la hora del servidor.
                        postId = 321;
                        time = '12:21 PM';
                        options = [];
                        quantities = [];
                        //En options se guardan las opciones ingresadas por el usuario que no tengan solo espacios en blanco.
                        $('.poll-option').each(function(){
                            if(/\S/.test($(this).val())){
                                options.push($(this).val());
                                quantities.push(0);
                            }
                        });
                        if(options.length > 1){
                            generatePoll(postId, '', text, options, quantities, time, true);
                        }else{
                            //Debe aparecer una notificación si no ingresa dos opciones o más.
                            success = 0;
                        }
                    }else if($(this).is('[id]')){
                        //Esto sucede si es una respuesta a alguna pregunta.
                        postId = ($(this).prop('id')).substr(2,$(this).prop('id').length);
                        $('#' + postId).children('.answers').prepend('<span class="answer me">' + text + '</span>');
                        //Se esconde la pregunta.
                        $('.questionbox-container').css('bottom', '20px');
                        $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
                        $('.chatbox-input').removeAttr('id');
                        deactivateMask();
                        //Se abren las respuestas si están cerradas.
                        object = $('#'+postId).children('.options').children('.see-more');
                        if(!object.hasClass('expanded')){
                            showQuestionAnswers(object);
                        }
                        scrollToMiddle($('#'+postId));
                    }else if(text.search('\\?')!=-1){
                        //Esto sucede si es una pregunta
                        //Hay que generar un nuevo id y obtener la hora del servidor.
                        postId = 321;
                        time = '12:21 PM';
                        answers = [];
                        users = [];
                        generateQuestion(postId, '', text, answers, users, time, true);
                    }else{
                        //Esto sucede si es un mensaje simple.
                        //Hay que generar un nuevo id y obtener la hora del servidor.
                        postId = 321;
                        time = '12:21 PM';
                        generateMessage(postId, '', text, time, true);
                    }
                    if(success == 1){
                        $(this).val('');
                    }
                    $(this).trigger("enterKey");
                }
            }
        });

        //Función que se llama al dar click en una opción de una votación.
        $('.radio-button').click(function(){
            updateQuantities($(this));
        });

        //Función para ver todos los confirmados de modo extendido.
        $('.confirmed').click(function(){
            if(!$(this).hasClass('expanded')){
                $(this).parent().parent().children('.confirmed-users').addClass('expanded');
                $(this).addClass('expanded');
            }else{
                $(this).parent().parent().children('.confirmed-users').removeClass('expanded');
                $(this).removeClass('expanded');
            }
        });

        //Función que se llama al dar click en Asistiré o No Asistiré
        $('.assist').click(function(){
            object = $(this).parent().parent();
            if(object.hasClass('im-in')){
                object.removeClass('im-in');
                $(this).html('Asisitiré');
            }else{
                object.addClass('im-in');
                $(this).html('No Asisitiré');
            }
        });

        //Función que se llama al presionar el botón de adjuntar. 
        $('.btn-chat').click(function(){
            object = $('.chatbox-container');
            if(!object.hasClass('expanded')){
                object.addClass('expanded');
                $('.main-nav').addClass('post-form-expanded');
                $('.the-line').css('top', '-55px');
                $('.main-nav').css('top', '-59px');
                $(this).html('<i class="fas fa-location-arrow"></i>');
                $('body').addClass('disableScrollBar');
                object = $('.inputs-center').children('.form');
                if(object.hasClass('poll')){
                    $('.chatbox-input').prop('placeholder', 'Escribe un tema para votar');
                    $(this).addClass('poll');
                }else if(object.hasClass('event')){
                    $('.chatbox-input').prop('placeholder', 'Escribe el título del evento');
                    $(this).addClass('event');
                }else if(object.hasClass('image-video')){
                    $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
                    $(this).addClass('image-video');
                }
            }else{
                //Acciones que se realizan al presionar el botón de enviar.
                var e = $.Event("keyup", {keyCode: 13});
                $('.chatbox-input').trigger(e);
            }
        });

        $('.hide-post-form').click(function(){
            hidePostCreatorForm();
        });

        //Función que se llama al presionar la flecha izquierda, que cambia de formulario.
        $('.left-arrow').children('i').click(function(){
            $('.inputs-right').css('opacity', '1');
            $('.inputs-left').css('opacity', '0');
            object = $('.inputs-center');
            object.addClass('lock');
            object.toggleClass('inputs-center inputs-left');
            if($('.inputs-right').children('.form').hasClass('poll')){
                $('.chatbox-input').prop('placeholder', 'Escribe un tema para votar');
                $('.btn-chat').toggleClass('event poll');
            }else if($('.inputs-right').children('.form').hasClass('event')){
                $('.chatbox-input').prop('placeholder', 'Escribe el título del evento');
                $('.btn-chat').toggleClass('image-video event');
            }else if($('.inputs-right').children('.form').hasClass('image-video')){
                $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
                $('.btn-chat').toggleClass('poll image-video');
            }
            $('.inputs-right').toggleClass('inputs-right inputs-center');
            $('.inputs-left').each(function(){
                if(!$(this).hasClass('lock')){
                    $(this).toggleClass('inputs-left inputs-right');
                }
            });
            object.removeClass('lock');
        });

        //Función que se llama al presionar la flecha izquierda, que cambia de formulario.
        $('.right-arrow').children('i').click(function(){
            $('.inputs-left').css('opacity', '1');
            $('.inputs-right').css('opacity', '0');
            object = $('.inputs-center');
            object.addClass('lock');
            object.toggleClass('inputs-center inputs-right');
            if($('.inputs-left').children('.form').hasClass('poll')){
                $('.chatbox-input').prop('placeholder', 'Escribe un tema para votar');$('.btn-chat').toggleClass('image-video poll');
            }else if($('.inputs-left').children('.form').hasClass('event')){
                $('.chatbox-input').prop('placeholder', 'Escribe el título del evento');
                $('.btn-chat').toggleClass('poll event');
            }else if($('.inputs-left').children('.form').hasClass('image-video')){
                $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
                $('.btn-chat').toggleClass('event image-video');
            }
            $('.inputs-left').toggleClass('inputs-left inputs-center');
            $('.inputs-right').each(function(){
                if(!$(this).hasClass('lock')){
                    $(this).toggleClass('inputs-right inputs-left');
                }
            });
            object.removeClass('lock');
        });

        $('.poll-option').on('input', function(){
            if(/\S/.test($(this).val())){
                $(this).addClass('with-text');
            }else{
                $(this).removeClass('with-text');
            }
        });

    });

    
</script>