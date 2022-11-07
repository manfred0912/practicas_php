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
			<span class="bienvenida"><strong id="mensaje">Bienvenida Fabiola </strong></span>
		</div>
		
		<div class="navbar">
			<nav>
				<a href="sesionadmin.php" class="navbartool">Agregar</a>
				<a href="modificar.php" class="navbartool">Modificar</a>
				<a href="consultar.php" class="navbartool">Consultar</a>
				<a href="eliminar.php" class="navbartool">Eliminar</a>
			</nav>
		</div>
		
		<div class="maincenter">
			<form action="agregarprod.php" method="post" enctype="multipart/form-data">
				<h1>Dar de Alta Nuevo Producto</h1>
				<label>Codigo: </label><input type="text" name="codigo"><br><br>
				<label>Descripcion: </label><input type="text" name="descripcion"><br><br>
				<label>Precio: </label><input type="number" name="precio"><br><br>
				<label>Enfoque: </label><input type="text" name="enfoque"><br><br>
				<label>Imagen: </label><input type="file" name="imagen" size="20"><br><br>
				<input type="submit" name="enviardatos" value="Enviar">
				<input type="reset" name="reestablecer" value="Reestablecer">
			</form>
		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Salir</a>
		</div>

	</div>

</body>
</html>