<?php
require 'db.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreMarca = mysqli_real_escape_string($conn, $_POST["nombre_marca"]);
    $descripcionMarca = mysqli_real_escape_string($conn, $_POST["descripcion_marca"]);

    // Insertar la marca en la tabla 'marcas'
    $sqlMarca = "INSERT INTO marcas (nombre_marca, descripcion_marca) VALUES ('$nombreMarca', '$descripcionMarca')";
    $resultMarca = mysqli_query($conn, $sqlMarca);

    if ($resultMarca) {
        echo "Marca agregada con éxito.";
    } else {
        echo "Error al agregar la marca: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Marca</title>
</head>

<body>
    <h2>Agregar Marca</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="nombre_marca">Nombre de la Marca:</label>
        <input type="text" name="nombre_marca" required><br>

        <label for="descripcion_marca">Descripción:</label>
        <textarea name="descripcion_marca" rows="4" required></textarea><br>

        <input type="submit" value="Agregar Marca">
    </form>
</body>

</html>
