<?php
require '../../db.php';

// Consultar el valor del IVA desde la tabla de configuración
$sql = "SELECT valor_iva FROM configuracion WHERE id_configuracion = 1";
$result = mysqli_query($conn, $sql);


if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $valorIVA = $row['valor_iva'];
    
    // Devolver el valor del IVA como respuesta JSON
    header('Content-Type: application/json');
    echo json_encode(['valor_iva' => $valorIVA]);
} else {
    // Manejar el error si no se encuentra el valor del IVA
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Error al obtener el valor del IVA desde la base de datos']);
}

// Cierra la conexión a la base de datos
mysqli_close($conn);
?>
