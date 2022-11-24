<?php include("../template/header.php"); ?>

<?php
//Obtener los valores del formulario por el metodo post y comprobar si ya existen, en caso de no existir asignar los valores.
$txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
$txtTitulo=(isset($_POST['txtTitulo']))?$_POST['txtTitulo']:"";
$txtPrecio=(isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
$txtCategoria=(isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
$txtImagen=(isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";
$accion=(isset($_POST['accion']))?$_POST['accion']:"";

//Conectar a la base de datos
include("../config/basedatos.php");

switch($accion){

    case "Agregar":

    $sentenciaSQL= $conn->prepare("INSERT INTO productos (Titulo, Precio, Categoria, Imagen) VALUES (:Titulo, :Precio, :Categoria, :Imagen);");//Preparar un sentencia SQL
    $sentenciaSQL->bindParam(':Titulo',$txtTitulo); //Obtener los valores de "Título" para poder ser utilizado en la sentencia.
    $sentenciaSQL->bindParam(':Precio',$txtPrecio); //Obtener los valores de "Precio" para poder ser utilizado en la sentencia.
    $sentenciaSQL->bindParam(':Categoria',$txtCategoria); //Obtener los valores de "Categoria" para poder ser utilizado en la sentencia.


    $fecha= new DateTime();
    $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";


    $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

    if($tmpImagen!=""){

        move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);
        
    }

    $sentenciaSQL->bindParam(':Imagen',$nombreArchivo);
    $sentenciaSQL->execute(); //Ejecutar la sentencia preparada con anterioridad.

    header("Location:figuras.php"); //Redireccionar para borrar los datos en los campos
    break;

    case "Modificar":
        
        $sentenciaSQL= $conn->prepare("UPDATE productos SET Titulo=:Titulo, Precio=:Precio, Categoria=:Categoria WHERE id=:id");
        $sentenciaSQL->bindParam(':Titulo',$txtTitulo);
        $sentenciaSQL->bindParam(':Precio',$txtPrecio);
        $sentenciaSQL->bindParam(':Categoria',$txtCategoria); 
        $sentenciaSQL->bindParam(':id',$txtID); //Obtener los valores de "id" para poder ser utilizado como el identificador.
        $sentenciaSQL->execute();


        
        if($txtImagen!=""){

    //Modificar Imagen
            //Verificar si existe la imagen y recupera el nombre de la imagen
            $fecha= new DateTime();

            //Renombrar y obtener nuevos nombres
            $nombreArchivo=($txtImagen!="")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";
            $tmpImagen=$_FILES["txtImagen"]["tmp_name"];

            //Copiar imagen a carpeta img
            move_uploaded_file($tmpImagen, "../../img/".$nombreArchivo);

            //Buscar imagen antigua 
            $sentenciaSQL= $conn->prepare("SELECT Imagen FROM productos WHERE id=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();
            $producto= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            //Borrar Imagen antigua
            if(isset($producto["Imagen"]) &&($producto["Imagen"]!="Imagen.jpg") ){

                if(file_exists("../../img/".$producto["Imagen"])){

                    unlink("../../img/".$producto["Imagen"]);
                }
            }

            //Actualizar a la imagen nueva
            $sentenciaSQL= $conn->prepare("UPDATE productos SET Imagen=:Imagen WHERE id=:id");
            $sentenciaSQL->bindParam(':Imagen',$nombreArchivo);
            $sentenciaSQL->bindParam(':id',$txtID); 
            $sentenciaSQL->execute();
        }
        
        header("Location:figuras.php");
    break;

    case "Cancelar":
        header("Location:figuras.php");
    break;

    case "Seleccionar":
        $sentenciaSQL= $conn->prepare("SELECT * FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

        $txtTitulo= $producto['Titulo'];
        $txtPrecio= $producto['Precio'];
        $txtCategoria= $producto['Categoria'];
        $txtImagen= $producto['Imagen'];
    break;

    case "Borrar":

    //Buscar imagen mediante ID
        $sentenciaSQL= $conn->prepare("SELECT Imagen FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();
        $producto= $sentenciaSQL->fetch(PDO::FETCH_LAZY);

    //Verificar si existe esa imagen y verificar si tiene el nombre de "Imagen.jpg" (Asignado con anterioridad)
        if(isset($producto["Imagen"]) &&($producto["Imagen"]!="Imagen.jpg") ){

            if(file_exists("../../img/".$producto["Imagen"])){

            //Borrar imagen en caso de que exista
                unlink("../../img/".$producto["Imagen"]);
            }
        }

        $sentenciaSQL= $conn->prepare("DELETE FROM productos WHERE id=:id");
        $sentenciaSQL->bindParam(':id',$txtID);
        $sentenciaSQL->execute();

        header("Location:figuras.php");
    break;

}

$sentenciaSQL= $conn->prepare("SELECT * FROM productos");
$sentenciaSQL->execute();
$listaproductos= $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>



<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de la Figura.
        </div>

        <div class="card-body">
            
            <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">
                    <label for="txtID">ID:</label>
                    <input type="text" readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID"  placeholder="ID..." required>
                </div>

                <div class = "form-group">
                    <label for="txtNombre">Título:</label>
                    <input type="text" class="form-control" value="<?php echo $txtTitulo; ?>" name="txtTitulo" id="txtTitulo"  placeholder="Título de la Figura..." required>
                </div>

                <div class = "form-group">
                    <label for="txtPrecio">Precio:</label>
                    <input type="float" class="form-control" value="<?php echo $txtPrecio; ?>" name="txtPrecio" id="txtPrecio"  placeholder="Título de la Figura..." required>
                </div>

                <div class = "form-group">
                    <label for="txtCategoria">Categoria:</label>
                    <input type="text" class="form-control" value="<?php echo $txtCategoria; ?>" name="txtCategoria" id="txtCategoria"  placeholder="Categoria de la Figura..." required>
                </div>

                <div class = "form-group">
                    <label for="txtImagen">Imagen:</label>

                <?php //Bajar la imagen en el formulario ?>
                    <br>

                <?php //Mostrar imagen en el formulario ?>
                    <?php if($txtImagen!=""){ ?>

                        <img class="img-thumbnail rounded" src="../../img/<?php echo $txtImagen; ?>" width="70" alt="" srcset="">

                    <?php } ?>
                    <input type="file" class="form-control" name="txtImagen" id="txtImagen">
                </div>

                <div>
                        <button type="submit" name="accion" <?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-outline-success">Agregar</button>
                        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-outline-warning">Modificar</button>
                        <button type="submit" name="accion" <?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-outline-info">Cancelar</button>
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
                <th>Título</th>
                <th>Precio</th>
                <th>Categoria</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($listaproductos as $figura){?>
            <tr>
                <td><?php echo $figura['id']; ?></td>
                <td><?php echo $figura['Titulo']; ?></td>
                <td><?php echo $figura['Precio']; ?></td>
                <td><?php echo $figura['Categoria']; ?></td>
                <td>
                
                <img class="img-thumbnail rounded" src="../../img/<?php echo $figura['Imagen']; ?>" width="70" alt="">
                
                
            
                </td>

                <td>
                    <form method="post">

                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $figura['id']; ?>" />
                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-outline-primary" />
                        <input type="submit" name="accion" value="Borrar" class="btn btn-outline-danger" />

                    </form>
                </td>

            </tr>
            <?php } ?>
        </tbody>
    </table>

</div>

<?php include("../template/footer.php"); ?>