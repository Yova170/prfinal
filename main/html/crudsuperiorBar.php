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
                    <!-- Enlaces a los CRUD -->
                    <li class="nav-item">
                        <a class="nav-link" href="producto.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categoria.php">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marca.php">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="configuracion.php">Configuracion</a>
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
