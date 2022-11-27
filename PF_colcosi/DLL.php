<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD);

if (!$conn) {
 die("Connection failed: " . mysqli_connect_error());
}

$dbname = "CREATE DATABASE colcosi;";

if ($conn->query($dbname) == TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn,"colcosi");

$sql = "CREATE TABLE IF NOT EXISTS Productos (
        ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
        Categoria VARCHAR(30) NOT NULL,
        Ancho float NOT NULL,
        Alto float NOT NULL,
        Grosor float NOT NULL,
        Imagen VARCHAR(1000),
        Precio float NOT NULL
        )";

if (mysqli_query($conn, $sql)) {
    echo "Table Productos created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Clientes (
    ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    Nombre VARCHAR(30) NOT NULL,
    ApP VARCHAR(30) NOT NULL,
    ApM VARCHAR(30) NOT NULL,
    Correo VARCHAR(50) NOT NULL,
    Contrasenia VARCHAR(30) NOT NULL,
    Telefono int NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table Clientes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Ventas (
    ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ID_Prod1 int NOT NULL,
    ID_Prod2 int NOT NULL,
    ID_Prod3 int NOT NULL,
    ID_Prod4 int NOT NULL,
    ID_Prod5 int NOT NULL,
    ID_Prod6 int NOT NULL,
    ID_Clientes int NOT NULL,
    ApM VARCHAR(30) NOT NULL,
    Correo VARCHAR(50) NOT NULL,
    Contrasenia VARCHAR(30) NOT NULL,
    Telefono int NOT NULL,
    Total float NOT NULL,
    constraint foreign key(ID_Prod1) references Productos(ID),
    constraint foreign key(ID_Prod2) references Productos(ID),
    constraint foreign key(ID_Prod3) references Productos(ID),
    constraint foreign key(ID_Prod4) references Productos(ID),
    constraint foreign key(ID_Prod5) references Productos(ID),
    constraint foreign key(ID_Prod6) references Productos(ID)
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table ventas created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Direcciones(
    ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ID_Cliente int NOT NULL,
    Direccion VARCHAR(50) NOT NULL,
    CP int NOT NULL,
    Ciudad VARCHAR(50) NOT NULL,
    constraint foreign key(ID_Cliente) references Clientes(ID)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Direcciones created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Tarjetas(
    ID int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    ID_Cliente int NOT NULL,
    Num VARCHAR(20) NOT NULL,
    CP int NOT NULL,
    Ciudad VARCHAR(50) NOT NULL,
    constraint foreign key(ID_Cliente) references Clientes(ID)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Tarjetas created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}
