<?php include("../template/cabecera.php"); 
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$numAncho=(isset($_POST['numAncho']))?$_POST['numAncho']:"";
$numAlto=(isset($_POST['numAlto']))?$_POST['numAlto']:"";
$numGrosor=(isset($_POST['numGrosor']))?$_POST['numGrosor']:"";
$numPrecio=(isset($_POST['numPrecio']))?$_POST['numPrecio']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['action']))?isset($_POST['action']):"";
?>

<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Datos de las colchonetas
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">ID:</label>
                    <input type="text" class="form-control" id="txtID" name="txtID" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Categoria:</label>
                    <input type="text" class="form-control" id="txtCategoria" name="txtCategoria" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Ancho</label>
                    <input type="number" class="form-control" id="numAncho" name="numAncho" placeholder="Password">
                </div>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Alto</label>
            <input type="number" class="form-control" id="numAlto" name="numAlto" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Grosor</label>
        <input type="number" class="form-control" id="numGrosor" name="numGrosor" placeholder="Password">
    </div>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Precio</label>
    <input type="number" class="form-control" id="numPrecio" name="numPrecio" placeholder="Password">
</div>
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Imagen</label>
    <input type="file" class="form-control" id="txtImagen" name="txtImagen" placeholder="Password">
</div>
<div class="btn-group" role="group" aria-label="">
    <button type="button" class="btn btn-success" name="action" value="agregar">Agregar</button>
    <button type="button" class="btn btn-warning" name="action" value="modificar">Modificar</button>
    <button type="button" class="btn btn-info" name="action" value="cancelar">Cancelar</button>
</div>
</form>
</div>
</div>


</div> <br><br>
<div class="col-md-7">
    <table class="table">
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
            <tr>
                <td>2</td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<?php include("../template/pie.php"); ?>