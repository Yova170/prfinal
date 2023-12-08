<?php
    require '../../db.php';
    session_start();

    $user = $_SESSION['usuario'] ;
    $old = $_POST['contrasenao'];
    $new = $_POST['contrasenan'];

    $sql = "SELECT * FROM `clientes` WHERE usuario = '$user'; ";
    $result = $conn->query($sql);

    
    $row = $result->fetch_assoc();
    $xcontra = $row['contrasena'];

    if ($old == $xcontra){
        $sql1 = "UPDATE `clientes` SET `contrasena` = '$new' WHERE `usuario` = '$user'; ";
        $result1 = mysqli_query($conn, $sql1);
        echo'<script>
                alert("Contrasena Cambiada con exito");
                window.location = "micuenta.php";
            </script>';
    } else {
        echo '
                <script>
                    alert("No coninciden las contrasenas actuales");
                    window.location = "passx.php";
                </script>
            ';
    }
?>