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
            background-color: #E8EBF0;
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

        .login-container {
            width: 400px;
            background-color: white;
            position: relative;
            padding: 20px;
            border-radius: 10px;
            margin-top: 50px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body class="container d-flex justify-content-center align-items-center vh-100">
    <a href="index.php">
    <h1 class="utps-text">UTPSTORE</h1></a>

    <div class="login-container p-5 rounded-4">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="login.php" role="tab"
                aria-controls="pills-login" aria-selected="true">Iniciar sesión</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="tab-register" data-mdb-toggle="pill" href="newacc.php" role="tab"
                aria-controls="pills-register" aria-selected="false">Crear Cuenta</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form method="post" action="loginc.php">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="usuario" class="form-control" />
                        <label class="form-label" for="loginName">Usuario</label>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="contrasena" class="form-control" />
                        <label class="form-label" for="loginPassword">Contraseña</label>
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-block mb-4">Ingresar</button>

                    <!-- Register buttons -->
                    <div class="text-center">
                        <p>¿No tienes cuenta? <a href="newacc.php">Registrate</a></p>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                <!-- Add your registration form here -->
            </div>
        </div>
        <!-- Pills content -->
    </div>
</body>
</html>
