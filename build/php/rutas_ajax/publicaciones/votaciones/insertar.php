<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $informacion = $_GET["informacion"];
    $grupo = $_GET["grupo"];
    $opciones = $_GET["opciones"];
    $opciones = explode(",", $opciones);  
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    //variables
    $create = -1;
    //creacion de la publicacion
    $query = "INSERT INTO Publicaciones(usuario_creador_id,grupo_id,tipo,fecha_creacion) VALUES ($usuario,$grupo,'V',CURRENT_TIMESTAMP) RETURNING publicacion_id";
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
        //creacion de la votacion
        $query = "INSERT INTO Votaciones(publicacion_id,informacion) VALUES ($publicacion,'$informacion') RETURNING votacion_id";
        $result = pg_query($link, $query);
        if($result){    
            $rows = pg_fetch_assoc($result);
            $votacion = $rows["votacion_id"];
            foreach ($opciones as $opcion) {
                $query = "INSERT INTO Opciones(votacion_id,informacion) VALUES ($votacion,'$opcion')";
                $result = pg_query($link, $query);
            }                      
            $create = $publicacion;  
        }
    }
    echo $create
?> 