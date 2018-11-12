<?php
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros  
    $nombre = $_POST["nombres"];
    $apellido = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $genero = $_POST["genero"];
    $fecha = $_POST["fecha"];
    $pais = $_POST["pais"];
    $old = $_POST["last"]; //contraseña antigua
    $new = $_POST["new"]; //contraseña nueva
    //variables
    $retorno = -1;
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    //verificacion de contraseña anterior
    $query = "SELECT U.usuario_password FROM Usuarios As U WHERE U.usuario_id=$usuario";
    $result = pg_query($link, $query); 
    $row = pg_fetch_assoc($result);
    if(password_verify($old, $row["usuario_password"])){
            //actualizamos usuario
            $options = [
                'cost' => 9,
            ];
            $hash = "";
            $query = "";
            if(!(empty($new))){
                $hash = password_hash($new, PASSWORD_BCRYPT, $options);
                $query = "UPDATE Usuarios AS U SET nombres = '$nombre', apellidos = '$apellido', genero = '$genero', correo = '$correo', fecha_nacimiento = '$fecha', pais = '$pais', usuario_password = '$hash' WHERE U.usuario_id = $usuario";
            }else{
                $query = "UPDATE Usuarios AS U SET nombres = '$nombre', apellidos = '$apellido', genero = '$genero', correo = '$correo', fecha_nacimiento = '$fecha', pais = '$pais' WHERE U.usuario_id = $usuario";
            }
            $result = pg_query($link, $query);
            $rows = pg_num_rows($result);
            $retorno = 1;
    }else{
        //no coinciden
        $retorno = 0;
    }
    echo $retorno;    
?>