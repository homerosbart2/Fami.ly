<!DOCTYPE html>
<html>
<head>
    <title>Inicio</title>
<?php
    include '../modules/nav.php';
    try {
        //si o si necesitamos que venga el parametro
        $id = $_GET["id"];
        if($id > 0){
            //verifico si el elemento se encuentra en el arreglo
            $group_array = json_decode($_SESSION['grupos']); 
            if (!(in_array($id, $group_array))) {
                echo "<script>";
                echo "$(location).attr('href', 'home.php')";
                echo "</script>";
            }  
            $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
            $query = "SELECT COUNT(*) as total_miembros, G.apellido, G.grupo_id FROM GruposFamiliares AS G, PerteneceGrupo AS P WHERE P.grupo_id = G.grupo_id AND G.grupo_id = $id GROUP BY G.grupo_id,G.apellido";
            $result = pg_query($link, $query);
            $retorno = array();
            $i = 0;
            if($result){
                $row = pg_fetch_assoc($result);
                $total_miembros = $row["total_miembros"];
                $grupo_nombre = $row["apellido"];
            }                      
            echo "<script>";
            echo "\n";
            echo "var groupId=".$id.";";
            echo "\n";
            echo "var usuarioId=".$usuario_actual_id.";";
            echo "\n";
            echo "var usuarioName='".$usuario_actual_nombre."';";
            echo "\n";
            echo "</script>";
        }else{
            echo "<script>";
            echo "$(location).attr('href', 'home.php')";
            echo "</script>";            
        }
    }catch(Exception $e) {
        echo "<script>";
        echo "$(location).attr('href', 'home.php')";
        echo "</script>";
    }
?>
<body>
    <span class="wall">
        <span class="posts-charging">
            <i class="fas fa-circle-notch fa-spin"></i>
        </span>
        <span class="central-container">
            <span class="group-title">
                <span class="information">
                    <span class="name"><?php echo $grupo_nombre ?></span>
                    <span class="members"><?php echo $total_miembros ?> INTEGRANTES</span>
                </span>
                <span class="options">
                    <a class="filter-option question"><span><i class="fas fa-question"></i></span></a>
                    <a class="filter-option poll"><span><i class="fas fa-poll-h"></i></span></a>
                    <a class="filter-option event"><span><i class="far fa-calendar"></i></span></a>
                    <a class="filter-option image"><span><i class="fas fa-image"></i></span></a>
                    <a class="btn-login">Invitar</a>
                </span>
            </span>
            <span class="posts">
            </span>
        </span>
    </span>
    <span class="chatbox-container">
        <span class="chatbox">
            <input type="text" class="chatbox-input" placeholder="Escribe un mensaje">
            <a class="btn-chat"><i class="fas fa-bars"></i></a>
            <span class="emoji-menu"><span class="btn-emoji"><i class="far fa-grin"></i></span></span>
        </span>
        <span class="emojibox-container">
            <span class="emojibox"><span class="emoji">😀</span><span class="emoji">😁</span><span class="emoji">😂</span><span class="emoji">🤣</span><span class="emoji">😃</span><span class="emoji">😄</span><span class="emoji">😅</span><span class="emoji">😆</span><span class="emoji">😉</span><span class="emoji">😊</span><span class="emoji">😋</span><span class="emoji">😎</span><span class="emoji">😍</span><span class="emoji">😘</span><span class="emoji">😗</span><span class="emoji">😙</span><span class="emoji">😚</span><span class="emoji">🙂</span><span class="emoji">🤗</span><span class="emoji">🤩</span><span class="emoji">🤔</span><span class="emoji">🤨</span><span class="emoji">😐</span><span class="emoji">😑</span><span class="emoji">😶</span><span class="emoji">🙄</span><span class="emoji">😏</span><span class="emoji">😣</span><span class="emoji">😥</span><span class="emoji">😮</span><span class="emoji">🤐</span><span class="emoji">😯</span><span class="emoji">😪</span><span class="emoji">😫</span><span class="emoji">😴</span><span class="emoji">😌</span><span class="emoji">😛</span><span class="emoji">😜</span><span class="emoji">😝</span><span class="emoji">🤤</span><span class="emoji">😒</span><span class="emoji">😓</span><span class="emoji">😔</span><span class="emoji">😕</span><span class="emoji">🙃</span><span class="emoji">🤑</span><span class="emoji">😲</span><span class="emoji">😞️</span><span class="emoji">🙁</span><span class="emoji">😖</span><span class="emoji">😟</span><span class="emoji">😤</span><span class="emoji">😢</span><span class="emoji">😭</span><span class="emoji">😦</span><span class="emoji">😧</span><span class="emoji">😨</span><span class="emoji">😩</span><span class="emoji">🤯</span><span class="emoji">😬</span><span class="emoji">😰</span><span class="emoji">😱</span><span class="emoji">😳</span><span class="emoji">🤪</span><span class="emoji">😵</span><span class="emoji">😡</span><span class="emoji">😠</span><span class="emoji">🤬</span><span class="emoji">😷</span><span class="emoji">🤒</span><span class="emoji">🤕</span><span class="emoji">🤢</span><span class="emoji">🤮</span><span class="emoji">🤧</span><span class="emoji">😇</span><span class="emoji">🤠</span><span class="emoji">🤡</span><span class="emoji">🤥</span><span class="emoji">🤫</span><span class="emoji">🤭</span><span class="emoji">🧐</span><span class="emoji">🤓</span><span class="emoji">😈</span><span class="emoji">👿</span><span class="emoji">👹</span><span class="emoji">👺</span><span class="emoji">💀</span><span class="emoji">👻</span><span class="emoji">👽</span><span class="emoji">🤖</span><span class="emoji">💩</span> </span>
        </span>
        <span class="questionbox-container">
            <span class="questionbox">Pregunta</span>
        </span>
        <span class="wall"></span>
        <span class="post-form-container">
            <span class="form-container">
                <span class="arrow left-arrow">
                    <span class="button">
                        <i class="fas fa-arrow-left"></i>
                    </span>
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
                            <a class="btn-cancel" id="add-poll-option"><i class="fas fa-plus"></i> AÑADIR</a>
                            <input type="text" class="poll-option" id="poll-option-1" placeholder="Opción 1">
                            <input type="text" class="poll-option" id="poll-option-2" placeholder="Opción 2">
                            <input type="text" class="poll-option" id="poll-option-3" placeholder="Opción 3">
                            <input type="text" class="poll-option" id="poll-option-4" placeholder="Opción 4">
                            <div id="options-poll"></div>

                        </span>
                    </span>
                    <span class="inputs-right">
                        <span class="form image-video">
                            <span class="form-title">
                                <i class="fas fa-image"></i> Imagen o Video
                            </span>
                            <span class="image-input-container">
                                <input type="file" onchange="readImg(this);" id="image-input" name="files[]"  accept="image/png, image/jpeg" />
                                <label for="image-input"><i class="fas fa-plus"></i></label>
                            </span>                         
                            <!-- NECESITO ESTE DIV CON ID "img-viewer" AQUI VOY A MOSTRAR AL CARGAR LA IMAGEN --> 
                            <span class="centered-image-container">
                                <span class="image-viewer-container">
                                    <img id="img-viewer"/>
                                </span>   
                            </span>                                
                        </span>
                    </span>     
                </span>
                <span class="arrow right-arrow">
                    <span class="button">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                </span>
            </span>
            <span class="wide-central-container">
                <a class="btn-exit-popup hide-post-form"><i class="far fa-times-circle"></i></a>
            </span>
        </span>
    </span>
