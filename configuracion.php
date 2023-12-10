<?php
require 'db.php';

$valorIVA = 0; // Valor predeterminado

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Añadir manejo de errores a la consulta de actualización
    $iva = mysqli_real_escape_string($conn, $_POST["valor_iva"]);
    $sqlConfiguracion = "UPDATE configuracion SET valor_iva = $iva WHERE id_configuracion = 1";
    $resultConfiguracion = mysqli_query($conn, $sqlConfiguracion);

    if ($resultConfiguracion) {
        // Redirigir después de procesar el formulario para evitar reenvíos
        header("Location: configuracion.php");
        exit(); // Asegurar que el script no continúe ejecutándose después de la redirección
    } else {
        echo "Error al actualizar la configuración: " . mysqli_error($conn);
        echo $sqlConfiguracion;

    }
}

// Obtener el valor actual del IVA
$sqlObtenerIVA = "SELECT valor_iva FROM configuracion WHERE id_configuracion = 1";
$resultObtenerIVA = mysqli_query($conn, $sqlObtenerIVA);

if ($resultObtenerIVA && mysqli_num_rows($resultObtenerIVA) > 0) {
    $rowIVA = mysqli_fetch_assoc($resultObtenerIVA);
    $valorIVA = $rowIVA['valor_iva'];
} else {
    // Añadir manejo de errores a la consulta para obtener el valor del IVA
    echo "Error al obtener el valor del ITBMS: " . mysqli_error($conn);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
        <!-- Agregamos Bootstrap para el diseño -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> 
   <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
   
</head>

<body class="container mt-5">
<?php include 'main/html/crudsuperiorBar.php'; ?>
    <h2 class="mb-4">Configuración</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div class="form-group row">
            <label for="valor_iva" class="col-sm-2 col-form-label">Valor del ITBMS:</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="valor_iva" name="valor_iva" value="<?php echo $valorIVA; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6">
                <button type="submit" class="btn btn-primary">Guardar Configuración</button>
            </div>
        </div>
    </form>

    <!-- Agregar los scripts de Bootstrap y jQuery al final del body -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
