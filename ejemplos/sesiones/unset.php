<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
	echo "Borraremos el color de la sesión: ";
	unset($_SESSION['color']);
	//Para borrar todos los valores se usa  --> session_unset() <--
?>
<br>
<a href="pag2.php">Ver Pag2.php</a><br>
<a href="index.php">Crear sesión</a>

</body>
</html>