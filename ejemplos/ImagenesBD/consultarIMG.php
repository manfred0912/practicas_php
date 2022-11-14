<?php


	$servername = "localhost";
	$username = "root";
	$password = "";	
	$db = "pruebaimg";

	$conn = mysqli_connect($servername, $username, $password,$db);


	if (!$conn) {
		die("Conexión fallida: " . mysqli_connect_error());
	}	
				
	
	$sql = "SELECT Nombre, Tam, Foto FROM imagenes";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
  		
		while($row = mysqli_fetch_assoc($result)) {
    		echo "Nombre: " . $row["Nombre"]. " - Tamaño: " . $row["Tam"]." - Tipo: " . $row["Foto"]."<br>";

    		$imgBD = $row["Nombre"];
    		echo '<a href="http://www.google.com"><img src="imgdb/'. $imgBD .'" width="40%" height="40%"></a>';
    		echo "<br>";
    		
    	}
	} else {
  		echo "0 results";
	}

mysqli_close($conn);





	
	





?>