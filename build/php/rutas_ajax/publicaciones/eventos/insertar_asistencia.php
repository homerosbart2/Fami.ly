<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //parametros
    $evento = $_GET["evento"];
    $grupo = $_GET["grupo"];
    //variables
    $create = -1;
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    //verificamos si ya existe la asistencia del evento del usuario actual
    $query = "SELECT A.estado,A.asiste_id FROM Asiste AS A WHERE A.evento_id = $evento AND A.usuario_id=$usuario";
    $result = pg_query($link, $query);
    if($result){   
        $resultado = pg_num_rows($result);
        if($resultado > 0){
            //cambiamos el estado de la asistencia
            $rows = pg_fetch_assoc($result);
            $asiste = $rows["asiste_id"];
            $estado = $rows["estado"];
            if($estado == 1) $estado = 0;
            else $estado = 1;
            $query = "UPDATE Asiste SET estado=$estado WHERE asiste_id = $asiste AND usuario_id = $usuario";
            $result = pg_query($link, $query);      
            $create = 2;                   
        }else{
            //no existe asistencia previa del usuario
            $query = "INSERT INTO Asiste(evento_id,usuario_id,estado) VALUES($evento,$usuario,1)";
            $result = pg_query($link, $query);  
            $create = 1;
        }   
    }
    echo $create
?> 