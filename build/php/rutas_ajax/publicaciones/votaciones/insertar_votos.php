<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $opcion = $_POST["opcion"];
    $grupo = $_POST["grupo"];
    $votacion = $_POST["votacion"];
    //variables
    $create = -1;
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    //verificamos si ya existe un voto del usuario actual
    $query = "SELECT V.voto_id FROM Votos AS V, Opciones AS O WHERE O.votacion_id = $votacion AND V.opcion_id = O.opcion_id AND V.usuario_id=$usuario";
    $result = pg_query($link, $query);
    if($result){   
        $resultado = pg_num_rows($result);
        if($resultado > 0){
            //cambiamos el voto
            $rows = pg_fetch_assoc($result);
            $voto_antiguo = $rows["voto_id"];
            $query = "UPDATE Votos SET opcion_id=$opcion WHERE voto_id = $voto_antiguo AND usuario_id = $usuario";
            $result = pg_query($link, $query);      
            $create = 2;                   
        }else{
            //no existe voto previo del usuario
            $query = "INSERT INTO Votos(opcion_id,usuario_id) VALUES($opcion,$usuario)";
            $result = pg_query($link, $query);  
            $create = 1;
        }   
    }
    echo $create
?> 