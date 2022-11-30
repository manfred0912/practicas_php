<?php 
include("../template/cabecera.php");
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtTitulo = (isset($_POST['txtTitulo'])) ? $_POST['txtTitulo'] : "";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$numAncho = (isset($_POST['numAncho'])) ? $_POST['numAncho'] : "";
$numAlto = (isset($_POST['numAlto'])) ? $_POST['numAlto'] : "";
$numGrosor = (isset($_POST['numGrosor'])) ? $_POST['numGrosor'] : "";
$numPrecio = (isset($_POST['numPrecio'])) ? $_POST['numPrecio'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['action'])) ? ($_POST['action']) : "";

$txtCategoria = strtolower($txtCategoria);
$txtCategoria = preg_replace('/\s+/', '', $txtCategoria); 

include("../config/bd.php");

switch($accion){
    case "agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO Productos (Titulo,Categoria,Ancho,Alto,Grosor,Imagen,Precio) VALUES (:titulo,:categoria,:ancho,:alto,:grosor,:imagen,:precio);");
        $sentenciaSQL->bindParam(':titulo',$txtTitulo);
        $sentenciaSQL->bindParam(':categoria',$txtCategoria);
        $sentenciaSQL->bindParam(':ancho',$numAncho);
        $sentenciaSQL->bindParam(':alto',$numAlto);
        $sentenciaSQL->bindParam(':grosor',$numGrosor);
        
        $fecha= new DateTime();
        $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES['txtImagen']['name']:"imagen.jpg";

        $tmpImagen=$_FILES['txtImagen']['tmp_name'];

        if($tmpImagen!=""){
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);
        }

        $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
        $sentenciaSQL->bindParam(':precio',$numPrecio); 
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;
    
    case "modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Titulo=:titulo WHERE ID=:ID");
        $sentenciaSQL->bindParam(':titulo',$txtTitulo);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Categoria=:categoria WHERE ID=:ID");
        $sentenciaSQL->bindParam(':categoria',$txtCategoria);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Ancho=:ancho WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ancho',$numAncho);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Alto=:alto WHERE ID=:ID");
        $sentenciaSQL->bindParam(':alto',$numAlto);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
        
        $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Grosor=:grosor WHERE ID=:ID");
        $sentenciaSQL->bindParam(':grosor',$numGrosor);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Precio=:precio WHERE ID=:ID");
        $sentenciaSQL->bindParam(':precio',$numPrecio);
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();

        if($txtImagen!=""){
            $fecha= new DateTime();
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES['txtImagen']['name']:"imagen.jpg";

            $tmpImagen=$_FILES['txtImagen']['tmp_name'];
            move_uploaded_file($tmpImagen,"../../img/".$nombreArchivo);

            $sentenciaSQL = $conexion->prepare("SELECT Imagen FROM Productos WHERE ID=:ID");
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();
            $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

            if(isset($producto["Imagen"]) &&($producto["Imagen"]!="imagen.jpg")){
                if(file_exists("../../img/".$producto["Imagen"])){
                unlink("../../img/".$producto["Imagen"]);
                }
            }

            $sentenciaSQL = $conexion->prepare("UPDATE Productos SET Imagen=:imagen WHERE ID=:ID");
            $sentenciaSQL->bindParam(':imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':ID',$txtID);
            $sentenciaSQL->execute();
        }
        header("Location:productos.php");
        break;

    case "cancelar":
        header("Location:productos.php");
        break;

    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM Productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtTitulo=$producto['Titulo'];
        $txtCategoria=$producto['Categoria'];
        $numAncho=$producto['Ancho'];
        $numAlto=$producto['Alto'];
        $numGrosor=$producto['Grosor'];
        $txtImagen=$producto['Imagen'];
        $numPrecio=$producto['Precio'];
        break;

    case "Borrar":

        $sentenciaSQL = $conexion->prepare("SELECT Imagen FROM Productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
        $producto=$sentenciaSQL->fetch(PDO::FETCH_LAZY);

        if(isset($producto["Imagen"]) &&($producto["Imagen"]!="imagen.jpg")){
            if(file_exists("../../img/".$producto["Imagen"])){
                unlink("../../img/".$producto["Imagen"]);
            }
        }

        $sentenciaSQL = $conexion->prepare("DELETE FROM Productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
        header("Location:productos.php");
        break;

    
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM Productos");
$sentenciaSQL->execute();
$listaProductos=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);



?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de las colchonetas
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
            <div class = "form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID..." required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Titulo:</label>
                    <input type="text" class="form-control" required name="txtTitulo" id="txtTitulo" value="<?php echo $txtTitulo; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Categoria:</label>
                    <input type="text" class="form-control" required name="txtCategoria" id="txtCategoria" value="<?php echo $txtCategoria; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ancho</label>
                    <input type="number" class="form-control" required id="numAncho" name="numAncho" step="0.01" value="<?php echo $numAncho; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alto</label>
                    <input type="number" class="form-control" required id="numAlto" name="numAlto" step="0.01" value="<?php echo $numAlto; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Grosor</label>
                    <input type="number" class="form-control" required id="numGrosor" name="numGrosor" step="0.01" value="<?php echo $numGrosor; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <input type="number" class="form-control" required id="numPrecio" name="numPrecio" step="0.01" value="<?php echo $numPrecio; ?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Imagen</label>

                    <br>

                    <?php if($txtImagen!=""){ ?>
                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen?>" width="50" alt="">
                    <?php } ?>

                    <input type="file" class="form-control" id="txtImagen" name="txtImagen">
                </div>
                <div class="btn-group" role="group" aria-label="">
                        <button type="submit" class="btn btn-success" name="action" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="agregar">Agregar</button>
                        <button type="submit" class="btn btn-warning" name="action" <?php echo ($accion!=="Seleccionar")?"disabled":""; ?> value="modificar">Modificar</button>
                        <button type="submit" class="btn btn-info" name="action" <?php echo ($accion!=="Seleccionar")?"disabled":""; ?> value="cancelar">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Ancho</th>
                <th>Alto</th>
                <th>Grosor</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listaProductos as $producto) { ?>
            <tr>
                <td><?php echo $producto['ID']?></td>
                <td><?php echo $producto['Titulo']?></td>
                <td><?php echo $producto['Categoria']?></td>
                <td><?php echo $producto['Ancho']?></td>
                <td><?php echo $producto['Alto']?></td>
                <td><?php echo $producto['Grosor']?></td>
                <td>
                    <img class="img-thumbnail rounded" src="../../img/<?php echo $producto['Imagen']?>" width="50" alt="">
                    
                </td>
                <td><?php echo $producto['Precio']?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="txtID" value="<?php echo $producto['ID']; ?>" />
                        <input type="submit" name="action" value="Seleccionar" class="btn btn-primary" />
                        <input type="submit" name="action" value="Borrar" class="btn btn-danger" />
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php"); ?>