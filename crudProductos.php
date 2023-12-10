<?php
include 'db.php';

// Función para mostrar productos
function mostrarProductos() {
    global $conn;
    $sql = "SELECT * FROM productos";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $products = $result->fetch_all(MYSQLI_ASSOC);
        return $products;
    } else {
        return array();
    }
}

// Función para agregar producto
function agregarProducto($nombre, $descripcion, $imagen, $precio, $stock, $idCategoria, $idMarca)
{
    global $conn;

    // Verificar si se proporcionó una imagen
    if (!isset($imagen) || empty($imagen['name'])) {
        // Manejar la situación si no se proporciona una imagen
        return false;
    }

    // Validar y procesar la imagen de manera más segura
    $uploadsDirectory = 'img/productos/'; // Directorio donde se guardarán las imágenes
    $targetFile = $uploadsDirectory . basename($imagen['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Verificar el tipo de archivo (puedes personalizar esto según tus necesidades)
    if ($imageFileType != 'jpg' && $imageFileType != 'jpeg' && $imageFileType != 'png' && $imageFileType != 'gif') {
        // Manejar el error si el tipo de archivo no es válido
        return false;
    }

    // Mover y renombrar la imagen al directorio de uploads con un nombre único
    $uniqueFilename = uniqid('product_') . '.' . $imageFileType;
    $destinationPath = $uploadsDirectory . $uniqueFilename;
    if (!move_uploaded_file($imagen['tmp_name'], $destinationPath)) {
        // Manejar el error si no se puede mover la imagen
        return false;
    }

    // Resto del código para agregar el producto...

    // Ejemplo de cómo se podría utilizar la variable $uniqueFilename en la consulta SQL
    $sql = "INSERT INTO productos (nombre_producto, descripcion_producto, producto_img, precio, stock, id_categoria, id_marca) 
            VALUES ('$nombre', '$descripcion', '$uniqueFilename', $precio, $stock, $idCategoria, $idMarca)";

    // Resto del código para ejecutar la consulta SQL...

    if (mysqli_query($conn, $sql)) {
        // Producto agregado con éxito
        return true;
    } else {
        // Manejar el error si la consulta SQL falla
        return false;
    }
}



// Función para obtener producto
function obtenerProducto($id) {
    global $conn;
    $id = intval($id); // Validar que $id sea un entero
    $sql = "SELECT * FROM productos WHERE id_producto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function editarProducto($id, $nombre, $descripcion, $imagen, $precio, $stock, $categoria, $marca) {
    global $conn;
    $sql = "UPDATE productos 
            SET nombre_producto=?, descripcion_producto=?, producto_img=?, 
                precio=?, stock=?, id_categoria=?, id_marca=? 
            WHERE id_producto = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdiisi", $nombre, $descripcion, $imagen, $precio, $stock, $categoria, $marca, $id);

    return $stmt->execute();
}

function eliminarProducto($id) {
    global $conn;
    $id = intval($id); // Validar que $id sea un entero
    $sql = "DELETE FROM productos WHERE id_producto = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}
?>
