<!DOCTYPE html>

<?php
	$nombre_c = "usuario";
	$valor_c = "Paco";
      //setcookie(nombre de la cookie, valor,
	//setcookie($nombre_c, $valor_c, time() + (86400 * 30), "/"); 
?>

<html>
<body>

<?php
	if(!isset($_COOKIE[$nombre_c])) {
   	    echo "La cookie '" . $nombre_c . "' no está creada";
	} else {
 	    echo "La cookie '" . $nombre_c . "' está creada<br>";
 	    echo "Su valor es: " . $_COOKIE[$nombre_c]."<br>";
	}

	/*ACTUALIZAR COOKIE
	setcookie($nombre_c,"",time()-1,"/");
	echo "El valor actualizado es: ".$_COOKIE[$nombre_c]."<br>";
	

	BORRAR COOKIES
	
	
	setcookie($nombre_c,"",time()-1,"/"); */
	
?>



</body>
</html>