</body>
</html>

<style>
    .ui-pnotify{
        /*CSS PARA PNOTIFY EDITADO*/
        top:0px;
        right:66px;
        left:0px;
    }

    input[type=file] {
        width: 100px;
        height: 100px;
        opacity: 0;
        overflow: hidden;
        position: relative;
        z-index: 5;
    }    
</style>

<script>
    var lastPostId = 0;
    var question;
    var postId;
    var quantity;
    var quantities = [];
    var sum;
    var time;
    var className;
    var className2;
    var answers = [];
    var users = [];
    var options = [];
    var success = 1;
    var months = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
    var month;
    var year;
    var day;
    var description;
    var hour;
    var minutes;
    var ubication;
    var windowWidth;
    var option;

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
        //[option] almacena la opción seleccionada.
        option = lmnt.parent().find('input').prop('id');
        optionId = (lmnt.parent().find('input')).attr("option");
        option = parseInt(option.substring(option.length-1, option.length));
        object = lmnt.parent().parent();
        postId = object.parent().parent().prop('id');
        votacionId = object.parent().parent().attr('votacion');
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
        // TODO: almacenar en la base de datos que el usuario actual votó en la opción [option] después de la llamada a updatePercents.
        $.ajax({
            url: "../rutas_ajax/publicaciones/votaciones/insertar_votos.php?grupo=" + groupId + "&votacion=" + votacionId + "&opcion=" + optionId,
            type: "POST",
            success: function(r){
                // if(r == 1) //creada
                // else if(r == 2) //editada
            },
        });        
    }

    //Función que se llama cada vez que se cambia de fecha, el separador tiene que salir arriba de todas las publicaciones que son de esa fecha.
    function generateDateSeparator(date){
        rows = '<span class="date-separator">'+date+'</span>';
        $('.posts').prepend(rows);
    }

    //Función para mostrar la animación de carga, si [show] es true entonces se muestra, si es false se oculta.
    function showChargingAnimation(show){
        if(show){
            $('.wall').find('.posts-charging').addClass('shown');
        }else{
            $('.wall').find('.posts-charging').removeClass('shown');
        }
    }

    function generateImage(id, user, text, image, time, me, createdLater){
        rows = '';
        if(me){
            rows += `<span class="post-container me">`;
            rows += `<span id="${id}" class="post image">`;
        }else{
            rows += `<span class="post-container">`;
            rows += `<span id="${id}" class="post image">`;
            rows += `<span class="user-name">${user}</span>`;
        }
        rows += `<span class="text searchable">${text}</span>`;
        rows += `<span class="image">`;
        rows += `<img src="${image}">`;
        rows += `</span>`;
        rows += `<span class="time">${time}</span>`;
        rows += `<span class="type"><i class="fas fa-circle"></i></span>`;
        rows += `</span>`;
        rows += `</span>`;
        $('.posts').prepend(rows);
        hidePostCreatorForm();
        $('.image-input-container').removeClass('image-selected');
        $('#img-viewer').attr('src', '');
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }

    //Función para generar un evento nuevo, la cual recibe el [id] de la publicación, el [user] al que pertenece la publicación, [text] que es el título del evento, la [description] del evento, la [ubication], [eventDate] que es la fecha en formato [12 de agosto], [eventTime] que es la hora del evento en formato [9:30 AM], [confirmedPeopleNames] que es el arreglo de los nombres de los usuarios que confirmaron, [confirmedPeopleImages] que es el arreglo con las rutas de las imágenes de los usuarios en el mismo orden que el arreglo anterior, [imIn] booleano que indica si el usuario actual confirmó el evento (Este no se agrega a los arreglos mencionados anteriormente), [time] que es la hora de creación, [me] booleano que indica si el evento pertenece al usuario actual y [createdLater] que indica si se creó la publicación antes o después de initWallListeners() (RECOMENDACIÓN: Te recomiendo obtener las publicaciones al principio de $(document).ready y mandar false, luego cada vez que se obtenga una nueva publicación sin recargar la página mandar true).
    function generateEvent(id, evento_id, user, text, description, ubication, eventDate, eventTime, confirmedPeopleNames, confirmedPeopleImages, imIn, time, me,imImgPath,createdLater){
        rows = '';
        if(me){
            rows += '<span class="post-container me">';
            if(imIn){
                rows += '<span id="'+id+'" evento="' + evento_id + '" class="post event im-in">';
            }else{
                rows += '<span id="'+id+'" evento="' + evento_id + '" class="post event">';
            }
        }else{
            rows += '<span class="post-container">';
            if(imIn){
                rows += '<span id="'+id+'" evento="' + evento_id + '" class="post event im-in">';
            }else{
                rows += '<span id="'+id+'" evento="' + evento_id + '" class="post event">';
            }
            rows += '<span class="user-name">'+user+'</span>';
        }
        rows += '<span class="event-date">';
        rows += '<i class="far fa-calendar"></i> ' + eventDate;
        rows += '</span>';
        rows += '<span class="text searchable">'+text+'</span>';
        rows += '<span class="extra-information">';
        rows += '<span class="description searchable">';
        rows += description;
        rows += '</span>';
        rows += '<span class="event-place">';
        rows += '<i class="fas fa-map-marker-alt"></i> <span class="searchable">'+ubication+'</span>';
        rows += '</span>';
        rows += '<span class="event-time">';
        rows += '<i class="far fa-clock"></i> ' + eventTime;
        rows += '</span>';
        rows += '</span>';
        rows += '<span class="options">';
        rows += '<a class="confirmed">Confirmados <i class="fas fa-angle-down"></i></a>';
        if(imIn){
            rows += '<a class="assist">No Asistiré</a>';
        }else{
            rows += '<a class="assist">Asistiré</a>';
        }
        rows += '</span>';
        rows += '<span class="confirmed-users">';
        for(i in confirmedPeopleNames){
            rows += '<span class="user-container">';
            rows += '<i class="far fa-check-square"></i>';
            rows += '<img class="user" src="'+confirmedPeopleImages[i]+'">';
            rows += '<span class="name">'+confirmedPeopleNames[i]+'</span>';
            rows += '</span>';
        }
        rows += '<span class="user-container me">';
        rows += '<i class="far fa-check-square"></i>';
        //TODO: Aquí hay que poner la imagen del usuario que inició sesión.
        rows += '<img class="user" src="' + imImgPath + '">';
        rows += '<span class="name">Asistirás a este evento.</span>';
        rows += '</span>';
        rows += '</span>';
        rows += '<span class="time">'+time+'</span>';
        rows += '<span class="type"><i class="fas fa-circle"></i></span>';
        rows += '</span>   ';
        rows += '</span>';
        object = $('.chatbox-container');
        object.removeClass('expanded');
        hidePostCreatorForm();
        $('.posts').prepend(rows);
        if(createdLater){
            object = $('#' + id).children('.options');
            object.children('.assist').click(function(){
                confirmEvent($(this));
            });
            
            object.children('.confirmed').click(function(){
                expandConfirmedPeople($(this));
            });
        }
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }

    //Función que genera un nuevo mensaje. Le mandas el [id] de la publicación, el nombre SOLAMENTE del usuario [user] al que pertenece la publicación, un arreglo [texts] donde mandas los mensajes (podés mandar a llamar la función sin preocuparte si el último mensaje es del mismo usuario, pero también podés mandar los mensajes del mismo usuario en un arreglo, te recomiendo la primera porque hay que preocuparse de mandarlo en orden contrario en el arreglo), la hora de la publicación [time] y un booleano [me] que dice si el mensaje es del usuario que inició sesión.
    function generateMessage(id, user, texts, time, me){
        rows = '';
        object = $('.posts').children('.post-container').first();
        if(me && object.hasClass('me') && object.children('.post').hasClass('message')){
            for(i in texts){
                if(texts[i].match(emojiRegex)){
                    rows += '<span class="text searchable"><span class="emoji">'+texts[i]+'</span></span>';
                }else{
                    rows += '<span class="text searchable">'+texts[i]+'</span>';
                }
            }
            object.children('.post').append(rows);
            object.children('.post').children('.time').html(time);
        }else if(object.children('.post').hasClass('message')){
            if(user == object.children('.post').children('.user-name').text()){
                for(i in texts){
                    if(texts[i].match(emojiRegex)){
                        rows += '<span class="text searchable"><span class="emoji">'+texts[i]+'</span></span>';
                    }else{
                        rows += '<span class="text searchable">'+texts[i]+'</span>';
                    }
                }
                object.children('.post').children('.text').last().after(rows);
                object.children('.post').children('.time').html(time);
            }else{
                if(me){
                    rows += '<span class="post-container me">';
                    rows += '<span id="'+id+'" class="post message">';
                }else{
                    rows += '<span class="post-container">';
                    rows += '<span id="'+id+'" class="post message">';
                    rows += '<span class="user-name">'+user+'</span>';
                }
                for(i in texts){
                    if(texts[i].match(emojiRegex)){
                        rows += '<span class="text searchable"><span class="emoji">'+texts[i]+'</span></span>';
                    }else{
                        rows += '<span class="text searchable">'+texts[i]+'</span>';
                    }
                    
                }
                rows += '<span class="time">'+time+'</span>';
                rows += '<span class="type"><i class="fas fa-circle"></i></span>';
                rows += '</span>';
                rows += '</span>';
                $('.posts').prepend(rows);
            }
        }else{
            if(me){
                rows += '<span class="post-container me">';
                rows += '<span id="'+id+'" class="post message">';
            }else{
                rows += '<span class="post-container">';
                rows += '<span id="'+id+'" class="post message">';
                rows += '<span class="user-name">'+user+'</span>';
            }
            for(i in texts){
                if(texts[i].match(emojiRegex)){
                    rows += '<span class="text searchable"><span class="emoji">'+texts[i]+'</span></span>';
                }else{
                    rows += '<span class="text searchable">'+texts[i]+'</span>';
                }
                
            }
            rows += '<span class="time">'+time+'</span>';
            rows += '<span class="type"><i class="fas fa-circle"></i></span>';
            rows += '</span>';
            rows += '</span>';
            $('.posts').prepend(rows);
        }
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }

    function IsInArray(array,valor){
        for(var i = 0; i < array.length; i++){
            if(array[i] == valor) return true;
        }
        return false;
    }

    //Función para generar una pregunta, la cual recibe [id] que es el id de la publicación, [user] al que pertenece, [text] que es la pregunta, [answers] que es un arreglo con las respuestas, [users] que es un arreglo con los usuarios autores (LAS RESPUESTAS Y USUARIOS DEBEN IR EN EL MISMO ORDEN), [time] que es el tiempo de creación, [me] booleano que indica si la publicación es del usuario actual y [createdLater] que indica si se creó la publicación antes o después de initWallListeners() (RECOMENDACIÓN: Te recomiendo obtener las publicaciones al principio de $(document).ready y mandar false, luego cada vez que se obtenga una nueva publicación sin recargar la página mandar true).
    //posicionUsuario si es -1 el usuario no ha contestado de lo contrario mostramos las respuestas del usuario
    function generateQuestion(id, pregunta_id, user, text, answers, users, time,respuestasUsuario, me, createdLater){
        rows = '';
        if(me){
            rows += '<span class="post-container me">';
            rows += '<span id="'+id+'" pregunta="' + pregunta_id + '" class="post question">';
        }else{
            rows += '<span class="post-container">';
            rows += '<span id="'+id+'" pregunta="' + pregunta_id + '" class="post question">';
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
            if(IsInArray(respuestasUsuario,i)){
                //TODO: Esto pasa si la respuesta es del usuario actual (Hay que comparar si users[i] == usuarioActual).
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

        if(createdLater){
            object = $('#'+id).children('.options');

            object.children('.answer').click(function(){
                showQuestionBoxContainer($(this));
            });

            object.children('.see-more').click(function(){
                showQuestionAnswers($(this));
            });
        }
        window.scroll({
            top: 0, 
            left: 0, 
            behavior: 'smooth' 
        });
    }

    //Función que genera una publicación:votación la cual recibe un [id] nuevo de publicación, el [user] al que pertenece la publicación (Debe ser un string vacío si es del usuario actual), [text] que es el mensaje de la votación, [options] que son las opciones que ingresó el usuario (pueden venir de 1 a 4 opciones, tal vez más), [quantities] que es el arreglo de cantidades de votos por pregunta (¡DEBEN VENIR EN EL MISMO ORDEN QUE LAS OPCIONES!), [selected] que es la opción seleccionada por el usuario que inició sesión (un -1 indica que el usuario no ha seleccionado ninguna opción), [time] que es el tiempo de la publicación, [me] que es true si la publicación es del usuario que tiene a sesión y false si la publicación es de cualquier otro, y [createdLater] que indica si se creó la publicación antes o después de initWallListeners() (RECOMENDACIÓN: Te recomiendo obtener las publicaciones al principio de $(document).ready y mandar false, luego cada vez que se obtenga una nueva publicación sin recargar la página mandar true).
    function generatePoll(id, votacion_id, user, text, options, quantities, selected, optionsIds, time, me, createdLater){
        rows = '';
        if(me){
            rows += '<span class="post-container me">';
            rows += '<span id="'+id+'" votacion="' + votacion_id + '" class="post poll">';
        }else{
            rows += '<span class="post-container">';
            rows += '<span id="'+id+'" votacion="' + votacion_id + '" class="post poll">';
            rows += '<span class="user-name">'+user+'</span>';
        }
        rows += '<span class="text searchable">'+text+'</span>';
        if(selected > -1){
            rows += '<form class="answers answered">';
        }else{
            rows += '<form class="answers">';
        }
        for(i in options){
            if(selected == i){
                rows += '<span class="answer selected">';
            }else{
                rows += '<span class="answer">';
            }
            rows += '<span class="radio-container">';
            if(selected == i){
                rows += '<input id="poll'+id+'-'+i+'" option="' + optionsIds[i] + '" type="radio" checked="true"  name="poll" value="0">';
            }else{
                rows += '<input id="poll'+id+'-'+i+'" option="' + optionsIds[i] + '" type="radio" name="poll" value="0">';
            }
            
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
        if(createdLater){
            $('#'+id).children('.answers').find('.answer').each(function(){
                $(this).children('.radio-container').children('.radio-button').click(function(){
                    updateQuantities($(this));
                });
            });
        }
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
            object = $('.emojibox-container');
            object.addClass('double');
            
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
        if($('.emojibox-container').hasClass('expanded-to-bottom')){
            $('.emojibox-container').removeClass('expanded-to-bottom');
            $('.emojibox-container').addClass('expanded-to-top');
            $('.form-container').find('.form').each(function(){
                $(this).removeClass('pushed');
            });
        }
        object.html('<i class="fas fa-bars"></i>');
        $('body').removeClass('disableScrollBar');
        $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
        object.removeClass('poll');
        object.removeClass('event');
        object.removeClass('image-video');
    }

    function confirmEvent(lmnt){
        object = lmnt.parent().parent();
        postId = parseInt(object.prop('id'));
        eventId = object.attr("evento");
        if(object.hasClass('im-in')){
            object.removeClass('im-in');
            lmnt.html('Asistiré');
        }else{
            object.addClass('im-in');
            lmnt.html('No Asistiré');
        }
        //TODO: almacenar o eliminar en la base de datos la entrada que indica que el usuario actual asistirá al evento con id [postId].
        $.ajax({
            url: "../rutas_ajax/publicaciones/eventos/insertar_asistencia.php?grupo=" + groupId + "&evento=" + eventId,
            type: "POST",
            success: function(r){
                console.log(r);
                // if(r == 1) //creada
                // else if(r == 2) //editada
            },
        });  
    }

    var imagenValida = false;
    function readImg(input) {
        if (input.files && input.files[0]) {        
            var file = input.files[0];
            imageFile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg", "image/webp"];
            if (!(imageFile == match[0] || imageFile == match[1] || imageFile == match[2] || imageFile == match[3])){
                $('#img-viewer').attr('src', 'uploads/novalid.png');
                $('#img-viewer').attr('height', 200)
                $('#img-viewer').attr('width', 200)
                imagenValida =  false;
                alert("FORMATO NO VALIDO");
            }else {
                imagenValida = true;
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('.image-input-container').addClass('image-selected');
                    $('#img-viewer').attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    }
    
    function expandConfirmedPeople(lmnt){
        if(!lmnt.hasClass('expanded')){
            lmnt.parent().parent().children('.confirmed-users').addClass('expanded');
            lmnt.addClass('expanded');
        }else{
            lmnt.parent().parent().children('.confirmed-users').removeClass('expanded');
            lmnt.removeClass('expanded');
        }
    }
    
function initWallListeners(){
        $('.options').find('.btn-login').click(function(){
            $('.search-people-container').addClass('expanded');
            $('.chatbox-container').addClass('hidden');
            $('body').addClass('disableScrollBar');
            windowWidth = $(window).width();
            if(windowWidth < 601){
                showMobileSearchBar(false);
            }
            window.scroll({
                top: 0, 
                left: 0,
                behavior: 'smooth'
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
        })

        $('#add-poll-option').on('click',function(){
            size = document.getElementsByClassName('poll-option').length;
            size++;
            var input = document.createElement('input')
            input.type = "text";
            input.placeholder = "Opción " + size;
            input.setAttribute("class", "poll-option");
            input.id = "poll-option-"+size;
            div = document.getElementById('options-poll');
            div.appendChild(input);           
        });
        
        //Evento para filtrar las publicaciones por tipo.
        $('.group-title').find('.filter-option').click(function(){
            className = $(this).attr('class').split(' ')[1]; 
            if(!$(this).hasClass('selected')){
                $('.group-title').find('.filter-option').each(function(){
                    if($(this).hasClass('selected')){
                        className2 = $(this).attr('class').split(' ')[1]; 
                        $('.post-container').each(function(){
                            if(!$(this).find('.post').hasClass(className2)){
                                $(this).css('display','flex');
                            }
                        });
                        $(this).removeClass('selected');
                    }
                });
                $('.post-container').each(function(){
                    if(!$(this).find('.post').hasClass(className)){
                        $(this).css('display','none');
                    }
                });
                $(this).addClass('selected');
            }else{
                $('.post-container').each(function(){
                    if(!$(this).find('.post').hasClass(className)){
                        $(this).css('display','flex');
                    }
                });
                $(this).removeClass('selected');
            }
        })

        $('.emoji-menu').find('.btn-emoji').click(function(){
            object = $('.emojibox-container');
            if(object.hasClass('expanded-to-top')){
                object.removeClass('expanded-to-top');
                $(this).removeClass('fas').addClass('far');
            }else if(object.hasClass('expanded-to-bottom')){
                object.removeClass('expanded-to-bottom');
                $('.form-container').find('.form').each(function(){
                    $(this).removeClass('pushed');
                });
                $(this).removeClass('fas').addClass('far');
            }else if($('.chatbox-container').hasClass('expanded')){
                object.addClass('expanded-to-bottom');
                $('.form-container').find('.form').each(function(){
                    $(this).addClass('pushed');
                });
                $(this).removeClass('far').addClass('fas');
            }else{
                object.addClass('expanded-to-top');
                $(this).removeClass('far').addClass('fas');
            }
        });

        $('.emoji').click(function(){
            text = $('.chatbox-input').val();
            $('.chatbox-input').val(text + $(this).text());
            $('.chatbox-input').focus();
        });

        //Función que se llama al dar click en la opción responder de las preguntas y muestra la pregunta sobre el chatbox.
        $('.answer').click(function(){
            showQuestionBoxContainer($(this))
        });

        $('.see-more').click(function(){
            showQuestionAnswers($(this));
        });
        
        //Funcion que muestra los mensajes
        function showMessage(type,title,text){
            var opts = {
                width: "100%"
            };
            opts.title = title;
            opts.text = text;
            opts.type = type;
            opts.styling = 'bootstrap3';
            new PNotify(opts);
        }

        //Función que se llama al presionar enter en el chat y obtiene el texto en la variable [text]. Si es una respuesta obtiene el id de la pregunta en la variable [postId] y agrega el comentario debajo de la pregunta.
        $('.chatbox-input').keyup(function(e){
            if(e.keyCode == 13)
            {
                success = 1;
                text = $(this).val();
                if(/\S/.test(text)){
                    if($('.btn-chat').hasClass('event')){
                        //Esto sucede si es un evento
                        //TODO: Hay que generar un nuevo id y obtener la hora del servidor.
                        postId = 321;
                        time = '12:21 PM';
                        confirmedPeopleNames = [];
                        confirmedPeopleImages = [];
                        day = $('.day').val();
                        month = months[(parseInt($('.month').val()) - 1)];
                        year = $('.year').val();
                        description = $('.event-description').val();
                        ubication = $('.event-ubication').val();
                        hour = $('.hour').val();
                        minutes = $('.minutes').val();
                        dateEvento = ($('.month').val())+"/"+day+"/"+year;
                        hourEvento = hour+":"+minutes+":00";
                        //TODO: Hay que verificar si la hora es AM o PM y si está entre 0 y 24.
                        //GUARDAMOS EL EVENTO
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/eventos/insertar.php?grupo=" + groupId + "&titulo=" + text + "&fecha=" + dateEvento + "&horario=" + hourEvento + "&ubicacion=" + ubication + "&descripcion=" + description,
                            type: "POST",
                            success: function(r){
                                if(r > 0){
                                    postsList(true,r);
                                }else{
                                    showMessage("error","Evento.","El evento no fue creado, verifique sus datos.");
                                }
                            }
                        });                        
                    }else if(($('.btn-chat').hasClass('image-video'))){
                        if(imagenValida){
                            //GUARDAMOS LA IMAGEN
                            const files = document.querySelector('[type=file]').files;
                            const formData = new FormData();
                            for (let i = 0; i < files.length; i++) {
                                let file = files[i];
                                formData.append('files[]', file);
                            }

                            fetch("../rutas_ajax/publicaciones/imagenes/insertar.php?grupo=" + groupId + "&informacion=" 
                            + text, {
                                method: 'POST',
                                body: formData
                            })
                            .then(function(response) {
                                return response.text();
                            })
                            .then(function(data) {
                                console.log('data = ', data);
                                if(data > 0) postsList(true,data);
                            })
                            .catch(function(err) {
                                console.error(err);
                            });
                        }else{
                            alert("seleccione un archivo valido");
                        }                        
                    }else if($('.btn-chat').hasClass('poll')){
                        //Esto sucede si es una votación
                        //TODO: Hay que generar un nuevo id y obtener la hora del servidor.
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
                            $.ajax({
                                url: "../rutas_ajax/publicaciones/votaciones/insertar.php?grupo=" + groupId + "&informacion=" + text + "&opciones=" + options,
                                type: "POST",
                                success: function(r){
                                    if(r > 0){
                                        postsList(true,r);
                                        // showMessage("success","Evento.","El evento se ha creado exitosamente.");
                                    }else{
                                        showMessage("error","Votación.","La votación no fue creada, verifique sus datos.");
                                    }
                                }
                            });                              
                        }else{
                            //TODO: Debe aparecer una notificación si no ingresa dos opciones o más.
                            showMessage("warning","Votación.","Debe ingresar 2 o más opciones.");
                            success = 0;
                        }
                    }else if($(this).is('[id]')){
                        //Esto sucede si es una respuesta a alguna pregunta.
                        postId = ($(this).prop('id')).substr(2,$(this).prop('id').length);
                        questionId = (document.getElementById(postId)).getAttribute("pregunta");
                        $('#' + postId).children('.answers').prepend('<span class="answer me">' + text + '</span>');
                        //Se esconde la pregunta.
                        $('.questionbox-container').css('bottom', '20px');
                        $('.chatbox-input').prop('placeholder', 'Escribe un mensaje');
                        $('.chatbox-input').removeAttr('id');
                        deactivateMask();
                        $('.emojibox-container').removeClass('double');
                        //Se abren las respuestas si están cerradas.
                        object = $('#'+postId).children('.options').children('.see-more');
                        if(!object.hasClass('expanded')){
                            showQuestionAnswers(object);
                        }
                        //TODO: almacenar en la base de datos la respuesta a la pregunta con id [postId].
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/preguntas/insertar_respuestas.php?grupo=" + groupId + "&pregunta=" + questionId + "&informacion=" + text,
                            type: "POST",
                            success: function(r){
                                // if(r == 1) //creada
                            },
                        });   
                        scrollToMiddle($('#'+postId));
                    }else if(text.search('\\?')!=-1){
                        //Esto sucede si es una pregunta
                        //TODO: Hay que generar un nuevo id y obtener la hora del servidor.
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/preguntas/insertar.php?grupo=" + groupId + "&informacion=" + [text],
                            type: "POST",
                            success: function(r){
                                // alert(r);
                                if(r > 0){
                                    postsList(true,r);
                                }else{
                                    showMessage("error","Pregunta.","La pregunta no fue creada, verifique sus datos.");
                                }
                            }
                        }); 
                        //TODO: almacenar en la base de datos después de la llamada a generateQuestion.
                    }else{
                        //Esto sucede si es un mensaje simple.
                        //TODO: Hay que generar un nuevo id y obtener la hora del servidor.
                        //GUARDAMOS EL MENSAJE
                        time = '12:21 PM';
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/mensajes/insertar.php?grupo=" + groupId + "&informacion=" + [text],
                            type: "POST",
                            success: function(r){
                                // alert(r);
                                if(r > 0){
                                    postsList(true,r);
                                    // showMessage("success","Mensaje.","El mensaje se ha creado exitosamente.");
                                }else{
                                    showMessage("error","Mensaje.","El mensaje no fue creado, verifique sus datos.");
                                }
                            }
                        });  
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
            expandConfirmedPeople($(this));
        });

        //Función que se llama al dar click en Asistiré o No Asistiré
        $('.assist').click(function(){
            confirmEvent($(this));
        });

        //Función que se llama al presionar el botón de adjuntar. 
        $('.btn-chat').click(function(){
            object = $('.chatbox-container');
            if(!object.hasClass('expanded')){
                object.addClass('expanded');
                $('.main-nav').addClass('post-form-expanded');
                $('.the-line').css('top', '-55px');
                $('.main-nav').css('top', '-59px');
                if($('.emojibox-container').hasClass('expanded-to-top')){
                    $('.emojibox-container').removeClass('expanded-to-top');
                    $('.emojibox-container').addClass('expanded-to-bottom');
                    $('.form-container').find('.form').each(function(){
                        $(this).addClass('pushed');
                    });
                }
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
        $('.left-arrow').children('.button').click(function(){
            console.log('hola');
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
        $('.right-arrow').children('.button').click(function(){
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

        $('.poll-option').keyup(function(e){
            if(e.keyCode == 13){
                var e = $.Event("keyup", {keyCode: 13});
                $('.chatbox-input').trigger(e);
            }
        });
    }

    function updatePosts () {
        setTimeout("postsList('true','',false)",2000); 
    }

    var showDate = 1;
    var dateBefore = ""; //con esta variable mantengo el cambio de fecha de publicaciones
    var dateInLetters = null;
    var horario = null;
    var typePost = false;
    var contador = 0;   
    function postsList(createAt,postId,loading){   
        if(loading == true) showChargingAnimation(true);
        $.ajax({
            url: "../rutas_ajax/publicaciones/listado.php?grupo=" + groupId + "&publicacion=" + postId + "&last=" + lastPostId,
            type: "POST",
            success: function(r){
                objParent = JSON.parse(r);
                size = objParent.length;
                // postsObject = {};
                for(var k = 0; k < objParent.length; k++){
                    publicacion_id = objParent[k].publicacion_id,
                    usuario_creador_id =  objParent[k].usuario_creador_id,
                    usuario_creador_nombre = objParent[k].nombres,
                    grupo_id = objParent[k].grupo_id,
                    tipo = objParent[k].tipo,
                    fecha_creacion = objParent[k].fecha_creacion
                    typePost = false;
                    //OBTENEMOS LA FECHA
                    var date = new Date(fecha_creacion);       
                    day = date.getDate();
                    month = months[(parseInt(date.getMonth()))];
                    year = date.getFullYear();
                    dateInLetters = day + ' de ' + month + ' del ' + year;
                    h = date.getHours();
                    m = date.getMinutes();
                    h = (h<10) ? '0' + h : h;
                    m = (m<10) ? '0' + m : m;
                    horario = h+":"+m;
                    if(dateBefore != dateInLetters){
                        showDate++;
                        if((showDate % 3)==0){            
                            showDate = 2;
                            generateDateSeparator(dateBefore);
                        }                  
                        dateBefore = day + ' de ' + month + ' del ' + year;
                    }              
                    if(usuarioId == usuario_creador_id) typePost = true; 
                    if(tipo == "E"){
                        //EVENTOS
                        var asistencia = [];
                        var asistenciaImagenes = [];
                        var imIn = false;
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/eventos/listado.php?grupo=" + groupId + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                evento_id = obj[0][0].evento_id;
                                titulo = obj[0][0].titulo;
                                informacion = obj[0][0].informacion;
                                fecha = obj[0][0].fecha;
                                hora = obj[0][0].hora;
                                lugar = obj[0][0].lugar;
                                for(var j = 0; j < obj[1].length; j++){
                                    usuario = obj[1][j].nombres;
                                    id = obj[1][j].usuario_id;
                                    estado = obj[1][j].estado
                                    path_img = "../../assets/img/users/" + obj[1][j].name_img + "." + obj[1][j].formato_img;
                                    if(estado == 1){
                                        if(id == usuarioId){ 
                                            imIn = true;
                                            imPath = path_img;
                                        } 
                                        else{ 
                                            asistencia.push(usuario);
                                            asistenciaImagenes.push(path_img);
                                        }
                                    }
                                }
                                var dateEvent = new Date(fecha);       
                                dayEvent = dateEvent.getDate();
                                 monthEvent = months[(parseInt(dateEvent.getMonth()))];
                                yearEvent = dateEvent.getFullYear();
                                dateInLettersEvent = dayEvent + ' de ' + monthEvent + ' del ' + year;
                                generateEvent(publicacion_id, evento_id, usuario_creador_nombre, titulo, informacion, lugar, dateInLettersEvent,hora, asistencia, asistenciaImagenes, imIn, horario, typePost,imPath, createAt);                                   
                            },
                            async: false // <- this turns it into synchronous
                        });               
                    }else if(tipo == "I"){
                        //IMAGENES                    
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/imagenes/listado.php?grupo=" + groupId + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                imagen_id = obj[0].imagen_id;
                                informacion = obj[0].informacion;
                                formato = obj[0].formato;
                                imgPath = "../../assets/img/posts/" + imagen_id + "." + formato;
                                generateImage(publicacion_id, usuario_creador_nombre, informacion, imgPath, horario, typePost, createAt);
                            },
                            async: false // <- this turns it into synchronous
                        });                         
                    }else if(tipo == "P"){
                        //PREGUNTAS
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/preguntas/listado.php?grupo=" + groupId + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                var respuestas = [];
                                var usuarios = [];
                                var respuestasUsuario = [];
                                obj = JSON.parse(r);
                                pregunta_id = obj[0][0].pregunta_id;
                                informacion = obj[0][0].informacion;
                                for(var b = 0; b < (obj[1]).length; b++){
                                        //itero sobre las respuestas
                                        respuesta_id = obj[1][b].respuesta_id;
                                        usuario = obj[1][b].nombre;
                                        usuario_id = obj[1][b].usuario_id;
                                        informacion = obj[1][b].informacion;
                                        usuarios.push(usuario);
                                        respuestas.push(informacion);
                                        if(usuario_id == usuarioId){
                                            respuestasUsuario.push(b);
                                        }
                                    }               
                                generateQuestion(publicacion_id, pregunta_id, usuario_creador_nombre, informacion,respuestas,usuarios,horario,respuestasUsuario,typePost,createAt);
                            },
                            async: false // <- this turns it into synchronous
                        });                  
                    }else if(tipo == "V"){
                        //VOTOS
                        var opciones = [];
                        var countOpciones = [];
                        var optionsIds = [];
                        var eligeUsuario = -1;
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/votaciones/listado.php?grupo=" + groupId + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                votacion_id = obj[0][0].votacion_id;
                                informacion = obj[0][0].informacion;
                                for(var a = 0; a < obj[1].length; a++){
                                    opcion_id = obj[1][a][0].opcion_id;
                                    informacion = obj[1][a][0].informacion;
                                    optionsIds.push(opcion_id);
                                    opciones.push(informacion);
                                    countOpciones.push((obj[1][a]).length - 1);
                                    for(var b = 1;  (eligeUsuario == -1 && b <= ((obj[1][a]).length - 1)); b++){
                                        //itero sobre las opciones para saber si el usuario a seleccionado alguna
                                        usuario = obj[1][a][b].usuario_id;
                                        if(usuario == usuarioId){
                                            eligeUsuario = a;
                                            break;
                                        }
                                    }
                                }                                  
                                generatePoll(publicacion_id, votacion_id, usuario_creador_nombre, informacion,opciones,countOpciones,eligeUsuario,optionsIds,horario,typePost,createAt);
                            },
                            async: false // <- this turns it into synchronous
                        });                         
                    }else if(tipo == "M"){
                        //MENSAJES                    
                        $.ajax({
                            url: "../rutas_ajax/publicaciones/mensajes/listado.php?grupo=" + groupId + "&publicacion_id=" + publicacion_id,
                            type: "POST",
                            success: function(r){
                                obj = JSON.parse(r);
                                mensaje_id = obj[0].mensaje_id;
                                informacion = obj[0].informacion;
                                generateMessage(publicacion_id, usuario_creador_nombre, [informacion],horario, typePost);
                            },
                            async: false // <- this turns it into synchronous
                        });             
                    }
                    contador++;    
                    if(contador==size){
                        generateDateSeparator(dateBefore)
                    };  
                    lastPostId = publicacion_id;
                }
                if(loading == true) showChargingAnimation(false);    
                updatePosts();                                               
            },
        });                   
    }

    $(document).ready(function(){
        // showChargingAnimation(true);
        //llamamos a las publicaciones
        postsList(true,"",true);
        //Variable que indica que estamos en el wall de un grupo.
        wall = 1;
        //EXAMPLE: Ejemplo para mostrar la animación de carga.
        //showChargingAnimation(true);
        
        //EXAMPLE: Ejemplos para agregar un resultado a la búsqueda.
        // clearPeopleSearch();
        // generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/profile.png', true, true);
        // generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face4.png', true, true);
        // generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face3.png', true, true);
        // generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face5.png', true, true);
        // generatePeopleResult('Vilma Yolanda Ogáldez Estrada', 'El Salvador', '../../assets/img/users/face6.png', true, true);
        
        //EXAMPLE: Ejemplo para decir que no hubo resultado en la búsqueda (Esta instrucción elimina los resultados agregados del ejemplo de arriba).
        // noResultInSearch();

        //EXAMPLE: Ejemplos para cada tipo de publicación:
        //EXAMPLE: Ejemplo mensaje simple.
        // generateMessage(74, 'Vilma', ['Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuuuu', 'Adiós 😢', 'Adiós 😢', 'Adiós 😢', 'Adiós 😢', 'zzz'], '3:15 PM', false)

        // generateMessage(100, 'DIego', ['Hola ¿Cómo estás? ¿Cómo te ha ido? aaaaaaaa jajajaja wuuuuuuuuuuuuu', 'Adiós 😢', 'Adiós 😢', 'Adiós 😢', 'Adiós 😢', 'zzz'], '3:20 PM', false)

            // //EXAMPLE: Ejemplo pregunta.
            // generateQuestion(75, '', '¿A dónde quieren salir en la noche?', ['A Nais!!!', 'No sé de qué tengo ganas jajaja', 'Mejor a Pollo Campero, más barato'], ['Alex', 'Fernando', 'Vilma'], '10:27 AM', true, false)

            // //EXAMPLE: Ejemplo evento.
            // generateEvent(77, 'Marco', '¡Cumpleaños de Fernando!', 'Va a estar muy alegre, vengan todos!!', 'Villas de Fátima', '20 de marzo', '1:00 PM', ['Jhonathan', 'Vilma', 'Alex', 'Lilly'], ['../../assets/img/users/face9.png', '../../assets/img/users/face2.png', '../../assets/img/users/face1.png', '../../assets/img/users/face8.png'], true, '10:27 PM', false, false);

            // //EXAMPLE: Ejemplo separador.
            // generateDateSeparator('27 de septiembre de 2018');

            // //EXAMPLE: Ejemplo votación.
            // generatePoll(76, 'Henry', '¿A dónde quieren salir en la noche?', ['Pollo Campero', 'Nais', 'La Estancia'], [3, 1, 1], 1, '12:35', false, false);

        //EXAMPLE: Ejemplo imagen.
        // generateImage(78, 'Henry', 'Recuerdo familiar', '../../assets/img/fam1.jpg', '3:52 PM', true, false);

        //EXAMPLE: Ejemplo separador.
        // generateDateSeparator('Hoy');

        //Función que asigna todos los eventos de los elementos en el mural.
        initWallListeners();

        //showChargingAnimation(false);
    });

    
</script>