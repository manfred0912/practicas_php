<html>
<head>
  <meta charset="UTF-8">
</head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "cliente";

$nombre=$_GET["nombr"];
$app=$_GET["apllp"];
$apm=$_GET["apllm"];
$cp=$_GET["codpos"];
$cumple=$_GET["bday"];
$sexo=$_GET["genero"];



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 

$sql = "INSERT INTO clientes (Nombre, Apellido_P, Apellido_M, CP, Fecha_Nac, Sexo)
VALUES ('$nombre','$app','$apm','$cp','$cumple','$sexo')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>

<h3><a href="index.html">REGRESAR</a></h3></li>
</body>
</html>