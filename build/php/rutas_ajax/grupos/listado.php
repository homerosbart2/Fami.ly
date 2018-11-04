<?php 
    //variable que se obtiene con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    $query = "SELECT G.apellido,G.grupo_id FROM GruposFamiliares AS G, PerteneceGrupo AS P WHERE P.usuario_id=$usuario AND P.grupo_id = G.grupo_id ORDER BY G.apellido ASC";
    $result = pg_query($link, $query);
    $retorno = array();
    $i = 0;
    if($result){
        while($row = pg_fetch_assoc($result)){
            $usuarios_info = array();
            $grupo = $row["grupo_id"];
            $query = "SELECT U.nombres,U.nombres,U.name_img, U.formato_img FROM Usuarios As U, PerteneceGrupo AS P WHERE P.grupo_id = $grupo AND P.usuario_id = U.usuario_id";   
            $result2 = pg_query($link, $query);
            $a = 0;
            while($row2 = pg_fetch_assoc($result2)){
                $usuarios_info[$a] = $row2;
                $a++;
            }
            $temp = array();
            array_push($temp,$row,$usuarios_info);
            $retorno[$i] = $temp;
            $i++;        
        }  
    }        
    echo json_encode($retorno);
?>