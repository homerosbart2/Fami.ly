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
    <span class="wall">
        <span class="central-container">
            <span class="group-title">
                <span class="information">
                    <span class="name">Ogáldez</span>
                    <span class="members">11 integrantes</span>
                </span>
                
            </span>
            <span class="post-container">
                <span id="4" class="post question">
                    <span class="user-name">Henry</span>
                    <span class="text">¿A dónde quieren salir en la noche?</span>
                    <span class="options">
                        <a class="see-more">Respuestas</a>
                        <a class="answer">Responder</a>
                    </span>
                    <span class="answers">
                        <!-- Lista de respuestas de la pregunta -->
                        <span class="answer"><span class="user">Alex</span> A Nais!!!</span>
                        <span class="answer me"> No sé de qué tengo ganas jajaja</span>
                        <span class="answer"><span class="user">Vilma</span> Mejor a Pollo Campero, más barato.</span>
                    </span>
                    <span class="time">10:27 AM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
            <span class="post-container">
                <span id="3" class="post message">
                    <span class="user-name">Vilma</span>
                    <span class="text">Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuu</span>
                    <span class="time">3:15 PM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
            <span class="post-container me">
                <span id="2" class="post message">
                    <span class="text">Adiós</span>
                    <span class="time">3:15 PM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
            <span class="post-container">
                <span id="1" class="post message">
                    <span class="user-name">Vilma</span>
                    <span class="text">Adiós ): </span>
                    <span class="time">3:15 PM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
            <span class="post-container">
                <span id="5" class="post message">
                    <span class="user-name">Vilma</span>
                    <span class="text">Adiós ): </span>
                    <span class="time">3:15 PM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
            <span class="post-container">
                <span id="6" class="post message">
                    <span class="user-name">Vilma</span>
                    <span class="text">Adiós ): </span>
                    <span class="time">3:15 PM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
            <span class="post-container">
                <span id="7" class="post message">
                    <span class="user-name">Vilma</span>
                    <span class="text">Adiós ): </span>
                    <span class="time">3:15 PM</span>
                    <span class="type"><i class="fas fa-circle"></i></span>
                </span>   
            </span>
        </span>
    </span>
    <span class="chatbox-container">
        <span class="chatbox">
            <input type="text" class="chatbox-input" placeholder="Escribe un mensaje">
            <a class="btn-chat"><i class="fas fa-paperclip"></i></a>
        </span>
        <span class="questionbox-container">
            <span class="questionbox">Pregunta</span>
        </span>
    </span>
</body>
</html>

<script>
    var question;
    var postId;
    var object;

    
    $(document).ready(function(){
        //Variable que indica que estamos en el wall de un grupo.
        wall = 1;

        //Función que se llama al dar click en la opción responder de las preguntas y muestra la pregunta sobre el chatbox.
        $('.answer').click(function(){
            question = $(this).parent().parent().children('.text').html();
            postId = $(this).parent().parent().prop('id');
            $('.questionbox').html(question);
            $('.questionbox-container').css('bottom', '55px');
            $('.chatbox-input').prop('placeholder', 'Responde la pregunta');
            $('.chatbox-input').prop('id', postId);
            triggerMask('questionbox');
        });

        $('.see-more').click(function(){
            object = $(this).parent().parent().children('.answers');
            if(object.css('height') == '0px'){
                object.css('height','auto');
            }else{
                object.css('height','0');
            }
        });

        //Función que se llama al presionar enter en el chat y obtiene el texto en la variable [text]. Si es una respuesta obtiene el id de la pregunta en la variable [postId].
        $('.chatbox-input').keyup(function(e){
            if(e.keyCode == 13)
            {
                text = $(this).val();
                if($(this).is('[id]')){
                    postId = $(this).prop('id');
                    console.log('Pregunta: ' + postId);
                    console.log('Respuesta: ' + text);
                    $('#' + postId).children('.answers').prepend('<span class="answer me">' + text + '</span>');
                    //Se esconde la pregunta.
                    $('.questionbox').css('bottom', '20px');
                    $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
                    $('.chatbox-input').removeAttr('id');
                    deactivateMask();
                }else{
                    console.log('Mensaje: ' + text);
                }
                $(this).val('');
                $(this).trigger("enterKey");
            }
        });
    });

    
</script>