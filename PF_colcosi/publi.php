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
        </div><br>
        <p class="lead"><?php echo $producto['Titulo'] ?></p>
        <hr class="my-2">
        <p>Alto: <?php echo $producto['Alto']?> CM | Ancho: <?php echo $producto['Ancho']?> CM</p>
        <p>Grosor: <?php echo $producto['Grosor']?> CM | Precio: <?php echo $producto['Precio']?> CM</p>
        <p class="lead">
            <?php if(isset($_SESSION['ID'])) { ?>
            <form action="proceso_carrito.php" method="POST">
                <input type="hidden" name="<?php echo $id; ?>" id="">
                <p>Cantidad: </p><input type="number" name="cantidad">
                <input type="submit" class="btn btn-primary" value="Agregar al carrito"></input>
            </form>
            <?php } else { ?>
                <p>Para agregar al carrito, debe iniciar sesión</p>
                <form action="login.php">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
                </form>
            <?php } ?>
        </p>
    </div>
</div>
<?php include("template/pie.php"); ?>