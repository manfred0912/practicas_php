<?php
session_start();    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
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
            grid-template-columns: 78% 20%;
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
            font-size: 2rem;
            background-color: <?php echo $_SESSION["color"]?>
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
            <?php echo "Hola " . $_SESSION["username"] . "!"; ?>
            <form action="./inicio.php" method="POST">
                <input type="submit" name="cerrar" value="Cerrar sesión">
            </form>
        </div>
        <div class="aside">
            <form action="./color.php" method="POST">
                <label>¿De que color quieres que se muestre la pagina?</label><br>
                <input type="color" name="color">
                <input type="submit" value="Procesar" name="col">
            </form>
        </div>
        <div class="article">
            <p><a href="./registro.php">Registrar materias</a></p>
            <p><a href="./horario.php">Consultar horario</a></p>
        </div>
        <div class="footer">
        </div>
    </div>
    <?php
    if(isset($_REQUEST["cerrar"])){
        session_unset();
        header("Location:login.php");
    }
    ?>
</body>
</html>