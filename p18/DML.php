<?php
include("config.php");
mysqli_select_db($conn,"dbescuela");

$sql = "INSERT INTO Profesores VALUES
        (12345, 'Juan', 'Perez', 'Lopez', 'Maestria'),
        (11111, 'Francisco', 'Robles', 'Cruz', 'Maestria'),
        (22222, 'Rebeca', 'Rodriguez', 'Padilla', 'Maestria'),
        (33333, 'Arturo', 'Valencia', 'Padilla', 'Maestria'),
        (44444, 'Roberto', 'Solis', 'Franco', 'Maestria');";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sql = "INSERT INTO Materias VALUES
        (4518022, 'CU117', 'POO', '11:00-13:00', 'M-J', 12345),
        (4513844, 'CU180', 'Programación web', '16:00-18:00', 'M-J', 11111),
        (4514466, 'CU224', 'Arquitectura de computadoras', '18:00-20:00', 'M-J', 22222),
        (4517688, 'CU165', 'Seguridad en TI', '16:00-18:00', 'L-I', 33333),
        (4519410, 'CU128', 'Bases de datos', '14:00-16:00', 'L-I', 44444);";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("Location:login.php");