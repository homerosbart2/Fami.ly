<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    $group_array = json_decode($_SESSION['grupos']); 
    //parametros
    $show = $_GET["show"];
    //busco las notificaciones pertenecientes al usuario
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    if($show == 1){
        //primera carga
        $query = "SELECT I.invitacion_id, N.notificacion_invitacion_id, U.nombres AS usuario_creador, G.grupo_id, G.apellido, I.fecha_creacion FROM Invitaciones AS I, Usuarios AS U, GruposFamiliares AS G, NotificacionesInvitaciones AS N WHERE N.estado = 'TRUE' AND I.invitacion_id = N.invitacion_id AND I.usuario_receptor_id = U.usuario_id AND I.usuario_receptor_id = $usuario AND I.grupo_id = G.grupo_id ORDER BY I.fecha_creacion ASC";
        $result = pg_query($link, $query);
    }else{
        $query = "SELECT I.invitacion_id, N.notificacion_invitacion_id, U.nombres AS usuario_creador, G.grupo_id, G.apellido, I.fecha_creacion FROM Invitaciones AS I, Usuarios AS U, GruposFamiliares AS G, NotificacionesInvitaciones AS N WHERE N.estado = 'TRUE' AND N.mostrar = 'TRUE' AND I.invitacion_id = N.invitacion_id AND I.usuario_receptor_id = U.usuario_id AND I.usuario_receptor_id = $usuario AND I.grupo_id = G.grupo_id ORDER BY I.fecha_creacion ASC";
        $result = pg_query($link, $query);
    }
    //variables
    $retorno = array();
    $i = 0;
    if($result){
        while($row = pg_fetch_assoc($result)){
            $retorno[$i] = $row;
            $notificacion = $row["invitacion_id"];
            $i++;
            //me sirve para saber si al usuario ya se le fueron desplegadas o no las notificaciones para no estarlas pidiendo de nuevo
            $query = "UPDATE NotificacionesInvitaciones SET mostrar = 'false' WHERE invitacion_id = $notificacion";
            $result2 = pg_query($link, $query);            
        }  
    }        
    echo json_encode($retorno);
?>