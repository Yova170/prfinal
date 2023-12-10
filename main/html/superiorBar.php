
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
                            <a class="nav-link active" aria-current="page" href="micuenta.php">Cuenta</a>
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