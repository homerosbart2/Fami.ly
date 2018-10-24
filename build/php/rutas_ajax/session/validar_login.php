<?php
    //encargado de crear la sesion del usuario y ver que si se haya creado una sesion
    $password = $_GET["password"];
    $username = $_GET["username"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "SELECT U.usuario,U.usuario_id,U.correo,U.nombres FROM Usuarios As U WHERE U.usuario_password= '$password' AND U.usuario='$username'";
    $result = pg_query($link, $query);
    $resultado = 0;
    $retorno = -1;
    $group_array = array();
    if ($result) {
        $resultado = pg_num_rows($result);
        if($resultado != 0){
            session_start();
            //creamos las variables de sesion
            $row = pg_fetch_assoc($result);
            $usuario = $row["usuario_id"];
            $_SESSION['usuario_actual_nombre'] = $row["nombres"];
            $_SESSION['usuario_actual'] = $row["usuario"];
            $_SESSION['correo_actual'] = $row["correo"];
            $_SESSION['usuario_actual_id'] = $usuario;
            $query = "SELECT P.grupo_id FROM PerteneceGrupo As P WHERE P.usuario_id=$usuario";
            $result = pg_query($link, $query);
            if($result){
                $i = 0;
                while($row = pg_fetch_assoc($result)){
                    $group_array[$i] = $row["grupo_id"];
                    $i++;
                }
                //se guardan los grupos del usuario se utilizara para seguridad
                $_SESSION['grupos'] = json_encode($group_array);
            }
            $retorno = 1;
        }
    }  
    pg_close($link);
    echo $retorno;
?>