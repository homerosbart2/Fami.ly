<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $grupo = $_GET["grupo"];
    $tipo = $_GET["tipo"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "SELECT DISTINCT * FROM  Publicaciones AS P WHERE P.grupo_id = $grupo ORDER BY P.fecha_creacion";
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