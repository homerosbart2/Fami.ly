<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $usuario_a_invitar = $_POST["to"];
    $grupo= $_POST["grupo"];
    //busco las notificaciones pertenecientes al usuario
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "INSERT INTO Invitaciones (usuario_emisor_id, usuario_receptor_id,grupo_id,fecha_creacion) SELECT $usuario,$usuario_a_invitar,$grupo,CURRENT_TIMESTAMP WHERE NOT EXISTS (SELECT I.invitacion_id FROM Invitaciones AS I WHERE usuario_receptor_id = $usuario_a_invitar AND grupo_id = $grupo AND estado='TRUE') RETURNING invitacion_id";
    $result = pg_query($link, $query);
    //variables
    $retorno = -1;
    $i = 0;
    if($result){
        $row = pg_fetch_assoc($result);
        if($row){
            //creacion de notificaciones para cada usuario perteneciente al grupo
            $invitacion = $row["invitacion_id"];
            $query = "INSERT INTO NotificacionesInvitaciones(invitacion_id) VALUES ($invitacion)";
            pg_query($link, $query);        
            $retorno = 1;
        }
    }       
    echo json_encode($retorno);
?>
