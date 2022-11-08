<?php
include("config.php");
mysqli_select_db($conn,"dbescuela");

$usr = $_POST["username"];
$passw = $_POST["password"];

$query = "SELECT * FROM Log_in WHERE Username = '$usr' AND Contrasenia = '$passw'";
$result = mysqli_query($conn, $query);
$count = mysqli_num_rows($result);

if ($count>0) {
    header("Location:inicio.php");
} else {
    header("Location:loginissue.html");
}
?>