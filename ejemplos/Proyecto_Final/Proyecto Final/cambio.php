<?php
include("conexion.php");

$Codigo=$_POST["id"];
$Descripcion=$_POST["desc"];
$Precio=$_POST["precio"];
$Enfoque=$_POST["enfoque"];
$Imagen=$_POST["imagen"];

$sql = "UPDATE productos SET ID='$Codigo', Descripcion='$Descripcion', Precio='$Precio', Enfoque='$Enfoque', Imagen='$Imagen' WHERE ID='$Codigo'";

$resultado=mysqli_query($conn, $sql);

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
	        <h1>Modiicar Producto</h1>
	        <?php

				if ($resultado) {
			    	echo "Modificado con exito";
			    }else{
			    	echo "Ocurrio un error";
			    }
			    /*if (!$result) {//debug
                      $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
                      $mensaje .= 'Consulta completa: ' . $sql;
                      die($mensaje);
                  }*/

			?>
	        <a href="modificar.php"><br>Regresar</a>
	    </div>
	</body>
	</html>
		
