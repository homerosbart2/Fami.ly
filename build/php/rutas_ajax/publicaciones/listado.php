<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $grupo = $_GET["grupo"];
    $publicacion = $_GET["publicacion"];
    $last = $_GET["last"];
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    if(empty($publicacion)){
        $query = "SELECT P.publicacion_id, P.usuario_creador_id,P.grupo_id,P.tipo,P.fecha_creacion,U.nombres FROM  Publicaciones AS P, Usuarios AS U WHERE P.grupo_id = $grupo AND P.usuario_creador_id = U.usuario_id AND P.publicacion_id > $last ORDER BY P.fecha_creacion ASC";
    }else{
        $query = "SELECT P.publicacion_id, P.usuario_creador_id,P.grupo_id,P.tipo,P.fecha_creacion,U.nombres FROM  Publicaciones AS P, Usuarios AS U WHERE P.grupo_id = $grupo AND P.usuario_creador_id = U.usuario_id AND P.publicacion_id = $publicacion ORDER BY P.fecha_creacion ASC";
    }
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