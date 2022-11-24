<?php 
$host = "localhost";
$db = "tienda";
$username = "root";
$password = "";


try {
    $conn=new PDO("mysql:host=$host;dbname=$db",$username,$password);

} catch (Exception $ex) {
    
    echo $ex->getMessage();

}
?>