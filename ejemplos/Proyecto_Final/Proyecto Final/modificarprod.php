<?php

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
			<?php

				$codigo=$_POST['codigo'];

				$sql = "SELECT ID, Descripcion, Precio, Enfoque, Imagen FROM productos WHERE ID='$codigo'";
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
    				while($row = mysqli_fetch_assoc($result)) {	
					
					$Codigo=$row['ID'];
					$Descripcion = $row['Descripcion'];
					$Precio=$row['Precio'];
					$Enfoque=$row['Enfoque'];
					$Imagen=$row['Imagen'];
				?>

					<form action='cambio.php' method='post'>
					<table style="border: 1px solid black">
					<tr>
						<td>Codigo: </td>
						<td><input type='text' name='id' value="<?php echo $Codigo;?>"></td>
					</tr> 
					<tr>
						<td>Descripcion:</td>
						<td><input type='text' name='desc' value="<?php echo $Descripcion;?>"></td>
					</tr>                                
					<tr>
						<td>Precio:</td>
						<td><input type='precio' name='precio' value="<?php echo $Precio;?>"></td>
					</tr>
					<tr>
						<td>Enfoque:</td>
						<td><input type='text' name='enfoque' value="<?php echo $Enfoque;?>"></td>
					</tr>
					<tr>
						<td>Imagen:</td>
						<td><input type='file' name='imagen' value="<?php echo $Imagen;?>"></td>
					</tr>
					</table>
					<br><br>
					<input type='submit' value='Modificar'>
					</form>

				<?php
					}
				}
				?>

		</div>

		<div class="footer">
			<strong>Contacto:</strong> Fabiola Margarita Pérez &nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217&nbsp;&nbsp;<strong>|</strong>&nbsp;&nbsp;3317607217fab@gmail.com
			<a href="Login.php" class="salir">Salir</a>
		</div>

	</div>

</body>
</html>