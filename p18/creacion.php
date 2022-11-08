<?php

include("config.php");

$dbname = "CREATE DATABASE dbescuela;";

if ($conn->query($dbname) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn,"dbescuela");

$sql = "CREATE TABLE IF NOT EXISTS Log_in(
        Code int(9) PRIMARY KEY NOT NULL,
        Nombre VARCHAR(30) NOT NULL,
        ApP VARCHAR(30) NOT NULL,
        ApM VARCHAR(30) NOT NULL,
        Age int(3) NOT NULL,
        Career VARCHAR(30) NOT NULL,
        Username VARCHAR(30) NOT NULL,
        Contrasenia VARCHAR(30) NOT NULL
        )";

if (mysqli_query($conn, $sql)) {
    echo "Table Log_in created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$r1 = $conn->query("SELECT * FROM Log_in");
if ($r1->num_rows == 0) {
    $sql = "INSERT INTO Log_in (Code, Nombre, ApP, ApM, Age, Career, Username, Contrasenia)
        VALUES ('123456789','Admin','Admin','Admin','0','Admin','Admin','Admin')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

$prof = "CREATE TABLE IF NOT EXISTS Profesores (
        Codigo int PRIMARY KEY NOT NULL,
        Nombre VARCHAR(30) NOT NULL,
        ApP VARCHAR(30) NOT NULL,
        ApM VARCHAR(30) NOT NULL,
        Grado VARCHAR(30) NOT NULL
        )";

if (mysqli_query($conn, $prof)) {
    echo "Table Profesores created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$mat = "CREATE TABLE IF NOT EXISTS Materias (
    NRC int(7) PRIMARY KEY NOT NULL,
    Clave VARCHAR(5) NOT NULL,
    Nombre VARCHAR(30) NOT NULL,
    Horario VARCHAR(30) NOT NULL,
    Dia VARCHAR(30) NOT NULL,
    Profesor int NOT NULL,
    foreign key(Profesor) references Profesores(Codigo)
    )";

if (mysqli_query($conn, $mat)) {
    echo "Table Materias created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$r2 = $conn->query("SELECT * FROM Materias");
if ($r1->num_rows == 0) {
    $sql = "INSERT INTO Login (NRC, Clave, Nombre, Horario, Dia, Profesor)
        VALUES ('98076','I8264','Matematicas','10:00 - 11:50','L y I','Irma')";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully"; //para eliminar el racismo debemos matar a los negros. Yo primis uwu
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

header("Location:login.php");