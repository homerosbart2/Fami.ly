<?php
    //encargado de crear la sesion del usuario y ver que si se haya creado una sesion
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    //variables
    $isFollowing = 0;
    //paramatetros
    $perfil = $_GET["perfil"];
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $userInfo = $usuario;
    $queryFollow = "SELECT * FROM Sigue AS S WHERE S.usuario_seguidor_id = $usuario AND S.usuario_seguido_id = $perfil";
    $result = pg_query($link, $queryFollow);
    if(pg_num_rows($result) > 0) $isFollowing = 1;
    echo " ";
    if(!(empty($perfil))){
        $query = "SELECT U.usuario_id,U.usuario,U.correo,U.nombres,U.apellidos,U.pais,U.fecha_nacimiento,U.name_img,U.formato_img, '$isFollowing' AS isfollow FROM Usuarios As U WHERE U.usuario_id = $perfil";
        $userInfo = $perfil;      
    }else{ 
        $query = "SELECT U.usuario_id,U.usuario,U.correo,U.nombres,U.apellidos,U.pais,U.fecha_nacimiento,U.name_img,U.formato_img,'TRUE' AS isfollow FROM Usuarios As U WHERE U.usuario_id = $usuario";
    }


    $result = pg_query($link, $query);
    $resultado = 0;
    $retorno = -1;
    $retorno = array();
    $i = 1;
    if ($result) {
        //informacion del usuario se manda en 0
        $row = pg_fetch_assoc($result);
        $retorno[0] = $row;
        $query = "SELECT P.grupo_id,G.apellido 
        FROM PerteneceGrupo As P, GruposFamiliares AS G
        INNER JOIN PerteneceGrupo Pp ON Pp.usuario_id = $userInfo AND G.grupo_id=Pp.grupo_id WHERE P.grupo_id IS NOT NULL AND G.grupo_id = P.grupo_id AND P.usuario_id = $usuario ORDER BY G.apellido ASC";
        $result = pg_query($link, $query);
        //informacion de los grupos a los cuales pertenecen
        if ($result) {
            //informacion del usuario se manda en 0
            $usuarios_info = array();
            while($row = pg_fetch_assoc($result)){
                $grupo = $row["grupo_id"];
                $query = "SELECT U.usuario_id,U.nombres,U.nombres,U.name_img, U.formato_img FROM Usuarios As U, PerteneceGrupo AS P WHERE P.grupo_id = $grupo AND P.usuario_id != $usuario AND P.usuario_id != $userInfo AND P.usuario_id = U.usuario_id";   
                $result2 = pg_query($link, $query);
                $a = 0;
                $usuarios_info = array();
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
    }  
    pg_close($link);
    echo json_encode($retorno);
?>