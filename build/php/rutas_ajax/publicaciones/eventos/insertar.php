<?php
    //obtencion de fecha //$hoy = getdate(); print_r($hoy); echo date('m/d/Y H:i:s', $fecha->getTimestamp());  
    $fechaObj = new DateTime();
    $fecha_creacion = $fechaObj->getTimestamp(); 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $titulo = $_GET["titulo"];
    $fecha = $_GET["fecha"];
    $horario = $_GET["horario"];
    $ubicacion = $_GET["ubicacion"];
    $descripcion = $_GET["descripcion"];
    $grupo = $_GET["grupo"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    //variables
    $create = -1;
    //creacion de la publicacion
    $query = "INSERT INTO Publicaciones(usuario_creador_id,grupo_id,tipo,fecha_creacion) VALUES ($usuario,$grupo,'E',CURRENT_TIMESTAMP) RETURNING publicacion_id";
    $result = pg_query($link, $query);
    if($result){   
        $rows = pg_fetch_assoc($result);
        $publicacion = $rows["publicacion_id"];
        $query = "SELECT P.usuario_id FROM PerteneceGrupo AS P WHERE P.grupo_id=$grupo AND P.usuario_id != $usuario";
        $result = pg_query($link, $query);
        //creacion de notificaciones para cada usuario perteneciente al grupo
        if($result){
            while($row = pg_fetch_assoc($result)){
                $usuario_receptor = $row["usuario_id"];
                $query = "INSERT INTO Notificaciones(publicacion_id,usuario_receptor_id,estado) VALUES ($publicacion,$usuario_receptor,TRUE)";;
                pg_query($link, $query);
            }  
        }        
        //creacion del evento
        $query = "INSERT INTO Eventos(publicacion_id,titulo,informacion,lugar,fecha,hora) VALUES ($publicacion,'$titulo','$descripcion','$ubicacion','$fecha','$horario') RETURNING evento_id";
        $result = pg_query($link, $query);
        if($result){    
            $rows = pg_fetch_assoc($result);
            $create = $publicacion;           
        }
    }
    echo $create
?>