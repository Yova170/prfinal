<?php

require 'db.php';

// Obtiene los datos del formulario

$usuario = $_POST['usuario'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$cell = $_POST['cell'];

// Inserta los datos en la base de datos
$sql = "INSERT INTO `clientes` (`cod_usuario`, `usuario`, `correo`, `contrasena`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES (NULL, '$usuario', '$correo', '$pass', '$nombre', '$apellido', '$direccion', '$cell');";
$result = mysqli_query($conn, $sql);


echo $phone;
if($result){
    echo'<script>
    alert("Usuario Registrado con exito");
    window.location = "index.php";
</script>';
} else {
   echo'<script>
   alert("Error al crear usuario");
   window.location = "newacc.php";
</script>';
}
?>