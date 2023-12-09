<?php
require 'db.php'; // Asegúrate de ajustar la ruta según tu estructura de archivos
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '<script>window.location.replace("login.php");</script>';
} else {
    $nomuser = $_SESSION['usuario'];

    // Consultar la información del administrador desde la base de datos
    $sql = "SELECT * FROM administradores WHERE usuario = '$nomuser'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $administrador = mysqli_fetch_assoc($result);
    } else {
        // Manejo del error si no se encuentra el administrador
        echo "Error al obtener la información del administrador.";
        exit;
    }
}
?>
<html>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

<body>
    <?php include 'main/html/superiorBar.php'; ?>
    <div class="container mb-4 main-container">
        <div class="row">
            <div class="col-lg-4 pb-5">
                <!-- Account Sidebar -->
                <div class="author-card pb-3">
                    <br>
                    <div class="author-card-profile">
                        <div class="author-card-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        </div>
                        <div class="author-card-details">
                            <h5 class="author-card-name text-lg"><?php echo $administrador['nombre']," ", $administrador['apellido']; ?></h5>
                            <span class="author-card-position"><?php echo $administrador['direccion']; ?></span>
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
                    </a><a class="list-group-item" href="main/account/passx.php"><i class="fa fa-user text-muted"></i> Información</a>
                    
                    <a class="list-group-item"  onclick="if (confirm('¿Estás seguro de que quiere darce baja?')) { location.href='main/account/bajaa.php'; }"><i class="fas fa-exclamation  text-muted"></i> Darse de baja</a>
                    <a class="list-group-item" href="main/account/logout.php"><i  class="fas fa-sign-out-alt text-muted"></i> Cerrar Sesión</a></a>
                </nav>
            </div>
        </div><br>
        <!-- Orders Table-->
        <div class="col-lg-8 pb-5">
            <div class="d-flex justify-content-end pb-3">
                <div class="form-inline">
                    <label class="text-muted mr-3" for="order-sort">Sort Orders</label>
                    <select class="form-control" id="order-sort">
                        <option>All</option>
                        <option>Delivered</option>
                        <option>In Progress</option>
                        <option>Delayed</option>
                        <option>Canceled</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Order #</th>
                            <th>Date Purchased</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">78A643CD409</a></td>
                            <td>August 08, 2017</td>
                            <td><span class="badge badge-danger m-0">Canceled</span></td>
                            <td><span>$760.50</span></td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">34VB5540K83</a></td>
                            <td>July 21, 2017</td>
                            <td><span class="badge badge-info m-0">In Progress</span></td>
                            <td>$315.20</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">112P45A90V2</a></td>
                            <td>June 15, 2017</td>
                            <td><span class="badge badge-warning m-0">Delayed</span></td>
                            <td>$1,264.00</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">28BA67U0981</a></td>
                            <td>May 19, 2017</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td>$198.35</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">502TR872W2</a></td>
                            <td>April 04, 2017</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td>$2,133.90</td>
                        </tr>
                        <tr>
                            <td><a class="navi-link" href="#order-details" data-toggle="modal">47H76G09F33</a></td>
                            <td>March 30, 2017</td>
                            <td><span class="badge badge-success m-0">Delivered</span></td>
                            <td>$86.40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    
</html>