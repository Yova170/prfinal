<?php
require 'db.php';
require 'crudProductos.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombreProducto = mysqli_real_escape_string($conn, $_POST["nombre_producto"]);
    $descripcionProducto = mysqli_real_escape_string($conn, $_POST["descripcion_producto"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
    $precio = mysqli_real_escape_string($conn, $_POST["precio"]);
    $idMarca = mysqli_real_escape_string($conn, $_POST["id_marca"]);

    // Manejar la imagen (en este caso, asumiremos que estás almacenando el nombre del archivo)
    $imagenProducto = $_FILES["producto_img"];

    // Obtener el ID de la categoría desde el formulario
    $idCategoria = mysqli_real_escape_string($conn, $_POST["id_categoria"]);

    // Llamar a la función agregarProducto para insertar el producto
    $productoAgregado = agregarProducto($nombreProducto, $descripcionProducto, $imagenProducto, $precio, $stock, $idCategoria, $idMarca);
    
    if ($productoAgregado) {
        // Producto agregado con éxito, redirigir a la misma página
        header("Location: {$_SERVER['PHP_SELF']}");
        exit();
    } else {
        echo "Error al agregar el producto. Verifica los detalles e intenta nuevamente.";
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Productos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<?php include 'main/html/superiorBar.php'; ?>
<div class="container mt-5">
    <h2 class="mb-4">CRUD de Productos</h2>

    <!-- Botón para agregar producto -->
    <button class="btn btn-success mb-3" data-toggle="modal" data-target="#agregarModal">Agregar Producto</button>

    <!-- Tabla de productos -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Recorrer la lista de productos y mostrar en la tabla

            $productos = mostrarProductos();
            foreach ($productos as $producto) {
                echo "<tr>";
                echo "<td>{$producto['id_producto']}</td>";
                echo "<td>{$producto['nombre_producto']}</td>";
                echo "<td>{$producto['descripcion_producto']}</td>";
                echo "<td>{$producto['precio']}</td>";
                echo "<td>{$producto['stock']}</td>";
                echo "<td>
                        <button class='btn btn-warning btn-sm' data-toggle='modal' data-target='#editarModal' data-id='{$producto['id_producto']}'>Editar</button>
                        <button class='btn btn-danger btn-sm' data-toggle='modal' data-target='#eliminarModal' data-id='{$producto['id_producto']}'>Eliminar</button>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<!-- Modales actualizados para productos -->

<!-- Create Product Modal -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-left" id="modalLabel">Agregar un Nuevo Producto</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Formulario de agregar producto con ID agregado para referencia -->
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                
                    <div class="form-group">
                        <label for="nombre_producto">Nombre del Producto:</label>
                        <input type="text" name="nombre_producto" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="descripcion_producto">Descripción:</label>
                        <textarea name="descripcion_producto" rows="4" class="form-control" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="producto_img">Imagen:</label>
                        <input type="file" name="producto_img" accept="image/*" class="form-control-file" required>
                    </div>

                    <div class="form-group">
                        <label for="precio">Precio:</label>
                        <input type="text" name="precio" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="id_categoria">Categoría:</label>
                        <select name="id_categoria" class="form-control" required>
                            <?php
                            // Consultar las categorías disponibles desde la base de datos
                            $sqlCategorias = "SELECT id_categoria, nombre_categoria FROM categorias";
                            $resultCategorias = mysqli_query($conn, $sqlCategorias);

                            // Mostrar opciones en el menú desplegable
                            while ($row = mysqli_fetch_assoc($resultCategorias)) {
                                echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_marca">Marca:</label>
                        <select name="id_marca" class="form-control" required>
                            <?php
                            // Consultar las marcas disponibles desde la base de datos
                            $sqlMarcas = "SELECT id_marca, nombre_marca FROM marcas";
                            $resultMarcas = mysqli_query($conn, $sqlMarcas);

                            // Mostrar opciones en el menú desplegable
                            while ($row = mysqli_fetch_assoc($resultMarcas)) {
                                echo "<option value='{$row['id_marca']}'>{$row['nombre_marca']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="stock">Existencias:</label>
                        <input type="text" name="stock" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Agregar Producto</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Product Modal -->
<div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title float-left" id="modalLabel">Editar Producto</h4>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="edit-producto-form" data-toggle="validator" action="#" method="POST">
                    <input type="hidden" id="id_edit" name="id" class="edit-id">
                    <!-- Asegúrate de tener campos adecuados según tu estructura de base de datos -->
                    <div class="form-group">
                        <label class="control-label" for="nombre_edit">Nombre:</label>
                        <input type="text" id="nombre_edit" name="nombre" class="form-control" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="descripcion_edit">Descripción:</label>
                        <textarea id="descripcion_edit" name="descripcion" class="form-control" required></textarea>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="producto_img_edit">Imagen:</label>
                        <input type="file" name="producto_img_edit" accept="image/*" class="form-control-file">
                        <!-- Puedes usar este campo para permitir la carga de una nueva imagen -->
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="precio_edit">Precio:</label>
                        <input type="text" id="precio_edit" name="precio" class="form-control" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                    <div class="form-group">
                        <label for="id_categoria">Categoría:</label>
                        <select name="id_categoria" class="form-control" required>
                            <?php
                            // Consultar las categorías disponibles desde la base de datos
                            $sqlCategorias = "SELECT id_categoria, nombre_categoria FROM categorias";
                            $resultCategorias = mysqli_query($conn, $sqlCategorias);

                            // Mostrar opciones en el menú desplegable
                            while ($row = mysqli_fetch_assoc($resultCategorias)) {
                                echo "<option value='{$row['id_categoria']}'>{$row['nombre_categoria']}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_marca">Marca:</label>
                        <select name="id_marca" class="form-control" required>
                            <?php
                            // Consultar las marcas disponibles desde la base de datos
                            $sqlMarcas = "SELECT id_marca, nombre_marca FROM marcas";
                            $resultMarcas = mysqli_query($conn, $sqlMarcas);

                            // Mostrar opciones en el menú desplegable
                            while ($row = mysqli_fetch_assoc($resultMarcas)) {
                                echo "<option value='{$row['id_marca']}'>{$row['nombre_marca']}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="stock_edit">Existencias:</label>
                        <input type="text" id="stock_edit" name="stock" class="form-control" required>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                    <div class="form-group mt-4">
                        <button type="submit" class="btn submit-producto-edit btn-success">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal para eliminar producto -->
<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este producto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <?php
                // Agregar el botón de eliminar con la llamada a la función eliminarProducto
                echo "<button type='button' class='btn btn-danger' onclick='eliminarProducto({$producto['id_producto']})'>Eliminar</button>";
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Agregar script JavaScript para llamar a la función eliminarProducto -->
<script>
    function eliminarProducto(idProducto) {
        // Llamar a la función eliminarProducto desde crudProductos.php
        // Puedes utilizar AJAX o redirigir a una página que llame a la función, dependiendo de tu implementación
        // Ejemplo con redirección
        window.location.href = 'crudProductos.php?action=eliminar&id=' + idProducto;
    }
</script>

</body>
</html>