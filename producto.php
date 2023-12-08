<?php
require 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreProducto = mysqli_real_escape_string($conn, $_POST["nombre_producto"]);
    $descripcionProducto = mysqli_real_escape_string($conn, $_POST["descripcion_producto"]);
    $precio = mysqli_real_escape_string($conn, $_POST["precio"]);
    $idMarca = mysqli_real_escape_string($conn, $_POST["id_marca"]);
    $existencia = mysqli_real_escape_string($conn, $_POST["existencias"]);

    // Manejar la imagen (en este caso, asumiremos que estás almacenando el nombre del archivo)
    $imagenProducto = mysqli_real_escape_string($conn, $_FILES["producto_img"]["name"]);

    // Obtener el ID de la categoría desde el formulario
    $idCategoria = mysqli_real_escape_string($conn, $_POST["id_categoria"]);

    // Insertar el producto en la tabla 'productos'
    $sqlProducto = "INSERT INTO productos (nombre_producto, descripcion_producto, producto_img, precio, id_categoria, id_marca, existencias) VALUES ('$nombreProducto', '$descripcionProducto', '$imagenProducto', $precio, $idCategoria, $idMarca, $existencia)";
    $resultProducto = mysqli_query($conn, $sqlProducto);

    if ($resultProducto) {
        echo "Producto agregado con éxito.";
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
</head>

<body>
    <h2>Agregar Producto</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="nombre_producto">Nombre del Producto:</label>
        <input type="text" name="nombre_producto" required><br>

        <label for="descripcion_producto">Descripción:</label>
        <textarea name="descripcion_producto" rows="4" required></textarea><br>

        <label for="producto_img">Imagen:</label>
        <input type="file" name="producto_img" accept="image/*" required><br>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" required><br>

        <!-- Menú desplegable para seleccionar la categoría -->
        <label for="id_categoria">Categoría:</label>
        <select name="id_categoria" required>
            <?php
            // Consultar las categorías disponibles desde la base de datos
            $sqlCategorias = "SELECT id_categoria, nombre_categoria FROM categorias";
            $resultCategorias = mysqli_query($conn, $sqlCategorias);

            // Mostrar opciones en el menú desplegable
            while ($row = mysqli_fetch_assoc($resultCategorias)) {
                echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}</option>";
            }
            ?>
        </select><br>

        <label for="id_marca">Marca:</label>
        <select name="id_marca" required>
            <?php
            // Consultar las categorías disponibles desde la base de datos
            $sqlCategorias = "SELECT id_marca, nombre_marca FROM marcas";
            $resultCategorias = mysqli_query($conn, $sqlCategorias);

            // Mostrar opciones en el menú desplegable
            while ($row = mysqli_fetch_assoc($resultCategorias)) {
                echo "<option value='{$row['id_marca']}'>{$row['nombre_marca']}</option>";
            }
            ?>
        </select><br>
        <label for="existencia">Existencias:</label>
        <input type="text" name="existencia" required><br>
        <input type="submit" value="Agregar Producto">
    </form>
</body>

</html>
