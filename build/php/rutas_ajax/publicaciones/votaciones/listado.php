<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $grupo = $_GET["grupo"];
    $publicacion = $_GET["publicacion_id"];
    //variables
    $retorno = array();
    $info_votaciones = array();
    $info_opciones = array();
    //querys
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "SELECT * FROM  Votaciones AS V WHERE V.publicacion_id = $publicacion";
    $result = pg_query($link, $query);    
    if($result){
        $row = pg_fetch_assoc($result);
        $info_votaciones[0] = $row;
        $votacion = $row["votacion_id"];
        $query = "SELECT O.opcion_id, O.informacion FROM Opciones AS O WHERE O.votacion_id = $votacion";
        $result = pg_query($link, $query);
        if($result){
            while($row2 = pg_fetch_assoc($result)){
                $temp_array = array();
                $opcion = $row2["opcion_id"];
                $query = "SELECT V.voto_id, U.nombres, U.usuario_id FROM Votos AS V, Usuarios AS U WHERE U.usuario_id = V.usuario_id AND V.opcion_id = $opcion";
                $result2 = pg_query($link, $query);
                $temp_array[0] = $row2;
                $a = 1;
                if($result){
                    while($row3 = pg_fetch_assoc($result2)){
                        $temp_array[$a] = $row3;
                        $a++;
                    }  
                }   
                array_push($info_opciones,$temp_array);         
            }  
        }               
        array_push($retorno,$info_votaciones,$info_opciones);
    }        
    echo json_encode($retorno);
?>