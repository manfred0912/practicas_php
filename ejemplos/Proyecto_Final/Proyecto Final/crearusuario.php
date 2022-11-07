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
        <h1>Crear Usuario</h1>
        <form action="insertarusuario.php" method="post">
        	<label>Nombre de Usuario: </label><input type="text" name="newusername" required="required"><br>
        	<label>Contraseña: </label><input type="password" name="newpassword" required="required"><br>
        	<input type="submit" name="insertuser" value="Crear">
        </form>
        <a href="Login.php">Regresar</a>
    </div>
</body>
</html>