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
		
		<div class="maincenterinv">
			<div id="mision">
				<h2><i><strong>Mision</strong></i></h2><br>
				<p><i>Proveer de productos de alta calidad en el rubro de la belleza a todo aquel dispuesto a romper esquemas y disfrutar de su vida de la mejor manera, ademas de crear conciencia en las personas sobre el cuidado de la piel</i></p>
			</div>
			<div id="vision">
				<h2><i><strong>Vision</strong></i></h2><br>
				<p><i>Posicionarse como uno de los principales distribuidores de productos de belleza en el estado de Jalisco, asi como expandir los horizontes de la empresa de manera nacional</i></p>
			</div>
		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Cerrar Sesion</a>
		</div>

	</div>

</body>
</html>