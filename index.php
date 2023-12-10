<?php
require 'db.php';

// Número máximo de productos por página
$productosPorPagina = 9;

// Obtenemos el número total de productos
$totalProductos = mysqli_num_rows(mysqli_query($conn, "SELECT id_producto FROM productos"));

// Calculamos el número total de páginas
$totalPaginas = ceil($totalProductos / $productosPorPagina);

// Obtenemos el número de página actual
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calculamos el índice de inicio para la consulta SQL
$indiceInicio = ($paginaActual - 1) * $productosPorPagina;

// Realizamos la consulta SQL con LIMIT para obtener solo los productos de la página actual
$sql = "SELECT id_producto, nombre_producto, producto_img, stock, precio FROM productos LIMIT $indiceInicio, $productosPorPagina";
$result = mysqli_query($conn, $sql);

// Verifica si hay resultados
if ($result) {
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Metaetiquetas para el documento -->
    <title>UTPS</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <!-- Agregamos Bootstrap para el diseño -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
   

    <!-- Agregamos estilos adicionales -->
    <style>
        .body-card {
            padding-top: 56px; /* Ajuste para el menú superior fijo */
            background-color: #f8f9fa; /* Color de fondo */
        }
        
        /* Personaliza el estilo según sea necesario */
        .card {
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .card-img-top {
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .card-body {
            padding: 15px;
        }

        .etiqueta-azul {
            background-color: #007bff;
            color: #fff;
            padding: 5px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .etiqueta-gris {
            background-color: #6c757d;
            color: #fff;
            padding: 5px;
            border-radius: 4px;
            margin-bottom: 5px;
        }

        .btn-agregar-carrito {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

<body>
    
    <?php include 'main/html/superiorBar.php'?>
    <!-- Carrusel de Imágenes -->
    <div id="Carrusel de imagenes">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/menu/m1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/menu/m2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/menu/m3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
    </div>
    <br>
<!-- Lista de Productos -->
<h2 class="text-center mt-3">Lista de Productos</h2>

<div class="row justify-content-center">
        <?php
        // Muestra los productos de la página actual
        while ($row = $result->fetch_assoc()) {
        echo '<div class="col-md-3 mb-4">';
        echo '<div class="card h-100">';

        // Ruta completa de la imagen
        $imagePath = 'img/productos/' . $row["producto_img"];
        echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $row["nombre_producto"] . '">';

        echo '<div class="card-body d-flex flex-column">';
        echo '<div class="d-flex justify-content-between mb-2">';
        // Etiqueta azul con el nombre de la marca a la izquierda
        echo '<span class="badge badge-primary etiqueta-azul">' . $row["stock"] . '</span>';
        // Etiqueta gris con el precio a la derecha
        echo '<span class="badge badge-secondary etiqueta-gris">$' . $row["precio"] . '</span>';
        echo '</div>';
        echo '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
        echo '<p class="card-text">Unidades Disponibles: ' . $row["stock"] . '</p>';
        // Botón verde de "Agregar al Carrito"
        echo '<button class="btn btn-success mt-auto" onclick="agregarAlCarrito(' . $row["id_producto"] . ')">Agregar al Carrito</button>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>
</div>
    

<link rel="stylesheet" href="main/ccs/paginacion.css">
    <!-- Paginación Bootstrap -->
    <nav class="pagination-outer" aria-label="Page navigation">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $totalPaginas; $i++) : ?>
                <li class="page-item <?php echo ($i == $paginaActual) ? 'active' : ''; ?>">
                    <a href="?pagina=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

    <!-- Agregamos jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Otro Script si es necesario -->
<script>
    function agregarAlCarrito(idProducto) {
        // Lógica para agregar el producto al carrito
        // Puedes utilizar JavaScript o enviar una solicitud AJAX a un script PHP separado
        alert("Producto agregado al carrito: " + idProducto);
    }
</script>
</body>


</body>
</html>

<?php

} else {
    // Manejo del error si la consulta no tiene resultados
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}
?>
