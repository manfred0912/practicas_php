<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Escuela";

$nip = $_POST["nip"];
$nombr = $_POST["nombre"];
$app = $_POST["apP"];
$apm = $_POST["apM"];
$edad = $_POST["edad"];
$carrera = $_POST["carrera"];
$contr = $_POST["passw"];
$ccontr = $_POST["cpassw"];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO log_in (NIP, Nombre, ApP, ApM, Edad, Carrera, Contrasena)
VALUES ('$nip', '$nombr', '$app', '$apm', '$edad', '$carrera', '$contr')";

if (mysqli_query($conn, $sql)) {
    echo "Cuenta registrada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>
<br><a href="login.php">REGRESAR</a>
</body>
</html>
