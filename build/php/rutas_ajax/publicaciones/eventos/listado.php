<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $grupo = $_GET["grupo"];
    $publicacion = $_GET["publicacion_id"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "SELECT * FROM  Eventos AS E WHERE E.publicacion_id = $publicacion";
    $result = pg_query($link, $query);
    $retorno = array();
    $info_evento = array();
    $info_asiste = array();
    $i = 0;
    if($result){
        while($row = pg_fetch_assoc($result)){
            $info_evento[$i] = $row;
            $evento = $row["evento_id"];
            $i++;
        }  
        $query = "SELECT A.asiste_id, A.estado, U.nombres, U.usuario_id FROM  Asiste AS A, Usuarios AS U WHERE A.evento_id = $evento AND U.usuario_id = A.usuario_id";
        $result = pg_query($link, $query);
        $i = 0;
        if($result){
            while($row = pg_fetch_assoc($result)){
                $info_asiste[$i] = $row;
                $i++;
            }  
        }
        array_push($retorno,$info_evento,$info_asiste);
    }        
    echo json_encode($retorno);
?>