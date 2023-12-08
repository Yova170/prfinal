<?php
require 'db.php';

// Realiza tu consulta SQL aquí y asigna los resultados a $result
$sql = "SELECT id_producto, nombre_producto, producto_img, existencias, precio FROM productos";
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

   
</head>

<body>
    <div id="BarraSuperior">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">UTPStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="main/account/micuenta.php">Cuenta</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categoría</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php
                                // Consultar las categorías disponibles desde la base de datos
                                $sqlCategorias = "SELECT id_categoria, nombre_categoria FROM categorias";
                                $resultCategorias = mysqli_query($conn, $sqlCategorias);

                                // Mostrar opciones en el menú desplegable
                                while ($row = mysqli_fetch_assoc($resultCategorias)) {
                                    echo "<li><a class='dropdown-item' href='#' data-id='{$row['id_categoria']}'>{$row['nombre_categoria']}</a></li>";
                                }
                                ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="cart.php">Carrito</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true"></a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search" action="main/vista/busqueda.php">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>
            </div>
        </nav>
    </div>


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


<h2>Lista de Productos</h2>

<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
            <?php
            // Muestra los productos
            while ($row = $result->fetch_assoc()) {
                echo '<div class="col mb-4">';
                echo '<div class="card h-100">';
                // Aquí mostramos la imagen directamente desde la base de datos
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row["producto_img"]) . '" class="card-img-top" alt="' . $row["nombre_producto"] . '">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
                echo '<p class="card-text">Unidades Disponibles: ' . $row["existencias"] . '</p>';
                echo '<p class="card-text">Precio: $' . $row["precio"] . '</p>';
                echo '<a href="#" class="btn btn-primary" onclick="agregarAlCarrito(' . $row["id_producto"] . ')">Añadir al Carrito</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>


            <!-- Paginación Bootstrap -->
            <nav aria-label="Page navigation">
                <ul class="pagination" id="pagination-container">
                    <!-- Los elementos de paginación se agregarán aquí mediante jQuery -->
                </ul>
            </nav>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Variable para almacenar la categoría seleccionada
            var selectedCategory = '';

            // Función para cargar productos según la categoría seleccionada
            function loadProducts(category) {
                // Realizar una solicitud AJAX para obtener productos según la categoría
                // Puedes modificar la URL y los datos de la solicitud según tus necesidades
                $.ajax({
                    url: 'obtener_productos.php',
                    type: 'GET',
                    data: { category: category },
                    success: function (data) {
                        // Actualizar el contenido de los productos y la paginación
                        $('#products-container').html(data.productsHtml);
                        $('#pagination-container').html(data.paginationHtml);
                    },
                    error: function () {
                        console.log('Error al cargar productos.');
                    }
                });
            }

            // Manejar clic en la categoría
            $('#BarraSuperior').on('click', '.dropdown-item', function (e) {
                e.preventDefault();

                // Obtener el id de la categoría seleccionada
                selectedCategory = $(this).data('id');

                // Cargar productos según la categoría
                loadProducts(selectedCategory);
            });

            // Cargar productos al inicio (todos los productos)
            loadProducts(selectedCategory);
        });
    </script>

    <script>
        function agregarAlCarrito(idProducto) {
            // Lógica para agregar el producto al carrito
            // Puedes utilizar JavaScript o enviar una solicitud AJAX a un script PHP separado
            alert("Producto agregado al carrito: " + idProducto);
        }
    </script>

</body>
</html>

<?php
} else {
    // Manejo del error si la consulta no tiene resultados
    echo "Error al ejecutar la consulta: " . mysqli_error($conn);
}
?>
