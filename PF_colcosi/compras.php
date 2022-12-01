<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos INNER JOIN Ventas ON Productos.ID = Ventas.ID_Producto WHERE ID_Cliente=:id_Cliente");
$sentenciaSQL->bindParam(':id_Cliente',$_SESSION['ID']);
$sentenciaSQL->execute();
$listaCarrito=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-2"></div>

<div class="col-md-8">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>Precio unitario</th>
                <th>Cantidad</th>
                <th>Precio total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaCarrito as $producto) { ?>
            <tr>
                <td><?php echo $producto['Titulo']?></td>
                <td><?php echo $producto['Categoria']?></td>
                <td>
                    <img class="img-thumbnail rounded" src="img/<?php echo $producto['Imagen']?>" width="50" alt="">
                    
                </td>
                <td><?php echo $producto['Precio']?></td>
                <td><?php echo $producto['Cantidad']?></td>
                <td><?php echo $producto['Total']?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<div class="col-md-2"></div>

<?php include("./template/pie.php"); ?>