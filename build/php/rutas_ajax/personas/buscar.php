<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];  
    //parametros
    $palabra = $_GET["palabra"];
    $wall = $_GET["wall"];
    $grupo = $_GET["grupo"];
    //wall = 1 -> mural de lo contrario estamos afuera
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    //buscare los usuarios que ya estan en el grupo
    if($wall == 1){
        //buscamos a todos pero necesitamos un estado para saber si el usuario esta o no dentro del grupo ya
        //personas no existentes en el grupo
        $query = "SELECT DISTINCT U.usuario_id, U.nombres, U.apellidos, U.pais,'True' AS tipo FROM Usuarios AS U, PerteneceGrupo AS P WHERE P.grupo_id != $grupo AND P.usuario_id = U.usuario_id AND U.usuario_id != $usuario AND (LOWER(U.nombres) LIKE LOWER('%$palabra%') OR LOWER(U.apellidos) LIKE LOWER('%$palabra%'))";
        $result = pg_query($link, $query);     
        //variables
        $retorno = array();
        $i = 0;
        if($result){
            while($row = pg_fetch_assoc($result)){
                $retorno[$i] = $row;
                $i++;           
            }  
        } 
        //personas ya existentes en el grupo
        $query = "SELECT U.usuario_id, U.nombres, U.apellidos, U.pais, 'False' AS tipo FROM Usuarios AS U, PerteneceGrupo AS P WHERE P.grupo_id = $grupo AND P.usuario_id = U.usuario_id AND U.usuario_id != $usuario AND (LOWER(U.nombres) LIKE LOWER('%$palabra%') OR LOWER(U.apellidos) LIKE LOWER('%$palabra%'))";
        $result = pg_query($link, $query);  
        if($result){
            while($row = pg_fetch_assoc($result)){
                $retorno[$i] = $row;
                $i++;           
            }  
        }                
    }else{
        //buscamos a todos
        $query = "SELECT U.usuario_id, U.nombres, U.apellidos, U.pais,'False' AS tipo FROM Usuarios AS U WHERE U.usuario_id != $usuario AND (LOWER(U.nombres) LIKE LOWER('%$palabra%') OR LOWER(U.apellidos) LIKE LOWER('%$palabra%'))";
        $result = pg_query($link, $query);
        //variables
        $retorno = array();
        $i = 0;
        if($result){
            while($row = pg_fetch_assoc($result)){
                $retorno[$i] = $row;
                $i++;           
            }  
        }      
    }      
    echo json_encode($retorno);
?>
