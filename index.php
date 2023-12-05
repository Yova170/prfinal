<?php
    require 'main/ccs/head.php';
    session_start();
?>

<body>
    <div id="Barra Superior">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">UTPStore</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="main/account/micuenta.php">Cuenta</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Categorias
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Video Juegos</a></li>
                            <li><a class="dropdown-item" href="#">Celulares</a></li>
                            <li><a class="dropdown-item" href="#">Televisores</a></li>
                            <li><a class="dropdown-item" href="#">Electrodomesticos</a></li>
                            <li><a class="dropdown-item" href="#">Computadoras</a></li>
                        </ul>
                        </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Carrito</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"></a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
    </div>

    <div id="Carrusel de imagenes">
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="img/menu/m1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/menu/m2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="img/menu/m3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
    </div>
    <br>
    <div id="inicio">
        <div class="row">
            <div class="col-sm-4" id="xboxs"> 
                <div class="card mb-3">
                    <img src="main/productos/c1/1.jpg" class="card-img-top" alt="Xbox Series S">
                    <div class="card-body">
                        <h5 class="card-title">Xbox Series S</h5>
                        <p class="card-text">La nueva consola de Microsoft, a un precio de locos.</p>
                        <a href="main/vista/vista.php?id_producto=1" class="btn btn-primary">$ 299.00</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4" id="ps5">
                <div class="card mb-3">
                    <img src="main/productos/c1/2.jpg" class="card-img-top" alt="PlayStation 5">
                    <div class="card-body">
                        <h5 class="card-title">PlayStation 5</h5>
                        <p class="card-text">La PS5 está aquí con un gran catálogo de juegos.</p>
                        <a href="main/vista/vista.php?id_producto=2" class="btn btn-primary">$ 499.00</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4" id="ns">
                <div class="card mb-3" >
                    <img src="main/productos/c1/3.jpg" class="card-img-top" alt="Nintendo Switch">
                    <div class="card-body">
                        <h5 class="card-title">Nintendo Switch</h5>
                        <p class="card-text">La mejor consola portátil del mundo aquí en UTPStore.</p>
                        <a href="main/vista/vista.php?id_producto=3" class="btn btn-primary">$ 299.00</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
