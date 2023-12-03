<?php
$servername = "localhost"; 
$username = "root"; //Ususario de base de datos
$password = ""; //Contrasena de la base de datos
$database = "pfinal"; //Nombre de la base de datos


$conn = new mysqli($servername, $username, $password, $database);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}




?>
