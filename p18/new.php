<?php session_start(); ?>
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
<body>
<body align="center">
    <form action="./inicio.php" method="post">
        <h1>Codigo</h1>
        <input type="text" name="code" required><br>
        <h1>Apellido paterno</h1>
        <input type="text" name="pat" required><br>
        <h1>Apellido materno</h1>
        <input type="text" name="mat" required><br>
        <h1>edad</h1>
        <input type="text" name="age" required><br>
        <h1>carrera</h1>
        <input type="text" name="career" required><br>
        <h1>Usuario</h1>
        <input type="text" name="username" required><br>
        <h1>Contraseña</h1>
        <input type="text" name="password" required><br><br>
        <input type="submit" name="submit" value="Entrar">
    </form>
</body>
</html>