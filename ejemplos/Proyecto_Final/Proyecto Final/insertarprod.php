<?php
	session_start();

	include("conexion.php");

	$Codigo=$_SESSION['Codigo'];
	$Nombre=$_SESSION['nombreusuario'];

	$sql="INSERT INTO orden (CargoA, Producto, NombreU) VALUES ('01', '$Codigo', '$Nombre')";

	$res=mysqli_query($conn, $sql);

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

				if ($res) {
					header("location:sesion.php");
				}else{
					die($sql);
				}
			    /*if (!$result) {//debug
                      $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
                      $mensaje .= 'Consulta completa: ' . $sql;
                      die($mensaje);
                  }*/

			?>
	        <a href="sesion.php"><br>Regresar</a>
	    </div>
	</body>
	</html>
	


