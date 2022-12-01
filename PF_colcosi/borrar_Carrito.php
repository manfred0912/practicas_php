<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");
include("./administrador/config/bd.php");

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos INNER JOIN Carrito ON Productos.ID = Carrito.ID_Producto WHERE ID_sesion=:id_sesion");
$sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
$listaCarrito=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

if($listaCarrito!=NULL){
    foreach($listaCarrito as $carrito){
        $precio = $carrito['Cantidad'] * $carrito['Precio'];
        $sentenciaSQL = $conexion->prepare("INSERT INTO Ventas (ID_Cliente, ID_Producto, Cantidad, Total) VALUES (:id_cliente,:id_producto,:cantidad,:total);");
        $sentenciaSQL->bindParam(':id_cliente',$_SESSION['ID']);
        $sentenciaSQL->bindParam(':id_producto',$carrito['ID_Producto']);
        $sentenciaSQL->bindParam(':cantidad',$carrito['Cantidad']);
        $sentenciaSQL->bindParam(':total',$precio);
        $sentenciaSQL->execute();
    }
}

$sentenciaSQL = $conexion->prepare("DELETE * FROM Carrito WHERE ID_sesion=:id_sesion");
$sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
?>

<div class="jumbotron">
    <h1 class="display-3">¡Compra realizada!</h1>
    <p class="lead">Podra consultar los detalles de su pedido en la sección de <a href="compras.php">compras</a> que se encuentra en el apartado de <a href="cuenta.php">cuenta.</a></p>
    <hr class="my-2">
    <p class="lead">
    </p>
</div>

