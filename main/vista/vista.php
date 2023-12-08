<?php
    include '../ccs/head.php';
    require '../../db.php';
    
    if (isset($_GET['id_producto'])) {
        $idp = $_GET['id_producto'];
     
    }

    $sql = "SELECT * FROM productos WHERE id_producto = $idp";
    $result = $conn->query($sql);

    
    $row = $result->fetch_assoc();

    $nombre = $row['nombre_producto'];
    $descripcion = $row['descripcion_producto'];
    $img = $row['producto_img'];
    $precio = $row['precio'];
    $stock = $row['stock'];

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
                            <li><a class="dropdown-item" href="busquedac.php?cat=5">Computadoras</a></li>
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

    <div id="imagen">
        <img src="<?php echo $img; ?>" alt="Imagen">
    </div>
    <br/>
    <div id="titulo">
        <h1><?php echo $nombre; ?></h1>
    </div>
    <br/>
    <div id="desc">
        <a ><?php echo $descripcion; ?></a>
    </div>
    <br />
    <div id="precio">
        <h1 >USD <?php echo $precio; ?></h1>
    </div>
    <br />

    <?php
    if ($stock < 1) {
        echo "<h1 class='badge text-bg-danger'> No hay en Stock </h1>";
    } else {
        echo "
            <div class='d-grid gap-2 d-md-block' id='botonescompra'>
                <form method='post' action=''>
                    <button class='btn btn-primary' type='submit'>Comprar</button>
                </form>
            </div>
            <div class='d-grid gap-2 d-md-block' id='botonescompra'>
                <form method='post' action='../../cart.php'>
                    <input type='hidden' name='id_producto' value='$idp'>
                    <input type='hidden' name='nombre_producto' value='$nombre'>
                    <input type='hidden' name='precio_producto' value='$precio'>
                    <input type='hidden' name='add' value='$idp'>
                    <button class='btn btn-primary' type='submit'>Agregar al Carrito</button>
                </form>
            </div>
        ";
    }
?>
   
    <br/>
</body>
