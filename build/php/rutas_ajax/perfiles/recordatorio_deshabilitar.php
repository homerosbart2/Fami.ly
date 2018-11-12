<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros
    $sigue = $_POST["sigue"];  
    //se cambia el estado del recordatorio
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "UPDATE Sigue SET mostrar='FALSE' WHERE sigue_id = $sigue";
    $result = pg_query($link, $query);
    echo $create;
?>