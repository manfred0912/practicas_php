<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   $conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

   if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>