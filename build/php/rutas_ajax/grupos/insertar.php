<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $apellido = $_GET["apellido"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    //variables
    $create = -1;
    //creacion de grupo
    $query = "INSERT INTO GruposFamiliares(apellido) VALUES ('$apellido') RETURNING grupo_id";
    $result = pg_query($link, $query);
    if($result){   
        $result = pg_query($link, $query);
        $rows = pg_fetch_assoc($result);
        $create = $rows["grupo_id"];
        //usuario actual pertenece al grupo
        $query = "INSERT INTO PerteneceGrupo(grupo_id,usuario_id) VALUES ($create,$usuario)";
        $result = pg_query($link, $query);
    }
    echo $create
?>