<?php
//Archivo para verificar que se inició sesión, de otra manera redireccionar a login
session_name("adminpanel");
session_start();
if(!isset($_SESSION['cod_usuario']))
{
    header('Location: index.html', true, 303);
    die();
}
?>