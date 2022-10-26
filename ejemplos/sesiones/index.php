<?php
	// Comenzar Sesión. Debe ser siempre lo primero!!! incluso antes de las etiquetas HTML
	session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
	// Asignar las variables de sesión
	$_SESSION["login"] = "paco";
	$_SESSION["pass"] = "12345";
	$_SESSION["color"] = "yellow";
	echo "Las variables de sesión han sido creadas";
?>
<br>
<a href="pag2.php">Ir a Pagina 2</a>
</body>
</html>