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
        <h1>Iniciar Sesion</h1>

        <form action="validar.php" method="post">
            <input type="text" name="u" placeholder="Usuario"/>
            <input type="password" name="p" placeholder="Contrasena"/>
            <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Ingresar</button>
        </form>

        <form action="sesioninv.php" method="post">
            <button type="submit" name="logininv" class="secundarios">Ingresar como invitado</button>
        </form>

        <form action="formadm.php" method="post">
            <button type="submit" name="loginadmin" class="secundarios">Administrador</button>
        </form>

        <span><a href="crearusuario.php">Crear Usuario</a></span>
    </div>
</body>
</html>

