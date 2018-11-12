<?php
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros  
    $password = $_POST["password"];
    $name = $_POST["nombres"];
    $lastname = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $genero = $_POST["genero"];
    $pais = $_POST["pais"];
    $last = $_POST["last"]; //contraseña antigua
    $new = $_POST["new"]; //contraseña nueva
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    //actualizamos usuario
    $new = $_POST["password"];
    $options = [
        'cost' => 9,
    ];
    $hash = password_hash($new, PASSWORD_BCRYPT, $options);
    $query = "UPDATE Usuarios AS U WHERE usuario = '$username' SET U.nombres = $nombre, U.apellidos = $apellidos, U.correo = $correo, U.fecha_nacimiento = $fecha, U.pais = $pais, U.usuario_password = $hash";
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
            $_SESSION['usuario_actual_nombre'] = $name;
            $_SESSION['usuario_actual'] = $username;
            $_SESSION['correo_actual'] = $email;
            $_SESSION['usuario_actual_id'] = $row["usuario_id"];
            pg_close($link);
        }
    }  
    echo $create
?>