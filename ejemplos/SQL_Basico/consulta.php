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

$sql = "SELECT id, firstname, lastname, email FROM huesped";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<br><br>id: <b>" . $row["id"]. "</b> - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        echo "Tu correo es: <i>".$row["email"]."</i>";
    }
} else {
    echo "Sin resultados";
}

mysqli_close($conn);
?>