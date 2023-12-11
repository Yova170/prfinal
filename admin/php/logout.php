<?php
//Archivo para destruir datos de sesión al cerrar sesión
session_name("adminpanel");
session_start();
session_destroy();
header('Location: ../index.html', true, 303); //Redireccionar al login
die();
?>