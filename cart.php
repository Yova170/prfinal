<?php
    require 'main/ccs/head.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $productoKey = $_POST['producto_key'];
        
        if (isset($_SESSION['carrito'][$productoKey])) {
            unset($_SESSION['carrito'][$productoKey]);
            
            
        }else {

            $idProducto = $_POST['id_producto'];
            $nombreProducto = $_POST['nombre_producto'];
            $precioProducto = $_POST['precio_producto'];
    
            if (!isset($_SESSION['carrito'])) {
                $_SESSION['carrito'] = [];
            }

            $_SESSION['carrito'][] = [
                'id' => $idProducto,
                'nombre' => $nombreProducto,
                'precio' => $precioProducto,
                'cantidad' => 1 
            ];
    
            header("Location: main/vista/vista.php?id_producto=$idProducto");
            exit;
        }

    } 
    
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
                        <ul class="dropdown-menu" >
                            <li><a class="dropdown-item" href="main/vista/busquedac.php?cat=1" name="1">Video Juegos</a></li>
                            <li><a class="dropdown-item" href="main/vista/busquedac.php?cat=2">Celulares</a></li>
                            <li><a class="dropdown-item" href="main/vista/busquedac.php?cat=3">Televisores</a></li>
                            <li><a class="dropdown-item" href="main/vista/busquedac.php?cat=4">Electrodomesticos</a></li>
                            <li><a class="dropdown-item" href="main/vista/busquedac.php?cat=5">Computadoras</a></li>
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

    <?php

        if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
            echo "<h2>Productos en el Carrito:</h2>";
            echo "<ul>";
            $totalCompra = 0;          

            foreach ($_SESSION['carrito'] as $key => $producto) {
                $subtotal = $producto['precio'] * $producto['cantidad'];
                $totalCompra += $subtotal;
        
                echo "<li>{$producto['nombre']} - {$producto['precio']} $ ";
                echo "<form method='post' action='cart.php'>";
                echo "<input type='hidden' name='accion' value='eliminar'>";
                echo "<input type='hidden' name='producto_key' value='$key'>";
                echo "<button type='submit'>Eliminar</button>";
                echo "</form></li>";
            }

            echo "</ul>";
            echo "<p>SubTotal de la compra: $totalCompra</p>";

            echo "<form method='post' action=''>";
            echo "<input type='hidden' name='accion' value=''>";
            echo "<button type='submit'>Comprar</button>";
            echo "</form>";

            
        } else {
            echo "<p>El carrito está vacío.</p>";
        }
  
    ?>
</body>

</html>
