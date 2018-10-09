<?php
titulo = document.getElementById("evento-titulo").value
dia = document.getElementById("evento-dia").value
mes = document.getElementById("evento-mes").value
ano = document.getElementById("evento-ano").value
horario = document.getElementById("evento-horario").value
ubicacion = document.getElementById("evento-ubicacion").value
descripcion = document.getElementById("evento-descripcion").value

    //obtencion de fecha //$hoy = getdate(); print_r($hoy); echo date('m/d/Y H:i:s', $fecha->getTimestamp());  
    $fechaObj = new DateTime();
    $fecha_creacion = $fechaObj->getTimestamp(); 
    //obtenemos el usuario
    session_start();
    $usuario = $_SESSION['usuario_actual_id']; //variable que se obtiene con la cookie
    //parametros
    $fecha = $_GET["fecha"];
    $horario = $_GET["horario"];
    $ubicacion = $_GET["ubicacion"];
    $descripcion = $_GET["descripcion"];
    $link = pg_connect("host=localhost dbname=FAMILY user=tienda password=%SocialAdmin18%");
    //variables
    $create = -1;
    //creacion de la publicacion
    $query = "INSERT INTO Publicaciones(usuario_creador_id,tipo,fecha_creacion) VALUES ($usuario,'EV',$fecha_creacion) RETURNING publicacion_id";
    $result = pg_query($link, $query);    
    //creacion del evento
    if ($result) {
        $rows = pg_num_rows($result);
        $publicacion = $rows["publicacion_id"]
        $query = "INSERT INTO Eventos(publicacion_id,informacion,lugar,fecha,hora) VALUES ($publicacion,$descripcion,$ubicacion,$fecha,$horario) RETURNING publicacion_id";
        $result = pg_query($link, $query);    
        $rows = pg_num_rows($result);
        $create = rows["evento_id"];
    }  
    echo $create
?>