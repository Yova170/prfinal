<?php
require 'db.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>UTPS</title>
    <style>
        body {
            background-color: #E8EBF0; /* Cambié el color de fondo */
        }

        .utps-text {
            position: absolute;
            top: 60px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 50px;
            font-weight: bold;
            color: #3B789F;
        }

        .registration-container {
            width: 450px;
            background-color: white;
            position: relative;
            padding: 20px;
            border-radius: 10px;
            margin-top: 250px;
        }

        .imput-center {
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container d-flex justify-content-center align-items-center vh-100">
    <a href="index.php">
    <h1 class="utps-text">UTPSTORE</h1></a>
    <div class="registration-container p-5 rounded-4">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab"
                aria-controls="pills-login" aria-selected="false">Iniciar sesión</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="newacc.php" role="tab"
                aria-controls="pills-register" aria-selected="true">Crear Cuenta</a>
            </li>
        </ul>
        <!-- Pills navs -->
        <form method="post" action="registro.php">
            <div class="form-group">
                <input type="text" name="usuario" placeholder="Usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="correo" placeholder="Correo" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" name="pass" placeholder="Contraseña" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="nombre" placeholder="Nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="apellido" placeholder="Apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="direccion" placeholder="Dirección" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="text" name="cell" pattern="[0-9]{8}" placeholder="Teléfono" class="form-control" required>
            </div>
            <div class="form-group text-center">
                <input class="btn btn-primary" type="submit" value="Registrarse"> <!-- Añadí la clase de Bootstrap al botón -->
            </div>
        </form>

        <div class="text-center">
            <a href="login.php">Iniciar Sesión</a>
        </div>
    </div>
</body>
</html>
