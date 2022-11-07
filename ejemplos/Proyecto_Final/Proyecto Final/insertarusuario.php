<?php
include("conexion.php");

$nombre=$_POST['newusername'];
$password=$_POST['newpassword'];

$sql="INSERT INTO usuarios (usuario, password)
	VALUES ('$nombre', '$password')";

if (mysqli_query($conn, $sql)) {
    
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
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
        <h1>Crear Usuario</h1>
        <?php
            echo "Usuario creado";
        ?>
        <a href="Login.php"><br>Regresar</a>
    </div>
</body>
</html>