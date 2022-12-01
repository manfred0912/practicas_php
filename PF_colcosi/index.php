<?php  session_start();
include("template/cabecera.php"); 
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM Clientes WHERE Correo=:correo");
$sentenciaSQL->bindParam(':correo',$_SESSION['correo']);
$sentenciaSQL->execute();
$producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

if(isset($producto["ID"])){
    $_SESSION['ID'] = $producto["ID"];
}
?>
<div class="jumbotron">
    <h1 class="display-3">¡Bienvenido a colchonetas cosidas!</h1>
    <p class="lead">Aqui podras encontrar nuestra variedad de productos y contactarnos para casos especiales</p>
    <hr class="my-2">
    <p class="lead">

        <a class="btn btn-primary btn-lg" href="productos.php" role="button">Visitar productos</a>
    </p>
</div>

<?php include("template/pie.php"); ?>