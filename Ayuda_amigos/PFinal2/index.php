<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$result = $conn->query("SHOW DATABASES LIKE 'tienda';");
if ($result->num_rows == 0) {
    header("Location:Crear.php");
}else{
    header("Location:login.html");
}

mysqli_close($conn);
session_start(); ?>
