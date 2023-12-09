<?php
require 'db.php';

// Obtén la categoría de la solicitud GET
$category = isset($_GET['category']) ? mysqli_real_escape_string($conn, $_GET['category']) : '';

// Define la cantidad de productos por página
$productsPerPage = 1;

// Calcula el inicio y fin de la selección basándote en la página actual
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
$startFrom = ($page - 1) * $productsPerPage;

// Usar una consulta preparada
$stmt = $conn->prepare("SELECT id_producto, nombre_producto, producto_img, existencias, precio FROM productos WHERE id_categoria = ? LIMIT ?, ?");
$stmt->bind_param("sii", $category, $startFrom, $productsPerPage);
$stmt->execute();
$result = $stmt->get_result();

// Inicializa el HTML de productos
$productsHtml = '';

// Muestra los productos
while ($row = mysqli_fetch_assoc($result)) {
    $productsHtml .= '<div class="col mb-4">';
    $productsHtml .= '<div class="card h-100">';
    $productsHtml .= '<img src="data:image/jpeg;base64,' . base64_encode($row["producto_img"]) . '" class="card-img-top" alt="' . $row["nombre_producto"] . '">';
    $productsHtml .= '<div class="card-body">';
    $productsHtml .= '<h5 class="card-title">' . $row["nombre_producto"] . '</h5>';
    $productsHtml .= '<p class="card-text">Unidades Disponibles: ' . $row["existencias"] . '</p>';
    $productsHtml .= '<p class="card-text">Precio: $' . $row["precio"] . '</p>';
    $productsHtml .= '<a href="#" class="btn btn-primary" onclick="agregarAlCarrito(' . $row["id_producto"] . ')">Añadir al Carrito</a>';
    $productsHtml .= '</div>';
    $productsHtml .= '</div>';
    $productsHtml .= '</div>';
}

// Devuelve la respuesta en formato JSON
$response = [
    'productsHtml' => $productsHtml,
    'paginationHtml' => getPaginationHtml($conn, $category, $productsPerPage)
];

echo json_encode($response);

// Función para obtener el HTML de paginación
function getPaginationHtml($conn, $category, $productsPerPage)
{
    // Realiza la consulta SQL para obtener el total de productos según la categoría
    $sqlTotal = "SELECT COUNT(id_producto) as total FROM productos";

    // Agrega la condición de la categoría si se proporciona
    if (!empty($category)) {
        $sqlTotal .= " WHERE id_categoria = '$category'";
    }

    $resultTotal = mysqli_query($conn, $sqlTotal);

    if (!$resultTotal) {
        die('Error en la consulta de total de productos: ' . $conn->error);
    }

    $rowTotal = mysqli_fetch_assoc($resultTotal);

    // Calcula el total de páginas
    $totalPages = ceil($rowTotal['total'] / $productsPerPage);

    // Inicializa el HTML de paginación
    $paginationHtml = '';

    // Muestra los enlaces de paginación
    for ($i = 1; $i <= $totalPages; $i++) {
        $paginationHtml .= '<li class="page-item"><a class="page-link" href="#" data-page="' . $i . '">' . $i . '</a></li>';
    }

    return $paginationHtml;
}
?>
