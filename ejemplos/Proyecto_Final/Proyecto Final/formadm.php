<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Fabiru Store</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>
    <div class="login">
        <h1 id="fabiru">FABIRU STORE</h1>
        <h1>Sesion Administrador</h1>
        <form action="validaradm.php" method="post">
        	<label>Usuario: </label><input type="text" name="u" required="required"><br>
        	<label>Contraseña: </label><input type="password" name="p" required="required"><br>
        	<input type="submit" name="validar" value="Ingresar">
        </form>
        <a href="Login.php">Regresar</a>
    </div>
</body>
</html>