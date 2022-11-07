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
$ID=$_GET["cod"];



// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT ID, Nombre, Apellido_P, Apellido_M, CP, Fecha_Nac, Sexo FROM clientes WHERE id='$ID'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
		
		
	?>	
		<form action='cambio.php' method='get'>
		<table>
			<tr>
				<td>ID: </td>
				<td><input type='text' name='cod' value="<?php echo $row["ID"];?>"></td>
			</tr> 
			<tr>
				<td>Nombre:</td>
				<td><input type='text' name='nombr' value="<?php echo $row["Nombre"];?>"></td>
			</tr>                                
			<tr>
				<td>Apellido Paterno:</td>
				<td><input type='text' name='apllp' value="<?php echo $row["Apellido_P"];?>"></td>
			</tr>
			<tr>
				<td>Apellido Materno:</td>
				<td><input type='text' name='apllm' value="<?php echo $row["Apellido_M"];?>"></td>
			</tr>
			<tr>
				<td>CP:</td>
				<td><input type='text' name='codpos' value="<?php echo $row["CP"];?>"></td>
			</tr>
			<tr>
				<td>Fecha Nacimiento:</td>
				<td><input type='date' name='bday' value="<?php echo $row["Fecha_Nac"];?>"></td>
			</tr>
		</table>
		<br><br>
		<input type='submit' value='Submit'>
		</form>
	<?php
	
      
    }
} else {
    echo "0 results";
}
	


mysqli_close($conn);
?>

<h3><a href="index.html">REGRESAR</a></h3></li>
</body>
</html>