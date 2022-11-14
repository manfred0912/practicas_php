<?php

	$nombIMG = $_FILES["UPLimagen"]["name"];
	$tipo = $_FILES["UPLimagen"]["type"];
	$tam = $_FILES["UPLimagen"]["size"];

	
	//Ruta destino de la IMAGEN
	$folder = $_SERVER["DOCUMENT_ROOT"]."/ImagenesBD/imgdb/";

	//Mover imagen del TMP a la carpeta destino.
	move_uploaded_file($_FILES["UPLimagen"]["tmp_name"], $folder."dat".$nombIMG);

	
	echo "Tamaño de la imagen en BYTES: ".$tam."<br>";
	echo "Tipo de la imagen: ".$tipo."<br>";
	echo "El nombre de la imagen es: ".$nombIMG;
	





?>