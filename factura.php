<!-- factura.php -->

<?php



?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>
</head>
<body>
    <h1>Factura de Compra</h1>

    <!-- Muestra aquí la información de la factura, por ejemplo: -->
    <p>Subtotal: $<?php echo $detallesCompra['subtotal']; ?></p>
    <p>IVA: $<?php echo $detallesCompra['iva']; ?></p>
    <p>Total: $<?php echo $detallesCompra['total']; ?></p>

    <!-- Agrega más detalles de la factura según tus necesidades -->

    <!-- Puedes incluir un botón para imprimir la factura -->
    <button onclick="window.print()">Imprimir Factura</button>

    <!-- También puedes incluir un botón para regresar a la página principal o agradecer al cliente -->
    <a href="index.php">Volver a la Tienda</a>

    <!-- Agrega aquí cualquier otro contenido de la factura -->
</body>
</html>
