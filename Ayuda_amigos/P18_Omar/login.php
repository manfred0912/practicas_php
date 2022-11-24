<?php
$servername = "localhost";
$username = "root";
$password = "";


$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            background: url(https://imgs.search.brave.com/XlSV0E1IsP-hiFSeyEMaDHl4ywAe0wZ2m1OX6WMZzAs/rs:fit:1200:1200:1/g:ce/aHR0cHM6Ly93d3cu/aG9zdHVkZW50cy5j/b20vcGljc19mb3Rv/c3VuaXZlcnNpZGFk/ZXMvMTIvZ2VuZXJp/Y28tMS5qcGc) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

        div{
            color: white;
            color: white;
            background-color: rgba(128, 128, 128, 0.205);
        }

        a{
            color: white;
        }

    </style>
</head>
<body>
    <div align="center">
    <form action="login.php" method="post">
        <h2>¡Bienvenido/a!</h2>
        NIP: <input type="number" max="9" name="codigo" placeholder="Código de estudiante..." required><br><br>
        Contraseña: <input type="password" name="passw" placeholder="Contraseña..." required><br><br>
        <input type="submit" name="submit" value="Iniciar Sesión">
    </form>
    <form action="register.html" method="post">
        <br> ¿No tienes cuenta?
        <br> <input type="submit" name="registro" value="Registrarse">
    </form>
    </div>

</body>
</html>
