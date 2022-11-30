<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colcosi";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_POST) {
    if (($_POST['usuario'] == "admin") && ($_POST['contrasenia'] == "admin")) {
        $_SESSION['usuario'] = "ok";
        $_SESSION['nombreUsuario'] = "admin";
        header('Location:inicio.php');
    } else {
        $mensaje = "Error: El usuario o contraseña son incorrectos";
    }
}

if ($_POST) {
    $correo = $_POST['correo'];
    $passw = $_POST['contrasenia'];

    if (($_POST['correo'] == "admin") && ($_POST['contrasenia'] == "admin")) {
        $_SESSION['usuario'] = "ok";
        $_SESSION['nombreUsuario'] = "admin";
        header('Location:administrador/inicio.php');
    } else {
        $mensaje = "Error: El usuario o contraseña son incorrectos";
    }

    $query = "SELECT * FROM clientes WHERE Correo = '$correo' AND Contrasenia = '$passw'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["correo"] = $correo;
        header("Location:index.php");
    } else {
        $mensaje = "Error: El correo o la contraseña son incorrectos";
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4">
        </div>
        <div class="col-md-4">
            <br><br>
            <div class="card">
                <div class="card-header">
                    Login
                </div>

                <?php if (isset($mensaje)) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $mensaje; ?>
                    </div>
                <?php } ?>

                <div class="card-body">
                    <form method="POST">
                        <div class="form-group">
                            <label>Correo electronico: </label>
                            <input type="text" class="form-control" name="correo" aria-describedby="emailHelp" placeholder="Escribe tu correo">
                        </div>
                        <div class="form-group">
                            <label>Contraseña: </label>
                            <input type="password" class="form-control" name="contrasenia" placeholder="Escribe tu contraseña">
                            <br>
                            <button type="submit" class="btn btn-primary">Ingresar</button>
                            <div class="form-group">
                                <label>¿Usuario nuevo? <a href="nueva.php">Crea una cuenta</a></label>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<?php include("./template/pie.php"); ?>