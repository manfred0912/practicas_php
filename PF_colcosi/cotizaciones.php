<?php session_start();
include("./template/cabecera.php");

if($_POST){
    $mensaje = '<script> alert("La información ha sido procesada, te contactaremos a la brevedad") </script>';
}

?>

    
<div class="jumbotron">
    <h1 class="display-3">Cotizaciones</h1>
    <p class="lead">Por favor llena los siguientes campos y te contactaremos a la brevedad</p>
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Correo</small>
    </div>
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Ancho</small>
    </div>
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Alto</small>
    </div>
    <div class="form-group">
        <label for=""></label>
        <input type="text" class="form-control" name="" id="" aria-describedby="helpId" placeholder="">
        <small id="helpId" class="form-text text-muted">Grosor</small>
    </div>
    <hr class="my-2">
    <p class="lead">
    <form method="POST">
        <input type="submit" class="btn btn-primary btn-lg" role="button" name="1" value="Enviar"></input>
    </form>
    </p>
</div>

<?php include("template/pie.php"); 
if(isset($mensaje)){
    echo $mensaje;
    exit;
}

if(isset($mensaje)){
    header("Location:cotizaciones.php");
    exit;
}
?>