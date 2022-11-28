<?php 
session_start();
include("./template/cabecera.php");
include("administrador/config/bd.php");


$id = implode(array_keys($_POST));


$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$id);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <div class="display-3">
            <img src="./img/<?php echo $producto['Imagen']?>" style="width: 500px; height: 500px;">
        </div>
        <p class="lead"><?php echo $producto['Titulo'] ?></p>
        <hr class="my-2">
        <p>Alto: <?php echo $producto['Alto']?> | Ancho: <?php echo $producto['Ancho']?></p>
        <p>Grosor: <?php echo $producto['Grosor']?> | Precio: <?php echo $producto['Precio']?></p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>
</div>
<?php include("template/pie.php"); ?>