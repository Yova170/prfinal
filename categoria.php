<?php
require 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreCategoria = mysqli_real_escape_string($conn, $_POST["nombre_categoria"]);
    $descripcionCategoria = mysqli_real_escape_string($conn, $_POST["descripcion_categoria"]);

    // Insertar la categoría en la tabla 'categorias'
    $sqlCategoria = "INSERT INTO categorias (nombre_categoria, descripcion_categoria) VALUES ('$nombreCategoria', '$descripcionCategoria')";
    $resultCategoria = mysqli_query($conn, $sqlCategoria);

    if ($resultCategoria) {
        echo "Categoría agregada con éxito.";
    } else {
        echo "Error al agregar la categoría: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Categoría</title>
</head>

<body>
    <h2>Agregar Categoría</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre_categoria">Nombre de la Categoría:</label>
        <input type="text" name="nombre_categoria" required><br>

        <label for="descripcion_categoria">Descripción:</label>
        <textarea name="descripcion_categoria" rows="4" required></textarea><br>

        <input type="submit" value="Agregar Categoría">
    </form>
</body>

</html>
