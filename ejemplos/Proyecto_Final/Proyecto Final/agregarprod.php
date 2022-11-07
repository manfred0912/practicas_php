<?php

	require("conexion.php");


	$codigo=$_POST['codigo'];
	$descripcion=$_POST['descripcion'];
	$precio=$_POST['precio'];
	$enfoque=$_POST['enfoque'];

	$nombre_imagen=$_FILES['imagen']['name'];
	$tipo_imagen=$_FILES['imagen']['type'];
	$tamano_imagen=$_FILES['imagen']['size'];


	if ($tamano_imagen<=10000000) {		

			//Ruta de la carpeta destino del servidor
			$carpeta_destino=$_SERVER['DOCUMENT_ROOT'] . '/imagenes/';

			//Mover imagen de temp a ruta destino
			move_uploaded_file($_FILES['imagen']['tmp_name'],$carpeta_destino.$nombre_imagen);

	}else{
		echo "El tamano del archivo es muy grande";
	}

	$sql="INSERT INTO productos (ID, Descripcion, Precio, Enfoque, Imagen) VALUES ('$codigo','$descripcion','$precio','$enfoque','$nombre_imagen')";

	$resultado=mysqli_query($conn,$sql);

	?>

	<!DOCTYPE html>
	<html>
	<head>
	    <meta charset="utf-8">
	    <title>Fabiru Store</title>
	    <link rel="stylesheet" type="text/css" href="loginstyle.css">
	</head>
	<body>
	    <div class="login">
	        <h1 id="fabiru">FABIRU STORE</h1>
	        <h1>Agregar Producto</h1>
	        <?php
	        if ($resultado) {
	        	echo "Insertado Correctamente";
	        }else{
	            die($sql);
	        }
	        ?>
	        <a href="sesionadmin.php"><br>Regresar</a>
	    </div>
	</body>
	</html>