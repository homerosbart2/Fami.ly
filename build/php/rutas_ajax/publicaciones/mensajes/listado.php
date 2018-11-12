<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $grupo = $_POST["grupo"];
    $publicacion = $_POST["publicacion_id"];
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "SELECT * FROM  Mensajes AS M WHERE M.publicacion_id = $publicacion";
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