<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $usuario_a_invitar = $_GET["to"];
    $grupo= $_GET["grupo"];
    //busco las notificaciones pertenecientes al usuario
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "INSERT INTO Invitaciones(usuario_emisor,usuario_receptor,grupo_id,estado) VALUES($usuario,$usuario_a_invitar,$grupo,'TRUE') RETURNING invitacion_id";
    $result = pg_query($link, $query);
    //variables
    $retorno = -1;
    $i = 0;
    if($result){
        $row = pg_fetch_assoc($result);
        $retorno = 1;
    }else{
        //esto pasa cuando una invitacion ya ha sido creada
        $retorno = -1;
    }        
    echo json_encode($retorno);
?>
