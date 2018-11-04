<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros
    $notificacion = $_GET["notificacion"];  
    //variables 
    $create = -1;
    //se cambia el estado de la notificacion
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "UPDATE Notificaciones SET estado='FALSE' WHERE notificacion_id = $notificacion";
    $result = pg_query($link, $query);
    if($result){
        $create = 1;
    }        
    echo $create;
?>