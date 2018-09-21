<?php
    //creacion y validacion de nuevo usuario
    $password = $_GET["password"];
    $username = $_GET["username"];
    $email = $_GET["email"];
    $name = $_GET["name"];
    $link = pg_connect("host=localhost dbname=TIENDA user=tienda password=%TiendaAdmin18%");
    //buscamos existencia
    $query = "SELECT * FROM Usuarios AS U WHERE U.usuario = '$username' OR U.correo = '$email'";
    $result = pg_query($link, $query);
    $rows = pg_num_rows($result);
    $create = 0;
    if($rows == 0){  
        $query = "INSERT INTO Usuarios(password_usuario,nombre,correo,usuario) VALUES('$password','$name','$email',$username')";
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