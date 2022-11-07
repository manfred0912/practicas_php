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
$cod=$_GET["cod"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sqlbai = "DELETE FROM clientes WHERE id=$cod";

if (mysqli_query($conn, $sqlbai)) {
    echo "Se ha borrado";
} else {
    echo "No se pudo borrar: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<h3><a href="index.html">REGRESAR</a></h3></li>
</body>
</html>