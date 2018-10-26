<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros
    $invitacion = $_GET["invitacion"];
    $tipo = $_GET["tipo"];  
    //variables 
    $create = -1;
    //se cambia el estado de la notificacion
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "DELETE FROM Invitaciones WHERE invitacion_id = $invitacion RETURNING grupo_id";
    $result = pg_query($link, $query);
    if($result){
        if($tipo == 1){
            //aceptada
            $row = pg_fetch_assoc($result);
            $grupo = $row["grupo_id"];
            $query = "INSERT INTO PerteneceGrupo(grupo_id,usuario_id) VALUES($grupo,$usuario)";
            $result = pg_query($link, $query);        
            $create = $grupo;
        } 
    }       
    echo $create;
?>