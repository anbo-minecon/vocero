<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'conexion.php';

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$edad = $_POST['edad'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$ficha = $_POST['ficha'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$contrasena = $_POST['contrasena'];

// Preparar consulta
$stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellido, edad, celular, email, ficha, fecha_nacimiento, contrasena) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

$stmt->bind_param("ssisssss", $nombre, $apellido, $edad, $celular, $email, $ficha, $fecha_nacimiento, $contrasena);

if ($stmt->execute()) {
    header("Location: ../inicio.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
}
?>
