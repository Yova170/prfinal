<?php
    require 'main/ccs/head.php';
    require 'db.php';

    if (!isset($_SESSION)) {
        session_start();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $productoKey = $_POST['producto_key'];
        
        if (isset($_SESSION['carrito'][$productoKey])) {
            unset($_SESSION['carrito'][$productoKey]);
        } else {
            $idProducto = $_POST['id_producto'];
            $nombreProducto = $_POST['nombre_producto'];
            $precioProducto = $_POST['precio_producto'];
    
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            $_SESSION['carrito'][] = [
                'id' => $idProducto,
                'nombre' => $nombreProducto,
                'precio' => $precioProducto,
                'cantidad' => 1 
            ];
    
            header("Location: main/vista/vista.php?id_producto=$idProducto");
            exit;
        }
    } 

    // Realiza la solicitud AJAX de forma asíncrona
    $ivaResponse = ''; // Inicializa la variable
    $ivaUrl = '../config/obtener_iva.php';
    $ch = curl_init($ivaUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ivaResponse = curl_exec($ch);
    curl_close($ch);

    // Maneja la respuesta JSON
    $ivaData = json_decode($ivaResponse, true);
    

 // Maneja la respuesta JSON
$ivaData = json_decode($ivaResponse, true);

// Verifica si 'valor_iva' está presente y es numérico
$iva = isset($ivaData['valor_iva']) && is_numeric($ivaData['valor_iva']) ? floatval($ivaData['valor_iva']) : 7.00;

// Calcula subtotal, iva y total
$subtotal = 0;
$total = 0;

// Calcula el IVA y el total
if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $producto) {
        $subtotal += floatval($producto['precio']);

    }

    // Verifica que $iva sea un número antes de realizar la operación
    if (is_numeric($iva)) {
        $iva = floatval($iva); // Convierte $iva a float si no lo es
        $total = $subtotal + $iva;
    } else {
        // Manejo de error: Puedes asignar un valor predeterminado o mostrar un mensaje de error.
        $iva = 0;
        $total = $subtotal;
    }
}



    // Almacena los detalles de la compra en un array asociativo
    $detallesCompra = array(
        'subtotal' => $subtotal,
        'iva' => $iva,
        'total' => $total
    );
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Scripts de Bootstrap y dependencias (jQuery y Popper.js) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"/>

    <link rel="stylesheet" href="main/ccs/cart.css">
    <!-- Agrega la referencia a tu archivo payment.js -->
    <script src="main/js/payment.js"></script>
    <!-- Agrega la referencia a tu archivo jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<?php include "main/html/superiorBar.php"; ?>


    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card">
                        <div class="card-body p-4">
                            <div class="row">
                            <div class="col-lg-7">
                                    <h5 class="mb-3"><a href="index.php" class="text-body"><i
                                                class="fas fa-long-arrow-alt-left me-2"></i>Continuar comprando</a></h5>
                                    <hr>

                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <div>
                                            <p class="mb-1">Carrito de compras</p>
                                            <p class="mb-0">Tienes <?php echo isset($_SESSION['carrito']) ? count($_SESSION['carrito']) : 0; ?> productos en tu carrito</p>
                                        </div>
                                        <div>
                                            <p class="mb-0"><span class="text-muted">Ordenar por:</span> <a href="#!"
                                                    class="text-body">precio <i
                                                        class="fas fa-angle-down mt-1"></i></a></p>
                                        </div>
                                    </div>

                                    <?php
                                    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
                                        foreach ($_SESSION['carrito'] as $key => $producto) {
                                            echo "<div class='card mb-3'>";
                                            echo "<div class='card-body'>";
                                            echo "<div class='d-flex justify-content-between'>";
                                            echo "<div class='d-flex flex-row align-items-center'>";
                                            echo "<div>";
                                            echo "<img src='https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp' class='img-fluid rounded-3' alt='Producto de compra' style='width: 65px;'>";
                                            echo "</div>";
                                            echo "<div class='ms-3'>";
                                            echo "<h5>{$producto['nombre']}</h5>";
                                            echo "<p class='small mb-0'>{$producto['precio']}</p>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "<div class='d-flex flex-row align-items-center'>";
                                            echo "<div style='width: 50px;'>";
                                            echo "<h5 class='fw-normal mb-0'>{$producto['cantidad']}</h5>";
                                            echo "</div>";
                                            echo "<div style='width: 80px;'>";
                                            echo "<h5 class='mb-0'>{$producto['precio']}</h5>";
                                            echo "</div>";
                                            echo "<form method='post' action='cart.php'>";
                                            echo "<input type='hidden' name='accion' value='eliminar'>";
                                            echo "<input type='hidden' name='producto_key' value='$key'>";
                                            echo "<button type='submit' style='color: #cecece;'><i class='fas fa-trash-alt'></i></button>";
                                            echo "</form>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                            echo "</div>";
                                        }
                                    }
                                    ?>


                                </div>
                                <div class="col-lg-5">
                                    <link rel="stylesheet" href="main/ccs/payment.css">

                                    <div class="card bg-primary text-white rounded-3">
                                        <div class="card-body">
                                            <!-- ... (contenido del formulario) ... -->
                                            <h3>Detalles de Compra </h3>
                                            <hr class="my-4">
                                            
                                            <!-- Resumen de la orden -->
                                            <div class="mb-4">
                                                <p class="mb-2">Subtotal: $ <?php echo json_encode($subtotal); ?><span id="subtotalAmount"></span></p>
                                                <p class="mb-2">ITBMS: $<?php echo json_encode(floatval($total) - floatval($subtotal)); ?><span id="ivaAmount"></span></p>

                                                <p class="mb-2">Total: <?php echo json_encode($total); ?><span id="totalAmount"></span></p>
                                            </div>
                                            

                                            <!-- Botón de pago -->
                                            <button type="button" class="btn btn-info btn-block btn-lg" onclick="realizarPago()">
                                                <div class="d-flex justify-content-between">
                                            
                                                    <span>Confirmar <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                                                </div>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Agrega la referencia a tu archivo payment.js -->
                                    <script src="main/js/payment.js"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ... (código HTML restante) ... -->

</body>
</html>