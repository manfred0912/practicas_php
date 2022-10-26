<?php
	// Comenzar Sesión. Debe ser siempre lo primero!!! incluso antes de las etiquetas HTML
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>
	h1 {
	  color: <?php echo $_SESSION["color"];?> ;
	} 
</style>
</head>
<body>

<?php
	echo "Hola <h1>".$_SESSION["login"]. "</h1>";
	echo "La fuerza del password ".$_SESSION["pass"]." es débil";
?>
<br>
<a href="destroy.php">Destroy sesión</a><br>
<a href="unset.php">Unset sesión</a><br>

</body>
</html>