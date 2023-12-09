<?php
    require '../../db.php';
    session_start();

    // Obtener información del usuario para llenar el formulario
    $user = $_SESSION['usuario'];
    $sql = "SELECT * FROM administradores WHERE usuario = '$user'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $usuarioInfo = $result->fetch_assoc();
    } else {
        // Manejo del error si no se encuentra el usuario
        echo "Error al obtener la información del usuario.";
        exit;
    }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="main/ccs/perfil.css">
</head>

<body>
    <?php include '../html/superiorBar.php'; ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar-->
                <div class="author-card pb-3">
                    <div class="author-card-profile">
                        <div class="author-card-avatar"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg"><?php echo $usuarioInfo['nombre'] . ' ' . $usuarioInfo['apellido']; ?></h5>
                            <span class="author-card-position"><?php echo $usuarioInfo['usuario']; ?></span>
                        </div>
                    </div>
                </div>
                <div class="wizard">
                    <nav class="list-group list-group-flush">
                        <a class="list-group-item active" href="#">
                            <div class="d-flex justify-content-between align-items-center">
                                <div><i class="fa fa-shopping-bag mr-1 text-muted"></i>
                                    <div class="d-inline-block font-weight-medium text-uppercase">Ordenes Activas</div>
                                </div><span class="badge badge-secondary">6</span>
                            </div>
                        </a>
                        <a class="list-group-item" href="main/account/passx.php"><i class="fa fa-user text-muted"></i> Información</a>
                        <a class="list-group-item" onclick="if (confirm('¿Estás seguro de que quiere darce baja?')) { location.href='main/account/bajaa.php'; }"><i class="fas fa-exclamation text-muted"></i> Darse de baja</a>
                        <a class="list-group-item" href="main/account/logout.php"><i class="fas fa-sign-out-alt text-muted"></i> Cerrar Sesión</a>
                    </nav>
                </div>
            </div>
            <!-- Profile Settings-->
            <div class="col-lg-8 pb-5">
                <form method="post" action="ver.php" class="row" autocomplete="off">
                    <!-- Aquí van los campos para editar nombre, apellido, teléfono, dirección, etc. -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-fn">Nombre</label>
                            <input class="form-control" type="text" id="account-fn" name="nombre" value="<?php echo $usuarioInfo['nombre']; ?>" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-ln">Apellido</label>
                            <input class="form-control" type="text" id="account-ln" name="apellido" value="<?php echo $usuarioInfo['apellido']; ?>" required="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-email">E-mail</label>
                            <input class="form-control" type="email" id="account-email" name="correo" value="<?php echo $usuarioInfo['correo']; ?>" required="" autocomplete="off">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-phone">Telefono</label>
                            <input class="form-control" type="text" id="account-phone" name="telefono" value="<?php echo $usuarioInfo['telefono']; ?>" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="account-address">Direccion</label>
                            <input class="form-control" type="text" id="account-address" name="direccion" value="<?php echo $usuarioInfo['direccion']; ?>" required="" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-pass">Antigua Contraseña</label>
                            <input class="form-control" type="password" name="contrasenao" placeholder="Antigua Contrasena" autocomplete="off"><br><br>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="account-confirm-pass">Nueva Contraseña</label>
                            <input class="form-control" type="password" name="contrasenan" placeholder="Nueva Contrasena"><br><br>
                        </div>
                    </div>

                    <div class="col-12">
                        <hr class="mt-2 mb-3">
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                            <button class="btn btn-style-1 btn-primary" type="submit" name="guardar" data-toast="" data-toast-position="topRight" data-toast-type="success" data-toast-icon="fe-icon-check-circle" data-toast-title="Success!" data-toast-message="Información actualizada">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
