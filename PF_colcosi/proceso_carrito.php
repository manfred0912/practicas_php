<?php session_start();
include("./administrador/config/bd.php");

$cant=$_POST["cantidad"];

$try = implode(array_keys($_POST));
if(strlen($try) <= 9){
    $id = substr($try, 0, 1);
} else {
    $id = substr($try, 0, 2);
}

// intento #1 de poner cookies (no jalo :c)

// if(!isset($_COOKIE[$_SESSION["ID"]])){
//     $valores = [
//         $id => 1
//     ];
//     setcookie( $_SESSION["ID"], json_encode($valores), time() + 60 * 60 * 24 * 7, "/");
//     echo "jalas o no 1";
// } else {
//     echo "o hasta aqui?";
//     $valores = json_decode($_COOKIE[$_SESSION["ID"]], true);
//     if(is_array($valores)){
//         foreach($valores as $key => $value){
//             if($key == $id){
//                 $value += 1;
//                 echo "aqui?";
//             } else {
//                 $valores += [$id => 1];
//                 echo "o aqui?";
//             }
//             setcookie($_SESSION["ID"], json_encode($valores), time() + 60 * 60 * 24 * 7, "/");
//         }
//         echo "jalas o no 2";
//     }
// }

// var_dump($_COOKIE);
// if(json_encode($_COOKIE['ID'])!=NULL){
//     echo json_encode($_COOKIE[$_SESSION['ID']]);
// } else {
//     echo "ptm no jala";
// }

$sentenciaSQL = $conexion->prepare("SELECT * FROM Carrito WHERE ID_sesion=:id_sesion;");
$sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
$sentenciaSQL->execute();
$query=$sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

if($query!=NULL){
    foreach($query as $carrito){
        if($carrito['ID_Producto'] == $id){
            $sentenciaSQL = $conexion->prepare("UPDATE Carrito SET Cantidad=:cantidad WHERE ID_Producto=:id_producto");
            $sentenciaSQL->bindParam(':id_producto',$id);
            $sentenciaSQL->bindParam(':cantidad',$cant);
            $sentenciaSQL->execute();

        } else {
            $sentenciaSQL = $conexion->prepare("INSERT INTO Carrito (ID_sesion, ID_Producto, Cantidad) VALUES (:id_sesion,:id_producto,:cantidad)");
            $sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
            $sentenciaSQL->bindParam(':id_producto',$id);
            $sentenciaSQL->bindParam(':cantidad',$cant);
            $sentenciaSQL->execute();
        }
    }
} else {
    $sentenciaSQL = $conexion->prepare("INSERT INTO Carrito (ID_sesion, ID_Producto, Cantidad) VALUES (:id_sesion,:id_producto,:cantidad)");
    $sentenciaSQL->bindParam(':id_sesion',$_SESSION['ID']);
    $sentenciaSQL->bindParam(':id_producto',$id);
    $sentenciaSQL->bindParam(':cantidad',$cant);
    $sentenciaSQL->execute();
    var_dump($query);
}

header("Location:carrito.php");
?>

