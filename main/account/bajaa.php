<?php
    require '../../db.php';
    session_start();

    $user = $_SESSION['usuario'] ;
    $key = $_POST['contrasena'];
   

    $sql = "SELECT * FROM `clientes` WHERE usuario = '$user'; ";
    $result = $conn->query($sql);

    
    $row = $result->fetch_assoc();
    $xcontra = $row['contrasena'];

    if ($key == $xcontra){
        $sql1 = "DELETE FROM clientes WHERE `usuario` = '$user'";
        $result1 = mysqli_query($conn, $sql1);
        echo'<script>
                alert("Cuenta eliminada con exito");
                window.location = "../../index.php";
            </script>';
    } else {
        echo '
                <script>
                    alert("Contasena equivocada");
                    window.location = "micuenta.php";
                </script>
            ';
    }
?>