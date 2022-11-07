<?php

	include("conexion.php");

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
	        <h1>Eliminar Producto</h1>
	        <?php
				$Codigo = $_POST["codigo"];

				$sql = "DELETE FROM productos WHERE ID = $Codigo;";

				/*$sql2 = "UPDATE orden SET Producto = NULL WHERE Producto = $Codigo;";*/

				$sql2="SET FOREIGN_KEY_CHECKS = 0;";

				$result2 = mysqli_query($conn, $sql2);

				$result = mysqli_query($conn, $sql);

				if ($result) {
			    while($row = mysqli_fetch_assoc($result)) {
					
					echo "Producto Eliminado" . "<br>";
			    	}
			    }
			    
			    /*if (!$result) {//debug
                      $mensaje  = 'Consulta no válida: ' . mysql_error() . "\n";
                      $mensaje .= 'Consulta completa: ' . $sql;
                      die($mensaje);
                  }*/

			?>
	        <a href="eliminar.php"><br>Regresar</a>
	    </div>
	</body>
	</html>