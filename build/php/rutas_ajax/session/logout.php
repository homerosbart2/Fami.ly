<?php
    session_start();
    if(isset($_SESSION['usuario_actual'])){
        unset($_SESSION['usuario_actual']);
        unset($_SESSION['correo_actual']);
        unset($_SESSION['recordatorio']);
        unset($_SESSION['usuario_actual_nombre']);
        unset($_SESSION['usuario_actual_id']);
        //echo "<center><p style='color:green;'>".'Sesión cerrada exitosamente.'."</p>";
        echo '<script type="text/javascript">
            window.location = "../../login/login.php"
        </script>';
    }else{
        //echo "<center><p style='color:red;'>".'No se ha iniciado niguna sesión.'."</p>";
        echo '<script type="text/javascript">
           window.location = "../../login/login.php"
        </script>';
    }
?>