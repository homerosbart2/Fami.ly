<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $grupo = $_POST["grupo"];
    $publicacion = $_POST["publicacion_id"];
    //variables
    $retorno = array();
    $preguntas_array = array();
    $respuestas_array = array();
    //consulta 1 - pregunta
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "SELECT * FROM  Preguntas AS P WHERE P.publicacion_id = $publicacion";
    $result = pg_query($link, $query);
    if($result){    
        $row = pg_fetch_assoc($result);
        $preguntas_array[0] = $row;
        $pregunta = $row["pregunta_id"];
        //consulta 2 - respuestas
        $query = "SELECT R.usuario_id,informacion,U.nombres FROM  Respuestas AS R, Usuarios AS U WHERE U.usuario_id = R.usuario_id AND R.pregunta_id = $pregunta";
        $result = pg_query($link, $query);
        $i = 0;
        while($row = pg_fetch_assoc($result)){
            $respuestas_array[$i] = $row;
            $i++;    
        }
        array_push($retorno,$preguntas_array,$respuestas_array);
    }        
    echo json_encode($retorno);
?>