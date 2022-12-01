<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos INNER JOIN Carrito ON Productos.ID = Carrito.ID_Producto WHERE ID_sesion=:id_sesion");
$sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
$listaCarrito=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
?>

<?php foreach($listaCarrito as $carrito) { ?>
<?php $total += ($carrito["Cantidad"] * $carrito["Precio"]) ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $carrito['Imagen'] ?>" style="width: 250px; height: 250px;">
    <div class="card-body">
        <h4 class="card-title"><?php echo $carrito['Titulo'] ?></h4>
        <p>Precio: <?php echo $carrito['Precio'] ?></p>
        <form action="proceso_carrito.php" method="POST">
        <input type="hidden" name="<?php echo $carrito['ID_Producto']; ?>">
        <p>Cantidad: <input type="number" name="cantidad" placeholder="<?php echo $carrito['Cantidad'] ?>"></p>
        <input type="Submit" class="btn btn-primary" value="Modificar">
        </form>
        <form method="POST" action="publi.php">
            <input type="hidden" name="<?php echo $carrito['ID'] ?>"><br>
            <input type="submit" class="btn btn-primary" value="Ver más">
        </form>
        <form action="eliminar.php" method="POST">
        <input type="hidden" name="<?php echo $carrito['ID'] ?>">
        <br><input type="submit" class="btn btn-warning" value="Eliminar">
        </form>
    </div>
</div>
</div>
<?php } ?>

<div class="jumbotron">
    <h1 class="display-3">Carrito de compras</h1>
    <p class="lead">Total: <?php echo $total; ?></p>
    <hr class="my-2">
    <p></p>
    <p class="lead">
        <form action="borrar_Carrito.php" method="POST">
            <input type="hidden" name="<?php echo $_SESSION['ID']; ?>">
            <input type="submit" class="btn btn-primary btn-lg" role="button" value="Proceder a la compra"></input>
        </form>
        
    </p>
</div>


<?php include("template/pie.php"); ?>