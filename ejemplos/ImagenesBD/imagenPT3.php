<?php	

	$nombIMG = $_FILES["UPLimagen"]["name"];
	$tipo = $_FILES["UPLimagen"]["type"];
	$tam = $_FILES["UPLimagen"]["size"];	

	if($tam<1000000){  //1mill de Bytes, aprox 1 MB
		if($tipo=="image/jpeg" || $tipo=="image/png" ||$tipo=="image/jpg" ||$tipo=="image/gif" ){
			//Ruta destino de la IMAGEN
			$folder = $_SERVER["DOCUMENT_ROOT"]."/ImagenesBD/imgdb/";

			//Mover imagen del TMP a la carpeta destino.
			move_uploaded_file($_FILES["UPLimagen"]["tmp_name"], $folder.$nombIMG);
			
				$servername = "localhost";
				$username = "root";
				$password = "";	
				$db = "pruebaimg";

				$conn = mysqli_connect($servername, $username, $password,$db);


				if (!$conn) {
		  			die("Conexión fallida: " . mysqli_connect_error());
				}	

				$sql = "INSERT INTO imagenes (Nombre, Tam, Foto)
						VALUES ('$nombIMG', '$tam', '$tipo')";

				if (mysqli_query($conn, $sql)) {
	  				echo "Se insertó el registro";
				} 
				else {
  					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
				
		}
		else{
			echo "Tipo de Archivo incorrecto<br>";
		}
	}
	else{
		echo "Imagen muy grande!!!";
	}





	
	





?>