<?php session_start(); 
    if(isset($_REQUEST["cerrar"])){
        session_unset("usuario");
    }
    if(isset($_REQUEST["inv"])){
        setcookie("inv", 0, time() - 1,"/");
    }
    if(isset($_SESSION["usuario"])){
        header("Location:grid.php");
        $cale = $_SESSION["usuario"];
        setcookie("cale", $cale, time()+60,"/");
    } else {
?>
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
    <form action="./grid.php" method="post">
        <h1>Usuario</h1>
        <input type="text" name="username"><br>
        <h1>Contraseña</h1>
        <input type="text" name="password"><br><br>
        <input type="submit" name="submit" value="Entrar">
        <h1>¿Deseas entrar como invitado?</h1>
        <input type="submit" name="invitado">
    </form>
    <?php
        if(isset($_REQUEST["submit"])){
            $_SESSION["username"] = $_POST["username"];

            if(isset($_SESSION["username"])){
                $_SESSION["counter"] += 1;
            } else {
                $_SESSION["counter"] = 1;
            }
            header("Location:grid.php");
        }

         if(isset($_REQUEST["invitado"])){
             $cont = $_COOKIE["invitado"];
             setcookie("invitado", $cont + 1, time()+60*60*24,"/");
             header("Location:grid.php");
             setcookie("inv", 1, time()+60*60*24,"/");
         } else {
             $_COOKIE["invitado"] = 1;
         }

    ?>
</body>
</html>
<?php } ?>