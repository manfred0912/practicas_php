<?php
	session_start();

	include("conexion.php");

	if (isset($_POST['u'])) {
    	$_SESSION['nombreusuario'] = $_POST['u'];
	}

	if (isset($_POST['p'])) {
    	$_SESSION['password'] = $_POST['p'];
	}

	$username=$_POST['u'];
	$password=$_POST['p'];

	$sql="SELECT * FROM usuarios WHERE usuario='$username' AND password='$password'";

	$res=mysqli_query($conn, $sql);

	$filas=mysqli_num_rows($res);

	if ($filas > 0) {
		header("location:sesion.php");
	}else{
		echo "Usuario o contraseña incorrectos";
		header("location:Login.php");
	}



?>