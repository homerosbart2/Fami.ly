<?php 
    //variables que se obtienen con la cookie
    session_start();
    $usuario = $_SESSION['usuario_actual_id'];  
    //variables 
    $create = -1;
    $retorno = array();
    $i = 0;
    //busco a todas las personas que sigo y donde el estado mostrar es igual a true
    $link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
    $query = "SELECT S.sigue_id, U.usuario_id, U.nombres, U.apellidos, U.fecha_nacimiento, U.pais, U.formato_img, U.name_img FROM Usuarios AS U, Sigue AS S WHERE S.mostrar = TRUE AND U.usuario_id = S.usuario_seguido_id AND S.usuario_seguidor_id = $usuario";
    $result = pg_query($link, $query);
    if($result){
        while($row = pg_fetch_assoc($result)){
            $retorno[$i] = $row;
            $usuarioInfo = $row["usuario_id"];
            $queryWishes = "SELECT D.deseo_id, D.nombre FROM Deseos AS D WHERE D.usuario_id = $usuarioInfo";
            $result = pg_query($link, $queryWishes);
            if ($result) {
                $a = 0;
                //informacion del usuario se manda en 0
                $deseos_info = array();
                while($row2 = pg_fetch_assoc($result)){
                    $deseos_info[$a] = $row2;
                    $a++; 
                }
                $temp = array();
                array_push($temp,$row,$deseos_info);
            }
            $retorno[$i] = $temp;            
        }
    }
    echo json_encode($retorno);
?>