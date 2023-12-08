<?php
    require '../ccs/head.php';
    session_start();
    if (!isset($_SESSION['usuario'])) {
  
        echo'<script>window.location.replace("../../login.php");</script>';
        
    }else{
        $nomuser = $_SESSION['usuario'];
    }
?>
<html>
    <body>
    <div id="Barra Superior">
         <nav class="navbar navbar-expand-lg bg-body-tertiary">
             <div class="container-fluid">
                <a class="navbar-brand" href="../../index.php">UTPStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../account/micuenta.php">Cuenta</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../vista/busquedac.php?cat=1">Video Juegos</a></li>
                            <li><a class="dropdown-item" href="../vista/busquedac.php?cat=2">Celulares</a></li>
                            <li><a class="dropdown-item" href="../vista/busquedac.php?cat=3">Televisores</a></li>
                            <li><a class="dropdown-item" href="../vista/busquedac.php?cat=4">Electrodomesticos</a></li>
                            <li><a class="dropdown-item" href="../vista/busquedac.php?cat=5">Computadoras</a></li>
                        </ul>
                        </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../cart.php">Carrito</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"></a>
                    </li>
                </ul>
                <form class="d-flex" role="search"  action="../vista/busqueda.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
    </div>

        <br />
        <button type="button" onclick="if (confirm('¿Estás seguro de que quieres cerrar la sesión?')) { location.href='logout.php'; }">Cerrar sesión</button>
        <button type="button" onclick="if (confirm('¿Estás seguro de que quieres cambiar la contrasena?')) { location.href='passx.php'; }">Cambiar Contrasena</button>
        <button type="button" onclick="if (confirm('¿Estás seguro de que quiere darce baja?')) { location.href='baja.php'; }">Darse de baja</button>
    </body>

    
</html>