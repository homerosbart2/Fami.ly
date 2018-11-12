<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $apellido = $_POST["apellido"];
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    //variables
    $create = -1;
    //creacion de grupo
    $query = "INSERT INTO GruposFamiliares(apellido,usuario_creador) VALUES ('$apellido',$usuario) RETURNING grupo_id";
    $result = pg_query($link, $query);
    if($result){   
        $rows = pg_fetch_assoc($result);
        $create = $rows["grupo_id"];
        //usuario actual pertenece al grupo
        $query = "INSERT INTO PerteneceGrupo(grupo_id,usuario_id) VALUES ($create,$usuario)";
        $result = pg_query($link, $query);
    }
    echo $create
?>