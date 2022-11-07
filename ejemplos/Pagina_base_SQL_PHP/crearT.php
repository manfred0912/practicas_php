<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "cliente";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql = "CREATE TABLE clientes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
Nombre VARCHAR(30) NOT NULL,
Apellido_P VARCHAR(30) NOT NULL,
Apellido_M VARCHAR(30) NOT NULL,
CP VARCHAR(5),
Fecha_Nac DATE,
Sexo VARCHAR(1)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>