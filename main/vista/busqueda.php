<?php
require '../../db.php';
require '../ccs/head.php';
$busqueda = $_GET["busqueda"];


$productosPorPagina = 9;

$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

$offset = ($paginaActual - 1) * $productosPorPagina;

$sql = "SELECT * FROM productos WHERE descripcion_producto LIKE '%$busqueda%' LIMIT $productosPorPagina OFFSET $offset";
$result = $conn->query($sql);



?>

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
                            <li><a class="dropdown-item" href="busquedac.php?cat=1" name="1">Video Juegos</a></li>
                            <li><a class="dropdown-item" href="busquedac.php?cat=2">Celulares</a></li>
                            <li><a class="dropdown-item" href="busquedac.php?cat=3">Televisores</a></li>
                            <li><a class="dropdown-item" href="busquedac.php?cat=4">Electrodomesticos</a></li>
                            <li><a class="dropdown-item" href="busquedac.php?cat=5">Computadoras</a></li></li>
                        </ul>
                        </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../../cart.php">Carrito</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true"></a>
                    </li>
                </ul>
                <form class="d-flex" role="search"  action="busqueda.php">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" name="busqueda" required>
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
                </div>
            </div>
        </nav>
    </div>

    <h1> Resultado para <?php echo $busqueda; ?></h1>
    <br/>
    <div class="row">
        <?php
            if($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='col-sm-4'> 
                        <div class='card mb-3'>
                            <img src='" . $row['producto_img'] ."' class='card-img-top'>
                            <div class='card-body'>
                                <h5 class='card-title'>" . $row['nombre_producto'] ."</h5>
                                <a href='vista.php?id_producto=" . $row['id_producto'] ."' class='btn btn-primary'>$ " . $row['precio'] ."</a>
                            </div>
                        </div>
                    </div>";
                }
            }else {
            echo "<h2>No se encontraron productos con la palabra '$busqueda' en la descripción.</h2>";
            }
            ?>
    </div>
            
    
  
</body>
