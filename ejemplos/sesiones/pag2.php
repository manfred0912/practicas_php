<?php
	// Comenzar Sesión. Debe ser siempre lo primero!!! incluso antes de las etiquetas HTML
	session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
	if(isset($_SESSION["login"])){
		echo "Hola ".$_SESSION["login"]. " tu color favorito es el ".$_SESSION["color"]."<br>";
		echo "La fuerza del password ".$_SESSION["pass"]." es débil<br><br>";
		echo "El arreglo de sesión es: ";
		print_r($_SESSION);
	}else{
		echo "No hay login!!";
	}
?>
<br>
<a href="pag3.php">Ver Color en usuario</a><br>
<a href="destroy.php">Destroy sesión</a><br>
<a href="unset.php">Unset sesión</a><br>

</body>
</html>