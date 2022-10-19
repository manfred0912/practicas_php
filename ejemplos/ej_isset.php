<?php
	if(isset($_POST['submit'])){
    	$name = $_POST['name'];
    	echo "Ya ingresaste datos en el formulario : <b> $name </b>";
    	echo "<br>Puedes ingresar nuevamente datos.";
	}
	else{
		echo "No existe el SUBMIT!";
	}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
   <input type="text" name="name" value="Juan"><br>
   <input type="submit" name="submit" value="Aceptar"><br>
</form>