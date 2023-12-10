<?php
require 'db.php';

// Función para mostrar todas las marcas
function mostrarMarcas() {
    global $conn;
    $sql = "SELECT * FROM marcas";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return array(); // Retorna un array vacío si no hay resultados
    }
}

// Función para agregar una marca
function agregarMarca($nombre) {
    global $conn;
    $sql = "INSERT INTO marcas (nombre_marca) VALUES (?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre);

    if ($stmt->execute()) {
        return true;
    } else {
        // Manejar el error, por ejemplo, mostrar un mensaje de error o registrar el error en un archivo de registro
        echo "Error al agregar la marca: " . $stmt->error;
        return false;
    }
}

// Función para editar una marca
function editarMarca($id, $nombre) {
    global $conn;
    $sql = "UPDATE marcas SET nombre_marca=? WHERE id_marca=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nombre, $id);

    return $stmt->execute();
}

// Función para eliminar una marca
function eliminarMarca($id) {
    global $conn;
    $sql = "DELETE FROM marcas WHERE id_marca=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}

// Verificar si el formulario ha sido enviado para agregar, editar o eliminar una marca
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["agregar"])) {
        // Agregar nueva marca
        $nombreMarca = mysqli_real_escape_string($conn, $_POST["nombre_marca"]);

        if (agregarMarca($nombreMarca)) {
            echo "Marca agregada con éxito.";
            header("Location: {$_SERVER['PHP_SELF']}"); // Redireccionar después de agregar
            exit();
        } else {
            echo "Error al agregar la marca.";
        }
    } elseif (isset($_POST["editar"])) {
        // Editar marca existente
        $idMarca = mysqli_real_escape_string($conn, $_POST["id_marca"]);
        $nombreMarca = mysqli_real_escape_string($conn, $_POST["nombre_marca"]);

        if (editarMarca($idMarca, $nombreMarca)) {
            echo "Marca editada con éxito.";
            header("Location: {$_SERVER['PHP_SELF']}"); // Redireccionar después de editar
            exit();
        } else {
            echo "Error al editar la marca.";
        }
    } elseif (isset($_POST["eliminar"])) {
        // Eliminar marca existente
        $idMarca = mysqli_real_escape_string($conn, $_POST["id_marca"]);

        if (eliminarMarca($idMarca)) {
            echo "Marca eliminada con éxito.";
            header("Location: {$_SERVER['PHP_SELF']}"); // Redireccionar después de eliminar
            exit();
        } else {
            echo "Error al eliminar la marca.";
        }
    }
}

// Mostrar todas las marcas existentes
$marcas = mostrarMarcas();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Marcas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container mt-5">
<?php include 'main/html/crudsuperiorBar.php'; ?>
    <!-- Botón para agregar marca -->
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#agregarModal">Agregar Marca</button>

    <!-- Modal para agregar marca -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Marca</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario de agregar -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="nombre_marca">Nombre de la Marca:</label>
                            <input type="text" name="nombre_marca" class="form-control" required>
                        </div>
                        <input type="submit" name="agregar" value="Agregar Marca" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2>Lista de Marcas</h2>
    <ul class="list-group">
        <?php foreach ($marcas as $marca) : ?>
            <li class="list-group-item">
                <?php echo $marca['id_marca'], " - " , $marca['nombre_marca']; ?>
                <div class="float-right">
                    <!-- Botón para editar marca -->
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarModal<?php echo $marca['id_marca']; ?>">Editar</button>

                    <!-- Botón para eliminar marca -->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal<?php echo $marca['id_marca']; ?>">Eliminar</button>
                </div>
            </li>

            <!-- Modal para editar marca -->
            <div class="modal fade" id="editarModal<?php echo $marca['id_marca']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Marca</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido del formulario de editar -->
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="id_marca" value="<?php echo $marca['id_marca']; ?>">
                                <div class="form-group">
                                    <label for="nombre_marca">Nombre de la Marca:</label>
                                    <input type="text" name="nombre_marca" class="form-control" value="<?php echo $marca['nombre_marca']; ?>" required>
                                </div>

                                <input type="submit" name="editar" value="Guardar Cambios" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para confirmar eliminación de marca -->
            <div class="modal fade" id="eliminarModal<?php echo $marca['id_marca']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Marca</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que deseas eliminar esta marca?</p>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="id_marca" value="<?php echo $marca['id_marca']; ?>">
                                <input type="submit" name="eliminar" value="Eliminar" class="btn btn-danger">
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </ul>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
