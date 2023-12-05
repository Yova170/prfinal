<?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
  
        echo'<script>window.location.replace("../../login.php");</script>';
        
    }else{
        $nomuser = $_SESSION['usuario'];
    }
?>
<html>
    <button type="button" onclick="if (confirm('¿Estás seguro de que quieres cerrar la sesión?')) { location.href='logout.php'; }">Cerrar sesión</button>
</html>