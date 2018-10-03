<?php
    //creacion y validacion de nuevo usuario
    $password = $_GET["password"];
    $username = $_GET["username"];
    $email = $_GET["email"];
    $name = $_GET["name"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    //buscamos existencia
    $query = "SELECT * FROM Usuarios AS U WHERE (usuario = '$username') OR (correo = '$email')";
    $result = pg_query($link, $query);
    $rows = pg_num_rows($result);
    $create = 0;
    if($rows == 0){  
        $query = "INSERT INTO Usuarios(usuario_password,nombre,correo,usuario) VALUES('$password','$name','$email','$username')";
        $result = pg_query($link, $query);
        if ($result) {
            $create = 1;
            session_start();
            //creamos las variables de sesion
            $_SESSION['usuario_actual'] = $username;
            $_SESSION['correo_actual'] = $email;
            pg_close($link);
        }
    }  
    echo $create
?>