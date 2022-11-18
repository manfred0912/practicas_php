<?php
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "paco";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO huesped (firstname, lastname, email)
VALUES ('Ana', 'Lopez', 'a@a.com')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>