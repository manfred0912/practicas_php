
  <?php
	$usuario = $_POST["usuario"];
	$color = $_POST["color"];


	if(isset($_POST['submit'])) {
	  //setcookie(nomb Cookie, valor , expiración    ,    ruta)	;
		setcookie("user", $usuario, time() + (86400 * 30), "/"); /*La diagonal indica que la cookie afecta a todo */
		setcookie("colores", $color, time() + (86400 * 30), "/"); /*La diagonal indica que la cookie afecta a todo */
		echo "Bienvenido ".$_COOKIE["user"]."<br>";
		echo "Tu color es: ".$_COOKIE["colores"];
	}
	
	if(isset($_POST['actualizar'])) {
		setcookie("user", $usuario, time() + (86400 * 30), "/"); /*La diagonal indica que la cookie afecta a todo */
		setcookie("colores", $color, time() + (86400 * 30), "/"); /*La diagonal indica que la cookie afecta a todo */
		echo "Bienvenido ".$_COOKIE["user"]."<br>";
		echo "Tu color es: ".$_COOKIE["colores"];
		echo "Cookie actualizada";
	}

	if(isset($_POST['borrar'])) {
		setcookie("user","",time()-3600,"/");
		setcookie("colores","",time()-3600,"/");
		
		echo "Cookie borrada";
	}
	if(isset($_POST['show'])) {
		echo "Bienvenido ".$_COOKIE["user"]."<br>";
		echo "Tu color es: ".$_COOKIE["colores"];

	}


?>
