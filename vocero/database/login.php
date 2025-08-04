<?php
include 'conexion.php';

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

$stmt = $conexion->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows == 1) {
    $usuario = $resultado->fetch_assoc();
    
    // Comparación directa porque la contraseña está guardada sin hash
    if ($contrasena === $usuario['contrasena']) {
        header("Location: ../JSRobot-master/index.html"); // Redirecciona si todo va bien
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "El usuario no existe.";
}
?>
