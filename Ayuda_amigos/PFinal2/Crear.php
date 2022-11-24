<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = mysqli_connect($servername, $username, $password);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$dbname = "CREATE DATABASE tienda;";

if ($conn->query($dbname) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

mysqli_select_db($conn,"tienda");

$sql = "CREATE TABLE IF NOT EXISTS Clientes (
        id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        Correo VARCHAR(255) NOT NULL,
        Nombre VARCHAR(255) NOT NULL,
        ApP VARCHAR(255) NOT NULL,
        ApM VARCHAR(255) NOT NULL,
        Telefono INT(10) NOT NULL,
        Contrasenia VARCHAR(255) NOT NULL,
        id_direccion VARCHAR(255),
        foreign key(id_direccion) references Direcciones(id)
        )";

if (mysqli_query($conn, $sql)) {
    echo "Table Clientes created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Productos (
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Titulo VARCHAR(255) NOT NULL,
    Precio FLOAT NOT NULL,
    Categoria VARCHAR(255) NOT NULL,
    Imagen VARCHAR (1000) NOT NULL
    )";

if (mysqli_query($conn, $sql)) {
    echo "Table Productos created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Direcciones(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_ventas int(10),
    id_customer int(10),
    Direccion VARCHAR(255) NOT NULL,
    CP int(10) NOT NULL,
    Ciudad VARCHAR(255) NOT NULL,
    foreign key(id_ventas) references Ventas(id),
    foreign key(id_customer) references Clientes(id)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Log_in created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Ventas(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_productos int(10),
    id_direccion int(10),
    id_customer int(10),
    id_img int(10),
    foreign key(id_productos) references Productos(id),
    foreign key(id_direccion) references Direcciones(id),
    foreign key(id_customer) references Clientes(id),
    foreign key(id_img) references Imagenes(id)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Log_in created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Imagenes(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_productos int(10),
    Tamaño FLOAT NOT NULL
    nombre VARCHAR(255) NOT NULL,
    Tipo VARCHAR(255) NOT NULL,
    foreign key(id_productos) references Productos(id)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Imagenes created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS Tarjetas(
    id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    id_customer int(10) NOT NULL,
    Numero INT(20) NOT NULL,
    Fecha VARCHAR(255) NOT NULL,
    CVV INT(5) NOT NULL,
    foreign key(id_customer) references Clientes(id)
    )";

if (mysqli_query($conn, $sql)) {
echo "Table Log_in created successfully";
} else {
echo "Error creating table: " . mysqli_error($conn);
}

header("Location:login.html");