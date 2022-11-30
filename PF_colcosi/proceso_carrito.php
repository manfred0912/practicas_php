<?php session_start();
include("./administrador/config/bd.php");
include("./template/cabecera.php");
include("./administrador/config/bd.php");

$usr_id = $_SESSION["ID"];

if($_POST){
    $id = implode(array_keys($_POST));
}

if(!isset($_COOKIE[$usr_id])){
    $valores = [
        $id => 1
    ];
    setcookie(
        name: $usr_id,
        value: $valores,
        expires_or_options: time() + 60 * 60 * 24 * 7,
        path: "/",
        domain: "localhost"
    );
} else {
    $valores = [
        $id = $_COOKIE[$usr_id[$id]] + 1,
    ];
    setcookie(
        name: $usr_id,
        value: $valores,
        expires_or_options: time() + 60 * 60 * 24 * 7,
        path: "/",
        domain: "localhost"
    );
}
?>

<?php include("./template/pie.php"); ?>