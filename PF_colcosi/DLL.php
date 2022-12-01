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
        Titulo VARCHAR(30) NOT NULL,
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
    Correo VARCHAR(500) NOT NULL,
    Contrasenia VARCHAR(60) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table Clientes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Ventas (
    ID_Cliente VARCHAR(255) NOT NULL,
    ID_Producto bigint UNSIGNED UNIQUE NOT NULL,
    Cantidad int NOT NULL,
    Total float NOT NULL,
    constraint foreign key(ID_Cliente) references Clientes(ID)
    constraint foreign key(ID_Producto) references Productos(ID)
    ON UPDATE CASCADE ON DELETE CASCADE

    )";

if (mysqli_query($conn, $sql)) {
    echo "Table ventas created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Carrito(
    ID_sesion VARCHAR(255) NOT NULL,
    ID_Producto bigint UNSIGNED UNIQUE NOT NULL,
    Cantidad int NOT NULL,
    constraint foreign key(ID_Producto) references Productos(ID)
    ON UPDATE CASCADE ON DELETE CASCADE
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Carrito created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

