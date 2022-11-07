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
$apellidopat=$_GET["app"];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ID, Nombre, Apellido_P, Apellido_M, CP, Fecha_Nac, Sexo 
        FROM clientes WHERE apellido_p LIKE '$apellidopat%'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		echo "El ID " . $row["ID"] . " Corresponde al registro: <br>";
		echo "<h3>".$row["Nombre"] ." ". $row["Apellido_P"] ." ". $row["Apellido_M"] ."</h3><br>";
		echo $row["CP"] ." ". $row["Fecha_Nac"] ." ". $row["Sexo"] ."<br>";
      
    }
} else {
    echo "0 results";
}
	
	echo "Qué deseas hacer?";
	echo "<h3><a href='modificar.php'>MODIFICAR</a></h3>";
	echo "<h3><a href='eliminar.php'>ELIMINAR</a></h3>";



mysqli_close($conn);
?>

<h3><a href="index.html">REGRESAR</a></h3></li>
</body>
</html>