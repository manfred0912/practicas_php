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
		}
		else{
			echo "Tipo de Archivo incorrecto<br>";
		}
	}
	else{
		echo "Imagen muy grande!!!";
	}







?>