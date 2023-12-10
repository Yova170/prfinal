<?php
// Este script puede utilizarse para realizar acciones adicionales después de procesar el pago,
// como almacenar la transacción en la base de datos, enviar un recibo por correo electrónico, etc.

// Recibir datos del formulario de pago
$subTotal = $_POST['subtotal'];
$iva = $_POST['iva'];
$total = $_POST['total'];

// Puedes realizar acciones adicionales aquí, como almacenar en la base de datos, enviar correos, etc.

// En este ejemplo, simplemente devolvemos una respuesta al cliente.
$response = array(
    'status' => 'success',
    'message' => 'Pago procesado con éxito.',
    'subtotal' => $subTotal,
    'iva' => $iva,
    'total' => $total
);

echo json_encode($response);
?>
