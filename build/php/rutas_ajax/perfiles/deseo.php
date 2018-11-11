<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros
    $nombre = $_POST["nombre"];
    $tipo = $_POST["tipo"];  
    $deseo = $_POST["deseo"];  
    //variables 
    $create = -1;
    //se cambia el estado de la notificacion
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    if($tipo == 1) $query = "INSERT INTO Deseos(nombre,usuario_id) VALUES ('$nombre',$usuario) RETURNING deseo_id";
    else if($tipo == 2) $query = "DELETE FROM Deseos WHERE deseo_id = $deseo";
    $result = pg_query($link, $query);
    if($result){
        $row = pg_fetch_assoc($result);
        $create = $row["deseo_id"];
    }else{
        $create = -1;
    } 
    echo $create;
?>