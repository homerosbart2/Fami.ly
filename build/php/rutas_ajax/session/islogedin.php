<?php 
    session_start();
    $usuario_actual = "";
    $correo_actual = "";
    if(isset($_SESSION['usuario_actual'])){
        $usuario_actual = $_SESSION['usuario_actual']; 
        $correo_actual = $_SESSION['correo_actual'];
    }else{       
        header("Location: ../login/login.php");                 
    }
?>   