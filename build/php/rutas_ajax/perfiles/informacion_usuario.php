<?php
    //encargado de crear la sesion del usuario y ver que si se haya creado una sesion
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; 
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "SELECT U.usuario_id,U.usuario,U.correo,U.nombres,U.nombres,U.pais,U.fecha_nacimiento FROM Usuarios As U WHERE U.usuario_id = $usuario";
    $result = pg_query($link, $query);
    $resultado = 0;
    $retorno = -1;
    $retorno = array();
    $i = 1;
    if ($result) {
        //informacion del usuario se manda en 0
        $row = pg_fetch_assoc($result);
        $retorno[0] = $row;

        $query = "SELECT P.grupo_id,G.apellido FROM PerteneceGrupo As P, GruposFamiliares AS G WHERE P.grupo_id = G.grupo_id AND P.usuario_id=$usuario ORDER BY G.apellido ASC";
        $result = pg_query($link, $query);
        //informacion de los grupos a los cuales pertenecen
        if ($result) {
            //informacion del usuario se manda en 0
            $usuarios_info = array();
            while($row = pg_fetch_assoc($result)){
                $grupo = $row["grupo_id"];
                $query = "SELECT U.nombres,U.nombres,U.name_img, U.formato_img FROM Usuarios As U, PerteneceGrupo AS P WHERE P.grupo_id = $grupo AND P.usuario_id != $usuario AND P.usuario_id = U.usuario_id";   
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