<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $pregunta = $_GET["pregunta"];
    $informacion = $_GET["informacion"];
    $grupo = $_GET["grupo"];
    //variables
    $create = -1;
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "INSERT INTO Respuestas(pregunta_id,usuario_id,informacion) VALUES($pregunta,$usuario,'$informacion')";
    $result = pg_query($link, $query);
    if($result){   
        $create = 1;
    }
    echo $create
?> 