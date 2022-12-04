<?php 

// Inetento #2 de cookies (tampoco jalo :c)

// if(!isset($_COOKIE["color"])){
//     setcookie("color", "navbar navbar-expand-lg navbar-dark bg-dark", time() + 60 * 60 * 24 * 7, "/");
// } else {
    // $cale = implode($_POST);
    // echo $cale;
    // if(isset($_POST["vista"])){
    //     $vista = $_POST["vista"];
    //     switch($vista){
    //         case "claro": 
    //             setcookie("color", "navbar navbar-expand-lg navbar-light bg-light", time() + 60 * 60 * 24 * 7, "/");
    //             break;
            
    //         case "oscuro":
    //             setcookie("color", "navbar navbar-expand-lg navbar-dark bg-dark", time() + 60 * 60 * 24 * 7, "/");
    //             break;
    //     }
    // } else {
    //     setcookie("color", "navbar navbar-expand-lg navbar-dark bg-dark", time() + 60 * 60 * 24 * 7, "/");
    // }
    

// }

// echo $_COOKIE["color"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colchonetas cosidas</title>

    <link rel="stylesheet" href="./css/bootstrap.min.css" />
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
                <a class="navbar-brand" href="index.php"><img src="./template/logo.png" alt="Logo" style="width:100px; margin: 10px; ;"></a>
            </li>
        </ul>
        <ul class="navbar-nav mx-auto">
            <li class="nav-item">
                <a class="nav-link" href="productos.php">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cotizaciones.php">Cotizaciones</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="cotizaciones.php">Guayna se la come</a>
            </li>
        </ul>
        <!-- <ul class="navbar-nav ml-auto" style="margin-right: 50px; display: inline-block;">
            <form method="POST" action="">
                <li class="nav-item" style="color: white; font-size: 10px;"><input type="image" name="cale" src="./template/foco.png" style="width: 20px; height: 20px;"><br>Claro</input</li>
                <li class="nav-item" style="color: white; font-size: 10px;"><input type="image" name="vista" src="./template/luna.png" style="width: 20px; height: 20px;"><br>Oscuro</input</li>
            </form>
        </ul> -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a class="navbar-brand" href="carrito.php"><img src="./template/carrito.png" style="width: 50px; height: 50px;"><br>Carrito</a></li>
            <?php if(isset($_SESSION['correo'])){ ?>
                <li class="nav-item"><a class="navbar-brand" href="cuenta.php"><img src="./template/user.png" style="width: 50px; height: 50px;"> <br> Cuenta</a></li>
            <?php } else { ?>
                <li class="nav-item"><a class="navbar-brand" href="login.php"><img src="./template/user.png" style="width: 50px; height: 50px;"> <br> Iniciar sesión</a></li>
            <?php } ?>
        </ul>
        
        
    </nav>
    <div class="container">
        <br>
        <div class="row">