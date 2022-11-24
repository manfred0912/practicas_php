<?php include("template/header.php");?>

<?php
include("administrador/config/basedatos.php");

$sentenciaSQL= $conn->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaproductos as $producto){ ?>


<div class="col-md-3">          
</div>
<div class="col-md-2">
<div class="card">
<?php //Mostrar imagen de la figura en la página principal ?>
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen']; ?>" alt="">
<div class="card-body">
<?php //Mostrar Información de la figura en la página principal ?>
    <h4 class="card-title"><?php echo $producto['Titulo']; ?></h4>
    <p class="card-text"><?php echo $producto['Categoria']; ?></p>
    <p class="card-text"><?php echo "$ ".$producto['Precio']; ?></p>
    <a name="" id="" class="btn btn-dark" href="FiguraVerMas.php" role="button">Ver más</a>
</div>
</div>
</div>

<?php } ?>

<?php include("template/footer.php");?>