<?php
require '../../db.php';
require '../ccs/head.php';

// Definir variables para paginación
$productosPorPagina = 9;
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $productosPorPagina;

// Obtener el término de búsqueda
$busqueda = isset($_GET["busqueda"]) ? $_GET["busqueda"] : '';

// Consultar productos y categorías que coincidan con la búsqueda
$sql = "SELECT p.*, c.nombre_categoria
        FROM productos p
        LEFT JOIN categorias c ON p.id_categoria = c.id_categoria
        WHERE p.nombre_producto LIKE '%$busqueda%' OR p.descripcion_producto LIKE '%$busqueda%' OR c.nombre_categoria LIKE '%$busqueda%'
        LIMIT $productosPorPagina OFFSET $offset";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div id="BarraSuperior" class="bg-light">
        <!-- Barra de navegación, si es necesario -->
    </div>

    <div class="container mt-4">
        <h1>Resultados de Búsqueda</h1>

        <div class="row">
            <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col-md-4 mb-4'> 
                            <div class='card'>
                                <img src='" . $row['producto_img'] ."' class='card-img-top'>
                                <div class='card-body'>
                                    <h5 class='card-title'>" . $row['nombre_producto'] ."</h5>
                                    <p class='card-text'>" . $row['descripcion_producto'] . "</p>
                                    <p class='card-text'>Categoría: " . $row['nombre_categoria'] . "</p>
                                    <a href='vista.php?id_producto=" . $row['id_producto'] ."' class='btn btn-primary'>$ " . $row['precio'] ."</a>
                                </div>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<div class='col-md-12'>
                            <div class='alert alert-info' role='alert'>
                                No se encontraron productos con la palabra '$busqueda' en la descripción o categoría.
                            </div>
                        </div>";
                }
            ?>
        </div>
    </div>

    <!-- Enlaces a los scripts de Bootstrap y jQuery (necesarios para el funcionamiento de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Agrega aquí cualquier otro contenido que desees mostrar -->

</body>
</html>
