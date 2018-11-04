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
        $query = "SELECT N.notificacion_id, P.tipo, P.publicacion_id, N.usuario_receptor_id, G.apellido, N.estado, U.nombres AS usuario_creador, P.grupo_id, P.tipo, P.fecha_creacion FROM Notificaciones AS N,Usuarios AS U, Publicaciones AS P, GruposFamiliares AS G WHERE P.grupo_id = G.grupo_id AND N.publicacion_id = N.publicacion_id AND N.usuario_receptor_id = $usuario AND U.usuario_id = P.usuario_creador_id AND N.estado = 'TRUE' AND P.publicacion_id = N.publicacion_id ORDER BY P.fecha_creacion ASC";
        $result = pg_query($link, $query);
    }else{
        $query = "SELECT N.notificacion_id, P.tipo, P.publicacion_id, N.usuario_receptor_id, G.apellido, N.estado, U.nombres AS usuario_creador, P.grupo_id, P.tipo, P.fecha_creacion FROM Notificaciones AS N,Usuarios AS U, Publicaciones AS P, GruposFamiliares AS G WHERE P.grupo_id = G.grupo_id AND N.publicacion_id = N.publicacion_id AND N.usuario_receptor_id = $usuario AND U.usuario_id = P.usuario_creador_id AND N.estado = 'TRUE' AND P.publicacion_id = N.publicacion_id AND N.mostrar = 'true'  ORDER BY P.fecha_creacion ASC";
        $result = pg_query($link, $query);
    }
    //variables
    $retorno = array();
    $i = 0;
    if($result){
        while($row = pg_fetch_assoc($result)){
            $retorno[$i] = $row;
            $notificacion = $row["notificacion_id"];
            $i++;
            //me sirve para saber si al usuario ya se le fueron desplegadas o no las notificaciones para no estarlas pidiendo de nuevo
            $query = "UPDATE Notificaciones SET mostrar = 'false' WHERE notificacion_id = $notificacion";
            $result2 = pg_query($link, $query);            
        }  
    }        
    echo json_encode($retorno);
?>