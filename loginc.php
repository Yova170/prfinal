<?php
session_start();
require 'db.php';

$user = $_POST['usuario'];
$pass = $_POST['contrasena'];

// Verificar si es un administrador
$validarAdmin = mysqli_query($conn, "SELECT * FROM `administradores` WHERE usuario='$user' AND contrasena='$pass'");

// Verificar si es un cliente
$validarCliente = mysqli_query($conn, "SELECT * FROM `clientes` WHERE usuario='$user' AND contrasena='$pass'");

if (mysqli_num_rows($validarAdmin) > 0) {
    $row = mysqli_fetch_assoc($validarAdmin);
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellido'] = $row['apellido'];
    $_SESSION['usuario'] = $user;
    header("location: admin.php");
} elseif (mysqli_num_rows($validarCliente) > 0) {
    $row = mysqli_fetch_assoc($validarCliente);
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['apellido'] = $row['apellido'];
    $_SESSION['usuario'] = $user;
    header("location: index.php");
} else {
    echo '
        <script>
            alert("Usuario no encontrado. Verifique los datos introducidos.");
            window.location = "login.php";
        </script>
    ';
    exit();
}
?>
