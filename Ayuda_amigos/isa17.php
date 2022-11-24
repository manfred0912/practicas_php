<?php
session_start();

?>

<!DOCTYPE html>
<html>
    <head><link rel="stylesheet" href="cookies.css"></head>
    <body>
        
        <h1 align="center">Welcome to Hellish Puppers!</h1>
        
        <form action="cookies.php" method="post">
            <div class="fotoperfil">
            <img src="FP_Cerberus.png" class="avatar">
            </div>
        
            <br>
            <br>


            <h2 align="center">Login</h2>


            <div align="center" class="inputcont">
            <label for="nombusr"><b>Usuario: </b></label>
            <input type="text" placeholder="Inserte nombre de usuario" name="nombusr" required>
        
            <br>
            <br>
        
            <label for="contr"><b>Contraseña: </b></label>
            <input type="password" placeholder="Inserte contraseña" name="contr" required>
            </div>            

            <div align="center">
            <input type="submit" name="submit" value="Login"></input>

                <br>
                <br>

            <input type="submit" name="invitado" value="Entrar como invitado"></input>
            </div>
        </form>

        <?php
        
        if(isset($_REQUEST["submit"])) {
            $_SESSION["username"] = $_POST["nombusr"];
            $_SESSION["password"] = $_POST["contr"];
            header("Location:cookies.php");
        }
        
        if(isset($_REQUEST["invitado"])){
            setcookie("invitado", 1);
        }



        ?>

    </body>
</html>