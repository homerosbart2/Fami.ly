<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];
    //parametros
    $tipo = isset($_POST['tipo']) ? $_POST['tipo'] : -1; 
    $perfil = $_POST['perfil']; 
    // variables 
    if($tipo == 1){
        //follow
        $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
        $query = "INSERT INTO Sigue(usuario_seguidor_id,usuario_seguido_id) VALUES ($usuario,$perfil)";
        $result = pg_query($link, $query);  
    }else if($tipo == 2){
        //unfollow
        $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
        $query = "DELETE FROM Sigue WHERE usuario_seguidor_id = $usuario AND usuario_seguido_id = $perfil";
        $result = pg_query($link, $query);  
    }  
?>