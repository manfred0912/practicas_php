<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");
include("./administrador/config/bd.php");

?>

<div class="jumbotron">
    <h1 class="display-3">Jumbo heading</h1>
    <p class="lead">Jumbo helper text</p>
    <hr class="my-2">
    <p>More info</p>
    <p class="lead">
        <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
    </p>
</div>

<?php include("./template/pie.php"); ?>