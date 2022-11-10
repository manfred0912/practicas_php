<?php

include("config.php");

$dbname = "CREATE DATABASE dbescuela;";

if ($conn->query($dbname) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn,"dbescuela");

$sql = "CREATE TABLE IF NOT EXISTS Profesores (
        Codigo int PRIMARY KEY NOT NULL,
        Nombre VARCHAR(30) NOT NULL,
        ApP VARCHAR(30) NOT NULL,
        ApM VARCHAR(30) NOT NULL,
        Grado VARCHAR(30) NOT NULL
        )";

if (mysqli_query($conn, $sql)) {
    echo "Table Profesores created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Materias (
    NRC int(7) PRIMARY KEY NOT NULL,
    Clave VARCHAR(5) NOT NULL,
    Nombre VARCHAR(30) NOT NULL,
    Horario VARCHAR(30) NOT NULL,
    Dia VARCHAR(30) NOT NULL,
    Profesor int NOT NULL,
    foreign key(Profesor) references Profesores(Codigo)
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table Materias created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Log_in(
    Code int(9) PRIMARY KEY NOT NULL,
    Nombre VARCHAR(30) NOT NULL,
    ApP VARCHAR(30) NOT NULL,
    ApM VARCHAR(30) NOT NULL,
    Age int(3) NOT NULL,
    Career VARCHAR(30) NOT NULL,
    Mat1 int(7),
    Mat2 int(7),
    Mat3 int(7),
    Mat4 int(7),
    Mat5 int(7),
    Username VARCHAR(30) NOT NULL,
    Contrasenia VARCHAR(30) NOT NULL,
    foreign key(Mat1) references Materias(NRC),
    foreign key(Mat2) references Materias(NRC),
    foreign key(Mat3) references Materias(NRC),
    foreign key(Mat4) references Materias(NRC),
    foreign key(Mat5) references Materias(NRC)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Log_in created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

header("Location:DML.php");