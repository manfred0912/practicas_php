<?php
$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$result = $conn->query("SHOW DATABASES LIKE DBEscuela");
if ($result->num_rows == 0) {
    header("Location:creacion.php");
}

mysqli_close($conn);
session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
        }

        form {
            margin: 50px;
            border: 1px solid;
        }
    </style>
</head>

<body align="center">
    <form action="./comprobacion.php" method="post">
        <h1>Usuario</h1>
        <input type="text" name="username" required><br>
        <h1>Contraseña</h1>
        <input type="text" name="password" required><br><br>
        <input type="submit" name="submit" value="Entrar">
    </form>
    <h1>¿Eres usuario nuevo? Crea una cuenta</h1><br>
    <h2><a href="./comprobacion.php">Crear cuenta</a></h2>
</body>

</html>