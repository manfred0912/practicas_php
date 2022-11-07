<?php
session_start();

include("conexion.php");

if (isset($_POST['u'])) {
    $_SESSION['nombreusuario'] = $_POST['u'];
}

if (isset($_POST['p'])) {
    $_SESSION['password'] = $_POST['p'];
}

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
			<span class="bienvenida"><a href="Login.php" id="iniciosesion">Iniciar Sesion</a></span>
		</div>
		
		<div class="navbar">
			<nav>
				<a href="sesioninv.php" class="navbartool">Productos</a>
				<a href="proximamenteinv.php" class="navbartool">Proximamente</a>
				<a href="acercadeinv.php" class="navbartool">Acerca de Nosotros</a>
			</nav>
		</div>
		
		<div class="maincenter">
			<table class="tablas">
				<tr>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>Precio</th>
					<th>Enfoque</th>
					<th>Foto</th>
				</tr>

				<?php

				$sql=mysqli_query($conn, "SELECT ID, Descripcion, Precio, Enfoque, Imagen FROM productos");

				$resultado=mysqli_num_rows($sql);

				if ($resultado > 0) {
					while ($datos=mysqli_fetch_array($sql)) {
						
				?>
				<tr>
					<form action="insertarprod.php" method="get">
						<?php
							$ID=$datos["ID"];
							$Descripcion=$datos["Descripcion"];
							$Precio=$datos["Precio"];
							$Enfoque=$datos["Enfoque"];
							$Foto=$datos["Imagen"];

							$_SESSION['Codigo'] = $ID;
						?>
					<td><?php echo $ID ?></td>
					<td><?php echo $Descripcion ?></td>
					<td><?php echo $Precio ?></td>
					<td><?php echo $Enfoque ?></td>
					<td><img style="width: 100px; height: 100px;" src="/imagenes/<?php echo $Foto;?>" alt="<?php echo $Descripcion; ?>"></td>
					</form>
				</tr>
				<?php
					}
				}
				?>
			</table>
		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Salir</a>
		</div>

	</div>

</body>
</html>