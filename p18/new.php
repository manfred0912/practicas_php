<?php
$codigo = $_POST["code"];
$nombre = $_POST["nombre"];
$pat = $_POST["pat"];
$mat = $_POST["mat"];
$age = $_POST["age"];
$career = $_POST["career"];
$username = $_POST["username"];
$contrasenia = $_POST["password"];

include("config.php");
mysqli_select_db($conn,"dbescuela");

$sql = "INSERT INTO Log_in (Code, Nombre, ApP, ApM, Age, Career, Username, Contrasenia)
VALUES ('$codigo','$nombre','$pat','$mat','$age','$career','$username','$contrasenia')";

if (mysqli_query($conn, $sql)) {
    header("Location:inicio.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
