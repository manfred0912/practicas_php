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
			<img src="/img/1.jpg" class="left"><label>Producto1</label>
			<img src="/img/2.jpg" class="center"><label>Producto2</label>
			<img src="/img/3.jpeg" class="right"><label>Producto3</label><br>
			<img src="/img/4.jpg" class="left"><label>Producto4</label>
			<img src="/img/5.jpeg" class="center"><label>Producto5</label>
			<img src="/img/6.jpg" class="right"><label>Producto6</label><br>
		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Salir</a>
		</div>

	</div>

</body>
</html>