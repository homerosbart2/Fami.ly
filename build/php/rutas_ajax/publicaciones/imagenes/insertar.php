<?php 
	$create = -1;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_FILES['files'])) {
			$errors = [];
			$path = '../../../../assets/img/posts/';
			$extensions = ['jpg', 'jpeg', 'png', 'gif'];
			
			$all_files = count($_FILES['files']['tmp_name']);
			for ($i = 0; $i < $all_files; $i++) {  
				$file_name = $_FILES['files']['name'][$i];

				$file_tmp = $_FILES['files']['tmp_name'][$i];
				$file_type = $_FILES['files']['type'][$i];
				$file_size = $_FILES['files']['size'][$i];
				$arr = explode(".", $_FILES['files']['name'][$i]);
				$file_ext = strtolower(array_pop($arr));   
				
				if (!in_array($file_ext, $extensions)) {
					$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
				}

				if ($file_size > 12097152) {
					$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
				}

				//variables
				$create = -1;
				if (empty($errors)) {
					//guardamos la imagen dado que no tenemos errors
					//variable que se obtiene con la cookie
					session_start();
					$usuario = $_SESSION['usuario_actual_id']; 
					//parametros
					$informacion = $_GET["informacion"];
					$grupo = $_GET["grupo"];
					$link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");
					//creacion de la publicacion
					$query = "INSERT INTO Publicaciones(usuario_creador_id,grupo_id,tipo,fecha_creacion) VALUES ($usuario,$grupo,'I',CURRENT_TIMESTAMP) RETURNING publicacion_id";
					$result = pg_query($link, $query);
					if($result){   
						$rows = pg_fetch_assoc($result);
						$publicacion = $rows["publicacion_id"];
						$query = "SELECT P.usuario_id FROM PerteneceGrupo AS P WHERE P.grupo_id=$grupo AND P.usuario_id != $usuario";
						$result = pg_query($link, $query);
						//creacion de notificaciones para cada usuario perteneciente al grupo
						if($result){
							while($row = pg_fetch_assoc($result)){
								$usuario_receptor = $row["usuario_id"];
								$query = "INSERT INTO Notificaciones(publicacion_id,usuario_receptor_id,estado) VALUES ($publicacion,$usuario_receptor,TRUE)";;
								pg_query($link, $query);
							}  
						}        
						//creacion de la imagen
						$query = "INSERT INTO Imagenes(publicacion_id,informacion,formato) VALUES ($publicacion,'$informacion','$file_ext') RETURNING imagen_id";
						$result = pg_query($link, $query);
						if($result){    
							$rows = pg_fetch_assoc($result);
							$imagen_id = $rows["imagen_id"];            
							$create = $publicacion;
						}
					}
					$file = $path.$imagen_id.".".$file_ext;			
					move_uploaded_file($file_tmp, $file);
				}
			}

		}	
	}
	echo $create;
?>
