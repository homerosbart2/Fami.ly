<?php 
	$create = -1;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_FILES['files'])) {
			$errors = [];
			$path = '../../../assets/img/users/';
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

				if ($file_size > 2097152) {
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
					$link = pg_connect("host=localhost dbname=FAMILY user=social password=%SocialAdmin18%");  
                    //creacion de la imagen
                    $query = "UPDATE Usuarios AS U SET name_img='$usuario',formato_img='$file_ext' WHERE U.usuario_id = $usuario";
                    $result = pg_query($link, $query);
                    if($result){              
                        $create = 1;
                    }
					$file = $path.$usuario.".".$file_ext;			
					move_uploaded_file($file_tmp, $file);
				}
			}

		}	
	}
	echo $create;
?>
