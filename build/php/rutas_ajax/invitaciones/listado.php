<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "SELECT I.invitacion_id, G.apellido,G.grupo_id,U.nombres,U.apellidos FROM GruposFamiliares AS G, Invitaciones AS I, Usuarios AS U WHERE I.usuario_receptor=$usuario AND I.grupo_id = G.grupo_id AND U.usuario_id = I.usuario_emisor ORDER BY G.apellido ASC";
    $result = pg_query($link, $query);
    $retorno = array();
    $i = 0;
    if($result){
        while($row = pg_fetch_assoc($result)){
            $retorno[$i] = $row;
            $i++;
        }  
    }        
    echo json_encode($retorno);
?>