<?php
    require 'db.php';
    session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>UTPS</title>
</head>
<body  class="bg-info container d-flex justify-content-center align-items-center vh-100">
    <div class="bg-white p-5 rounded-4">
   
        <form method="post" action="loginc.php" class="">
            <div>
                <h1 class="p-3">Iniciar sesión</h1>
            </div>
            <div>
                <input type="text" name="usuario" placeholder="Usuario" required ><br><br>
            </div>
            <div>
                <input type="password" name="contrasena" placeholder="Contrasena" required><br><br>
            </div>
            <div class="text-center">
                <input clas="imput-center" type="submit" value="Iniciar sesión">
            </div>
            
            
            
        </form>

        <div class="text-center p-4">
            <a href="newacc.php" >Crear Cuenta</a>
        </div>

    </div>

    

   
</body>
</html>