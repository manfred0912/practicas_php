<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
	// Borra toda la sesión, como si se hubiera cerrado el navegador, sin salir del sitio.
	session_destroy();
	echo "Se borraron las variables de sesión" ;
?>
<br>
<a href="pag2.php">Ver Pag2.php</a><br>
<a href="index.php">Crear sesión</a>

</body>
</html>