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
$dbname = "tienda";

$email = $_POST["email"];
$user = $_POST["user"];
$pass = $_POST["passw"];
$cpass = $_POST["cpassw"];


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO clientes (Correo, Nombre, Contrasenia)
VALUES ('$email', '$user', '$pass')";

if (mysqli_query($conn, $sql)) {
    echo "Cuenta registrada exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

?>

<?php header("Location:login.html"); ?>

</body>
</html>

