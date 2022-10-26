<?php
session_start();
if (!isset($_POST["invitado"])) {
    $_SESSION["login"] = $_POST["username"];
    $_SESSION["pass"] = $_POST["password"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grid</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        h1 {
            color: white;
            font-size: 4rem;
            margin: 0;
        }

        img {
            width: 10rem;
            height: 10rem;
        }

        .container {
            display: grid;
            grid-template-areas:
                'header header'
                'aside article'
                'footer footer';
            padding: 2rem;
            row-gap: 2rem;
            column-gap: 2rem;
            grid-template-columns: 30% 68%;
            grid-template-rows: 15rem 40rem 15rem;
            background-color: rgb(255, 180, 196)
        }

        .container div {
            display: grid;
            justify-content: center;
            align-content: center;
        }

        .header {
            grid-area: header;
            font-size: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
        }

        .aside {
            grid-area: aside;
            font-size: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
        }

        .article {
            grid-area: article;
            grid-template-areas:
                'articulo'
                'imagen';
            padding: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
        }

        #articulo {
            align-content: flex-end;
        }

        .articulo {
            grid-area: articulo;
        }

        .imagen {
            grid-area: imagen;
            display: grid;
            grid-auto-flow: column;
            justify-content: space-evenly;
        }

        .footer {
            grid-area: footer;
            background-color: <?php echo $_SESSION["color"]?>
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Header</h1>
            <div>
                <?php if (isset($_SESSION["login"])) { ?>
                    <?php echo "Hola " . $_SESSION["login"] . "!"; ?>
                <?php } else { ?>
                    <p><a href="./login.php">INGRESAR</a></p>
                <?php } ?>
            </div>
        </div>
        <div class="aside">
            <form action="./grid.php" method="POST">
                <label>¿De que color quieres que se muestre la pagina?</label><br>
                <input type="radio" name="color" value="verde">Verde.<br>
                <input type="radio" name="color" value="azul">Azul.<br>
                <input type="radio" name="color" value="rojo">Rojo.<br>
                <input type="radio" name="color" value="morado">Morado.<br>
                <input type="submit" value="Procesar">
            </form>
        </div>
        <div class="article" id="articulo">
            <div class="articulo">
                <h1>Article</h1>
            </div>
            <div class="imagen">
                <img src="./leon.png">
                <img src="./leon.png">
                <img src="./leon.png">
            </div>
        </div>
        <div class="footer">
            <h1>Contador de visitas al sitio</h1><br>
            <h1><?php echo "Generales: ".$_COOKIE["counter"].", En esta sesión: ".$_SESSION["cont"]; ?></h1>
        </div>
    </div>
    <?php
    $color = ($_POST["color"]);
    switch ($color) {
        case 'verde':
            $_SESSION["color"] = "green";
            break;

        case 'azul':
            $_SESSION["color"] = "blue";
            break;

        case 'rojo':
            $_SESSION["color"] = "red";
            break;

        case 'morado':
            $_SESSION["color"] = "purple";
            break;
    }

    $counter = 0;
    if(!isset($_COOKIE["counter"])){
        $counter = 1;
        setcookie("counter", $counter, time()+60*60*24,"/");
    } else {
        $counter = ++$_COOKIE["count"];
        setcookie("counter", $counter, time()+60*60*24,"/");
    }

    $cont = 0;
    if(isset($_POST["submit"])){
        $cont = 1;
        $_SESSION["cont"] = $cont;
    } else {
        $cont = 0;
        $_SESSION["cont"] = $cont;
    }
    ?>
</body>
</html>