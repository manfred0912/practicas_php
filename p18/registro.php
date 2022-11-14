<?php session_start();
include("config.php");
mysqli_select_db($conn, "dbescuela");
$sql = "SELECT * FROM Materias";
$result = mysqli_query($conn, $sql);
if(!isset($texto)){
    $texto = " ";
}
if(!isset($materias)){
    $materias = array();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de materias</title>
    <style>
        * {
            box-sizing: border-box;
        }

        html {
            font-size: 62.5%;
        }

        .clase {
            padding: 1rem;
            height: 80rem;
            background-color: <?php echo $_SESSION["color"]; ?>;
            font-size: 2rem;
            display: flex;
        }

        .reg {
            margin-left: 2rem;
            padding: 5rem;
            border: 0.3rem solid;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="clase">
        <div>
            <h1><?php echo "Materias disponibles: "; ?></h1><br>
            <?php if (mysqli_num_rows($result) > 0) { ?>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                    <?php $cod = $row["Profesor"]; ?>
                    <?php $sql = "SELECT Nombre, ApM, ApP FROM Profesores WHERE Codigo = '$cod';"; ?>
                    <?php $res = mysqli_query($conn, $sql); ?>
                    <?php echo "NRC: " . $row["NRC"] . "<br>Nombre: " . $row["Nombre"] . "<br>Horario: " . $row["Dia"] . " " . $row["Horario"] . "<br>Profesor: "; ?>
                    <?php if (mysqli_num_rows($res) > 0) { ?>
                        <?php while ($r = mysqli_fetch_assoc($res)) { ?>
                            <?php echo $r["Nombre"] . " " . $r["ApM"] . " " . $r["ApP"] . "<br><br>"; ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="reg">
            <h1>Materia a registrar</h1>
            <form action="./registro.php" method=" POST">
                <hr>
                <input type="radio" name="op" value="1">Programación web<br>
                <input type="radio" name="op" value="2">Arquitectura de computadoras<br>
                <input type="radio" name="op" value="3">Seguridad en TI<br>
                <input type="radio" name="op" value="4">POO<br>
                <input type="radio" name="op" value="5">Bases de datos<br>
                <input type="submit" value="Registrar">
                <hr>
            </form><br><br>
            <h2><?php echo $texto; ?></h2><br>
            <h2><?php echo $_SESSION["materias"]; ?></h2>
        </div>
    </div>
    <?php
    // function campo($valor) {
    //     $DB_SERVER = "localhost";
    //     $DB_USERNAME = "root";
    //     $DB_PASSWORD = "";
    //     $conn = mysqli_connect($DB_SERVER, $DB_USERNAME, $DB_PASSWORD);

    //     if (!$conn) {
    //     die("Connection failed: " . mysqli_connect_error());
    //     }
    //     mysqli_select_db($conn, "dbescuela");

    //     $usr = $_SESSION["username"];
    //     $sql = "SELECT Mat1, Mat2, Mat3, Mat4, Mat5 FROM Log_in WHERE Username = '$usr';";
    //     $result = mysqli_query($conn, $sql);
    //     if (mysqli_num_rows($result) > 0) {
    //         while ($row = mysqli_fetch_assoc($result)) {
    //             if ($row["Mat1"] == NULL) {
    //                 $insert = "INSERT INTO Log_in (Mat1) VALUES ('$valor') WHERE Username = '$usr';";

    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "New record created successfully";
    //                 } else {
    //                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //                 }
    //             } else if ($row["Mat2"] == NULL) {
    //                 $insert = "INSERT INTO Log_in (Mat2) VALUES ('$valor') WHERE Username = '$usr'";

    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "New record created successfully";
    //                 } else {
    //                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //                 }
    //             } else if ($row["Mat3"] == NULL) {
    //                 $insert = "INSERT INTO Log_in (Mat3) VALUES ('$valor') WHERE Username = '$usr'";

    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "New record created successfully";
    //                 } else {
    //                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //                 }
    //             } else if ($row["Mat4"] == NULL) {
    //                 $insert = "INSERT INTO Log_in (Mat4) VALUES ('$valor') WHERE Username = '$usr'";

    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "New record created successfully";
    //                 } else {
    //                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //                 }
    //             } else if ($row["Mat5"] == NULL) {
    //                 $insert = "INSERT INTO Log_in (Mat5) VALUES ('$valor') WHERE Username = '$usr'";

    //                 if (mysqli_query($conn, $insert)) {
    //                     echo "New record created successfully";
    //                 } else {
    //                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    //                 }
    //             } else {
    //                 echo "Ya no puedes registrar mas materias";
    //             }
    //         }
    //     }
    // }
    $materias = array();
    if(isset($_POST["op"])){
        $op = $_POST["op"];
        switch ($op) {
            case '1':
                $valor = 4518022;
                if(!in_array($valor, $materias)){
                    if(count($materias) < 5){
                        array_push($materias, $valor);
                        $texto = "Registro completado!";
                    } else {
                        $texto = "No se pueden registrar mas materias!";
                    }
                } else {
                    $texto = "La materia ya esta registrada, prueba con otra";
                }
                break;
    
            case '2':
                $valor = 4513844;
                if(!in_array($valor, $materias)){
                    if(count($materias) < 5){
                        array_push($materias, $valor);
                        $texto = "Registro completado!";
                    } else {
                        $texto = "No se pueden registrar mas materias!";
                    }
                } else {
                    $texto = "La materia ya esta registrada, prueba con otra";
                }
                break;
    
            case '3':
                $valor = 4514466;
                if(!in_array($valor, $materias)){
                    if(count($materias) < 5){
                        array_push($materias, $valor);
                        $texto = "Registro completado!";
                    } else {
                        $texto = "No se pueden registrar mas materias!";
                    }
                } else {
                    $texto = "La materia ya esta registrada, prueba con otra";
                }
                break;
    
            case '4':
                $valor = 4517688;
                if(!in_array($valor, $materias)){
                    if(count($materias) < 5){
                        array_push($materias, $valor);
                        $texto = "Registro completado!";
                    } else {
                        $texto = "No se pueden registrar mas materias!";
                    }
                } else {
                    $texto = "La materia ya esta registrada, prueba con otra";
                }
                break;
    
            case '5':
                $valor = 4519410;
                if(!in_array($valor, $materias)){
                    if(count($materias) < 5){
                        array_push($materias, $valor);
                        $texto = "Registro completado!";
                    } else {
                        $texto = "No se pueden registrar mas materias!";
                    }
                } else {
                    $texto = "La materia ya esta registrada, prueba con otra";
                }
                break;
        }
    }
    $_SESSION["materias"] = $materias;
    ?>
</body>

</html>