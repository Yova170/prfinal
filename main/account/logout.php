<?php 

    session_start();
    session_destroy();

    echo "<script>alert('Sesion Cerrada') ;</script>";
    echo "<script>window.location.replace('../../index.php');</script>";
          
 ?>