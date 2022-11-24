<?php
session_start();
//verificar si existe "Usuario", en caso de no ser así se redrigirá al Index.
  if(!isset($_SESSION['usuario'])){
    header("Location:index.php");
  }else{

    if($_SESSION['usuario']=="ok"){
      $nombreAdmin=$_SESSION["nombreAdmin"];
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Inicio Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Administrador <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="../inicioadmin.php">Inicio |</a>

            <a class="nav-item nav-link" href="../administrador/seccion/figuras.php"">Figuras |</a>
            <a class="nav-item nav-link" href="../seccion/cerrar.php"">Cerrar Sesión |</a>
            
            <a class="nav-item nav-link" href="/pweb/PFinal2/login.html">Ir al Sitio Web</a>
        </div>
    </nav>

    <div class="container">
        <br>
        <div class="row">