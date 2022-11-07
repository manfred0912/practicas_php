<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "cliente";

$ID=$_GET["cod"];
$nombre=$_GET["nombr"];
$app=$_GET["apllp"];
$apm=$_GET["apllm"];
$cp=$_GET["codpos"];
$cumple=$_GET["bday"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$sql = "UPDATE clientes SET Nombre='$nombre', Apellido_P='$app', Apellido_M='$apm', CP='$cp', Fecha_Nac='$cumple' WHERE id='$ID'";

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>