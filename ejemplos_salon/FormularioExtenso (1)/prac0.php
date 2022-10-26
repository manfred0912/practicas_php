<!DOCTYPE html>
<html>
<body>

<?php
$n = $_POST["usr"];
$a = $_POST["pass"];
$g = $_POST["genero"];
$c = $_POST["color"];
if(isset($_POST["vehiculo1"])){
	$v1 = $_POST["vehiculo1"];
}
if(isset($_POST["vehiculo2"])){
	$v2 = $_POST["vehiculo2"];
}
if(isset($_POST["vehiculo3"])){
	$v3 = $_POST["vehiculo3"];
}


echo "<h2>Bienvenido</h2>";
echo "Hola <b>". $n . "</b>, tu contraseña es: <i>".$a."</i>";
echo "<br>El género seleccionado es: ";
if($g=='m'){
	echo "Masculino";
}
else if($g=='f'){
	echo "Femenino";
}
else{
	echo "Otro";
}
echo "<br>Tu color favorito fue el: ".$c;
echo "<br>Tu vehiculo seleciconado fue el: ";
if(isset($v1)){
	echo $v1." ";
}
if(isset($v2)){
	echo $v2." ";
}
if(isset($v3)){
	echo $v3;
}


?>


</body>
</html>