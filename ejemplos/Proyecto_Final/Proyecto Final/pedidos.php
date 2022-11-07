<?php
session_start();

include("conexion.php");

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>FABIRUSTORE</title>
	<link rel="stylesheet" type="text/css" href="sesionstyle.css">
</head>
<body>
	<div class="maincontainer">
		
		<div class="header">
			<span><img src="./img/fabirustore.png" class="logo"><strong id="nombretienda">&nbsp;&nbsp;<i>FABIRUSTORE</i></strong></span>
			<span class="bienvenida"><strong id="mensaje">Bienvenido <?php echo $_SESSION['nombreusuario']; ?></strong></span>
		</div>
		
		<div class="navbar">
			<nav>
				<a href="sesion.php" class="navbartool">Productos</a>
				<a href="proximamente.php" class="navbartool">Proximamente</a>
				<a href="acercade.php" class="navbartool">Acerca de Nosotros</a>
				<a href="pedidos.php" class="navbartool">Haz tu pedido</a>
			</nav>
		</div>
		
		<div class="maincenter">
			<table class="tablas">
				<tr>
					<th>Codigo</th>
					<th>CargoA</th>
					<th>Producto</th>
				</tr>

				<?php

				$sql=mysqli_query($conn, "SELECT o.ID, u.Usuario, o.Producto FROM orden o
													INNER JOIN usuarios u ON o.CargoA = u.ID
													WHERE u.Usuario = 'Angel'");

				$resultado=mysqli_num_rows($sql);

				if ($resultado > 0) {
					while ($datos=mysqli_fetch_array($sql)) {
						
				?>
				<tr>
					<?php
						$ID=$datos["ID"];
						$Usuario=$datos["Usuario"];
						$Producto=$datos["Producto"];
					?>
					<td><?php echo $ID ?></td>
					<td><?php echo $Usuario ?></td>
					<td><?php echo $Producto ?></td>
				</tr>
				<?php
					}
				}
				?>
			</table>
		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Cerrar Sesion</a>
		</div>

	</div>

</body>
</html>