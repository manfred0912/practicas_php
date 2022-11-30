<?php session_start();
include("./administrador/config/bd.php");
include("./administrador/config/bd.php");

$usr_id = $_SESSION["ID"];

if($_POST){
    $id = implode(array_keys($_POST));
}

if(!isset($_COOKIE[$usr_id[$id]])){
    $valores = [
        $id => 1
    ];
    setcookie( $usr_id[$id], $valores, time() + 60 * 60 * 24 * 7, "/");
} else {
    foreach($_COOKIE[$usr_id] as $key => $value){
        if($key == $id){
            $_COOKIE[$usr_id[$id]] = $_COOKIE[$usr_id[$id]] + 1;
        }
    }
}

var_dump($_COOKIE[$usr_id]);
?>