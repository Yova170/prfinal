<?php
session_start();
    require 'db.php';

    $user=$_POST['usuario'];
    $pass= $_POST['contrasena'];

    $validar = mysqli_query($conn, "SELECT * FROM `clientes` WHERE usuario='$user' and contrasena='$pass' ");

    if(mysqli_num_rows($validar)> 0 ){
        $row = mysqli_fetch_assoc($validar);
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];

        $_SESSION['usuario']=$user ;
        header("location: index.php");
    }else {
       
            echo '
                <script>
                    alert("Usuario no Encontrado, Verifique los Datos Introducidos");
                    window.location = "login.php";
                </script>
            ';
               exit();
        
    }
?>