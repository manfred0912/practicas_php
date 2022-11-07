<?php

	include("conexion.php");

	$username=$_POST['u'];
	$password=$_POST['p'];

	if ($username==="Administrador" && $password==="Administrador") {
		header("location:sesionadmin.php");
	}else{
		header("location:formadm.php");
	}

?>