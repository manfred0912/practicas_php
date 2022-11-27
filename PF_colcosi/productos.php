<?php include("template/cabecera.php"); 
include("administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen'] ?>" alt="">
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['Titulo'] ?></h4>
        <a name="" id="" class="btn btn-primary" href="#" role="button">Ver mas</a>
    </div>
</div>
</div>
<?php } ?>

<?php include("template/pie.php"); ?>