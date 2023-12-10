<?php
require 'db.php';

// Función para mostrar todas las categorías
function mostrarCategorias() {
    global $conn;
    $sql = "SELECT * FROM categorias";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        return array(); // Retorna un array vacío si no hay resultados
    }
}

// Función para agregar una categoría
function agregarCategoria($nombre, $descripcion) {
    global $conn;
    $sql = "INSERT INTO categorias (nombre_categoria, descripcion_categoria) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nombre, $descripcion);

    if ($stmt->execute()) {
        return true;
    } else {
        // Manejar el error, por ejemplo, mostrar un mensaje de error o registrar el error en un archivo de registro
        echo "Error al agregar la categoría: " . $stmt->error;
        return false;
    }
}

// Función para editar una categoría
function editarCategoria($id, $nombre, $descripcion) {
    global $conn;
    $sql = "UPDATE categorias SET nombre_categoria=?, descripcion_categoria=? WHERE id_categoria=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);

    return $stmt->execute();
}

// Función para eliminar una categoría
function eliminarCategoria($id) {
    global $conn;
    $sql = "DELETE FROM categorias WHERE id_categoria=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    return $stmt->execute();
}

// Verificar si el formulario ha sido enviado para agregar o editar una categoría
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["agregar"])) {
        // Agregar nueva categoría
        $nombreCategoria = mysqli_real_escape_string($conn, $_POST["nombre_categoria"]);
        $descripcionCategoria = mysqli_real_escape_string($conn, $_POST["descripcion_categoria"]);

        if (agregarCategoria($nombreCategoria, $descripcionCategoria)) {
            echo "Categoría agregada con éxito.";
            header("Location: {$_SERVER['PHP_SELF']}"); // Redireccionar después de agregar
            exit();
        } else {
            echo "Error al agregar la categoría.";
        }
    } elseif (isset($_POST["editar"])) {
        // Editar categoría existente
        $idCategoria = mysqli_real_escape_string($conn, $_POST["id_categoria"]);
        $nombreCategoria = mysqli_real_escape_string($conn, $_POST["nombre_categoria"]);
        $descripcionCategoria = mysqli_real_escape_string($conn, $_POST["descripcion_categoria"]);

        if (editarCategoria($idCategoria, $nombreCategoria, $descripcionCategoria)) {
            echo "Categoría editada con éxito.";
            header("Location: {$_SERVER['PHP_SELF']}"); // Redireccionar después de editar
            exit();
        } else {
            echo "Error al editar la categoría.";
        }
    } elseif (isset($_POST["eliminar"])) {
        // Eliminar categoría existente
        $idCategoria = mysqli_real_escape_string($conn, $_POST["id_categoria"]);

        if (eliminarCategoria($idCategoria)) {
            echo "Categoría eliminada con éxito.";
            header("Location: {$_SERVER['PHP_SELF']}"); // Redireccionar después de eliminar
            exit();
        } else {
            echo "Error al eliminar la categoría.";
        }
    }
}

// Mostrar todas las categorías existentes
$categorias = mostrarCategorias();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Categorías</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body class="container mt-5">
<?php include 'main/html/crudsuperiorBar.php'; ?>
    <!-- Botón para agregar categoría -->
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#agregarModal">Agregar Categoría</button>

    <!-- Modal para agregar categoría -->
    <div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Contenido del formulario de agregar -->
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="nombre_categoria">Nombre de la Categoría:</label>
                            <input type="text" name="nombre_categoria" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion_categoria">Descripción:</label>
                            <textarea name="descripcion_categoria" rows="4" class="form-control" required></textarea>
                        </div>
                        <input type="submit" name="agregar" value="Agregar Categoría" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <h2>Lista de Categorías</h2>
    <ul class="list-group">
        <?php foreach ($categorias as $categoria) : ?>
            <li class="list-group-item">
                <?php echo "{$categoria['nombre_categoria']} - {$categoria['descripcion_categoria']}"; ?>
                <div class="float-right">
                    <!-- Botón para editar categoría -->
                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarModal<?php echo $categoria['id_categoria']; ?>">Editar</button>

                    <!-- Botón para eliminar categoría -->
                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#eliminarModal<?php echo $categoria['id_categoria']; ?>">Eliminar</button>
                </div>
            </li>

            <!-- Modal para editar categoría -->
            <div class="modal fade" id="editarModal<?php echo $categoria['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Contenido del formulario de editar -->
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
                                <div class="form-group">
                                    <label for="nombre_categoria">Nombre de la Categoría:</label>
                                    <input type="text" name="nombre_categoria" class="form-control" value="<?php echo $categoria['nombre_categoria']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="descripcion_categoria">Descripción:</label>
                                    <textarea name="descripcion_categoria" rows="4" class="form-control" required><?php echo $categoria['descripcion_categoria']; ?></textarea>
                                </div>
                                <input type="submit" name="editar" value="Guardar Cambios" class="btn btn-primary">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal para confirmar eliminación de categoría -->
            <div class="modal fade" id="eliminarModal<?php echo $categoria['id_categoria']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Eliminar Categoría</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>¿Estás seguro de que deseas eliminar esta categoría?</p>
                        </div>
                        <div class="modal-footer">
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                <input type="hidden" name="id_categoria" value="<?php echo $categoria['id_categoria']; ?>">
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
