<?php  session_start();
include("template/cabecera.php"); 
include("administrador/config/bd.php");
?>

<div align="center">
    <form method="POST">
        <button type="submit" name="filtro" value="gimnasia" class="btn btn-outline-primary">Gimnasia</button>
        <button type="submit" name="filtro" value="guarderia" class="btn btn-outline-primary">Guarderia</button>
        <button type="submit" name="filtro" value="ET" class="btn btn-outline-primary">Estimulación temprana</button>
        <button type="submit" name="filtro" value="otros" class="btn btn-outline-primary">Otros</button>
        <button type="submit" name="filtro" value="all" class="btn btn-outline-primary">Borrar Filtros</button>
        <br><br>
    </form>
</div>

<?php 
    if(isset($_POST["filtro"])){
        $filtro = $_POST["filtro"];
    } else {
        $filtro = "all";
    }
    
    switch($filtro){

        case "all":

        $sentenciaSQL= $conexion->prepare("SELECT * FROM productos");
        $sentenciaSQL->execute();
        $listaProductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen'] ?>" style="width: 250px; height: 250px;">
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['Titulo'] ?></h4>
        <form method="POST" action="publi.php">
            <input type="hidden" name="<?php echo $producto['ID'] ?>">
            <input type="submit" class="btn btn-primary" value="Ver más">
        </form>
    </div>
</div>
</div>
<?php } ?>

<?php break;

        case "gimnasia":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'gimnasia'");
            $sentenciaSQL->execute();
            $listaProductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen'] ?>" style="width: 250px; height: 250px;">
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['Titulo'] ?></h4>
        <form method="POST" action="publi.php">
            <input type="hidden" name="<?php echo $producto['ID'] ?>">
            <input type="submit" class="btn btn-primary" value="Ver más">
        </form>
    </div>
</div>
</div>
<?php } ?>

<?php break;

        case "guarderia":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'guarderia'");
            $sentenciaSQL->execute();
            $listaProductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen'] ?>" style="width: 250px; height: 250px;">
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['Titulo'] ?></h4>
        <form method="POST" action="publi.php">
            <input type="hidden" name="<?php echo $producto['ID'] ?>">
            <input type="submit" class="btn btn-primary" value="Ver más">
        </form>
    </div>
</div>
</div>
<?php } ?>

<?php break;

        case "ET":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'ET'");
            $sentenciaSQL->execute();
            $listaProductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen'] ?>" style="width: 250px; height: 250px;">
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['Titulo'] ?></h4>
        <form method="POST" action="publi.php">
            <input type="hidden" name="<?php echo $producto['ID'] ?>">
            <input type="submit" class="btn btn-primary" value="Ver más">
        </form>
    </div>
</div>
</div>
<?php } ?>

<?php break;

        case "otros":

            $sentenciaSQL= $conexion->prepare("SELECT * FROM productos WHERE Categoria = 'otros'");
            $sentenciaSQL->execute();
            $listaProductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>

<?php foreach($listaProductos as $producto) { ?>
<div class="col-md-3">
<div class="card">
    <img class="card-img-top" src="./img/<?php echo $producto['Imagen'] ?>" style="width: 250px; height: 250px;">
    <div class="card-body">
        <h4 class="card-title"><?php echo $producto['Titulo'] ?></h4>
        <form method="POST" action="publi.php">
            <input type="hidden" name="<?php echo $producto['ID'] ?>">
            <input type="submit" class="btn btn-primary" value="Ver más">
        </form>
    </div>
</div>
</div>
<?php } ?>

<?php break; 
    }
?>

<?php include("template/pie.php"); ?>