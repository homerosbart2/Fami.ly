<?php
    //creacion y validacion de nuevo usuario
    $password = $_POST["password"];
    $options = [
        'cost' => 9,
    ];
    $hash = password_hash($password, PASSWORD_BCRYPT, $options);
    $username = $_POST["username"];
    $name = $_POST["name"];
    $lastname = $_POST["lastname"];
    $fecha = $_POST["fecha"];
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    //buscamos existencia
    $query = "SELECT * FROM Usuarios AS U WHERE (usuario = '$username')";
    $result = pg_query($link, $query);
    $rows = pg_num_rows($result);
    $create = 0;
    if($rows == 0){  
        $query = "INSERT INTO Usuarios(usuario_password,nombres,apellidos,correo,usuario,fecha_nacimiento,pais) VALUES('$hash','$name','$lastname','','$username','$fecha','') RETURNING usuario_id";
        $result = pg_query($link, $query);
        if ($result) {
            $create = 1;
            session_start();
            //creamos las variables de sesion
            $row = pg_fetch_assoc($result);
            $_SESSION['recordatorio'] = 1;
            $_SESSION['usuario_actual_nombre'] = $name;
            $_SESSION['usuario_actual'] = $username;
            $_SESSION['usuario_actual_id'] = $row["usuario_id"];
            pg_close($link);
        }
    }else{
        $create = -1;
    }
    echo $create;
?>