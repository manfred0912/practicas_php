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
			<form action="#" method="post" enctype="multipart/form-data">
				<h1>Descripcion del Producto</h1>
				<?php
				$ID = $_POST["ID"];

				$sql = "SELECT ID, Descripcion, Precio, Enfoque 
        			FROM Productos WHERE ID = '$ID'";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
    			// output data of each row
    				while($row = mysqli_fetch_assoc($result)) {
		
					echo "Codigo " . $row["ID"] . "<br>";
					echo "Descripcion: " . $row["Descripcion"] . "<br>";
					echo "Precio: " . $row["Precio"] . "<br>";
					echo "Enfoque: " . $row["Descripcion"] . "<br>";
    				}
    			}
				?>
				<a href="consultar.php" style="color: black; text-decoration: none;"><strong>Consultar otro producto</strong></a>
			</form>
		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Salir</a>
		</div>

	</div>

</body>
</html>
