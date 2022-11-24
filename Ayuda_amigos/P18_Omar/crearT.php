<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Escuela";


$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE Log_in (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
NIP INT(9) NOT NULL,
Nombre VARCHAR(30) NOT NULL,
ApP VARCHAR(30) NOT NULL,
ApM VARCHAR(30) NOT NULL,
Edad INT(5) NOT NULL,
Carrera VARCHAR(30) NOT NULL,
Contrasena VARCHAR(30) NOT NULL
)";

if (mysqli_query($conn, $sql)) {
    echo "Table Login created successfully";
} else {
    echo "Error creating table Log_in " . mysqli_error($conn);
}

mysqli_close($conn);

?>

<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE Profesores (
    Codigo int(7) PRIMARY KEY NOT NULL,
    Nombre VARCHAR(30) NOT NULL,
    ApP VARCHAR(30) NOT NULL,
    ApM VARCHAR(30) NOT NULL,
    Grado VARCHAR(30) NOT NULL
    )";


if (mysqli_query($conn, $sql)) {
    echo "<br>Table Profesores created successfully";
} else {
    echo "<br>Error creating table Profesores: " . mysqli_error($conn);
}

$sql = "INSERT INTO Profesores (Codigo, Nombre, ApP, ApM, Grado)
VALUES ('227690874', 'Juan', 'Perez', 'Ramirez', 'Segundo')";


if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO Profesores (Codigo, Nombre, ApP, ApM, Grado)
VALUES ('908796575', 'Maria', 'Ramirez', 'Ramirez', 'Primero')";

if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO Profesores (Codigo, Nombre, ApP, ApM, Grado)
VALUES ('132908764', 'Juana', 'La', 'Cuabana', 'Tercero')";

if (mysqli_query($conn, $sql)) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>


<?php
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "CREATE TABLE Materia (
    NRC int(7) PRIMARY KEY NOT NULL,
    Clave VARCHAR(5) NOT NULL,
    Nombre VARCHAR(30) NOT NULL,
    Horario VARCHAR(30) NOT NULL,
    Dia VARCHAR(30) NOT NULL,
    Nombre_Profesor VARCHAR(30) NOT NULL,
    FOREIGN KEY (Nombre_Profesor) REFERENCES Profesores(Nombre)
    )";

if (mysqli_query($conn, $sql)) {
    echo "<br>Table Materia created successfully";
} else {
    echo "<br>Error creating table Materia: " . mysqli_error($conn);
}

mysqli_close($conn);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<li><h3><a href="index.html">Regresar</a></h3></li>
</body>
</html>