<?php 
include("../template/cabecera.php");
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtCategoria = (isset($_POST['txtCategoria'])) ? $_POST['txtCategoria'] : "";
$numAncho = (isset($_POST['numAncho'])) ? $_POST['numAncho'] : "";
$numAlto = (isset($_POST['numAlto'])) ? $_POST['numAlto'] : "";
$numGrosor = (isset($_POST['numGrosor'])) ? $_POST['numGrosor'] : "";
$numPrecio = (isset($_POST['numPrecio'])) ? $_POST['numPrecio'] : "";
$txtImagen = (isset($_FILES['txtImagen']['name'])) ? $_FILES['txtImagen']['name'] : "";
$accion = (isset($_POST['action'])) ? ($_POST['action']) : "";

include("../config/bd.php");

switch($accion){
    case "agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO Productos (Categoria,Ancho,Alto,Grosor,Imagen,Precio) VALUES (:categoria,:ancho,:alto,:grosor,:imagen,:precio);");
        $sentenciaSQL->bindParam(':categoria',$txtCategoria);
        $sentenciaSQL->bindParam(':ancho',$numAncho);
        $sentenciaSQL->bindParam(':alto',$numAlto);
        $sentenciaSQL->bindParam(':grosor',$numGrosor);
        $sentenciaSQL->bindParam(':imagen',$txtImagen);
        $sentenciaSQL->bindParam(':precio',$numPrecio); 
        $sentenciaSQL->execute();
        break;
    
    case "modificar":
        echo "presionado boton modificar";
        break;

    case "cancelar":
        echo "presionado boton cancelar";
        break;

    case "Seleccionar":
        echo "presionado boton seec";
        break;

    case "Borrar":
        $sentenciaSQL = $conexion->prepare("DELETE * FROM Productos WHERE ID=:ID");
        $sentenciaSQL->bindParam(':ID',$txtID);
        $sentenciaSQL->execute();
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
                    <label for="exampleInputEmail1">Categoria:</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="cat" id="cat" value="gimnasia" checked>
                        Gimnasia
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="cat" id="cat" value="guarderia">
                        Guarderia
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="cat" id="cat" value="estimulacion">
                        Estimulación temprana
                      </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="cat" id="cat" value="otros">
                        Otros
                      </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ancho</label>
                    <input type="number" class="form-control" id="numAncho" name="numAncho">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Alto</label>
                    <input type="number" class="form-control" id="numAlto" name="numAlto">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Grosor</label>
                    <input type="number" class="form-control" id="numGrosor" name="numGrosor">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Precio</label>
                    <input type="number" class="form-control" id="numPrecio" name="numPrecio">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Imagen</label>
                    <input type="file" class="form-control" id="txtImagen" name="txtImagen">
                </div>
                <div class="btn-group" role="group" aria-label="">
                        <button type="submit" class="btn btn-success" name="action" value="agregar">Agregar</button>
                        <button type="submit" class="btn btn-warning" name="action" value="modificar">Modificar</button>
                        <button type="submit" class="btn btn-info" name="action" value="cancelar">Cancelar</button>
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
                <td><?php echo $producto['CategoriaD']?></td>
                <td><?php echo $producto['Acho']?></td>
                <td><?php echo $producto['Alto']?></td>
                <td><?php echo $producto['Grosor']?></td>
                <td><?php echo $producto['Imagen']?></td>
                <td><?php echo $producto['Precio']?></td>
                <td>
                    <form method="POST">
                        <input type="hidden" name="txtID" value="<?php echo $producto['ID']; ?>">
                        <input type="submit" name="action" value="Seleccionar" class="btn btn-primary">
                        <input type="submit" name="action" value="Borrar" class="btn btn-danger">
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php"); ?>