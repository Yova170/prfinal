<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password']))
{
    session_name("adminpanel");
    session_start();
    if(isset($_SESSION['cod_usuario'])) //Verificar si ya había una sesión existente y destruirla
    {
        session_destroy();
    }
    require '../../db.php';
    if(isset($conn))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = 'SELECT * FROM administradores WHERE usuario = ?'; //Verificar que las credenciales existen en la BD
    
        $statement = $conn->prepare($sql);
        $statement->bind_param('s', $username);
        $statement->execute();
        $result = $statement->get_result();
        $usuario = $result->fetch_assoc();
    
        if ($usuario) //Si el usuario existe
        {
        	if($usuario['contrasena'] == $password) //Si la contraseña es la indicada
        	{
        	    session_start();
        	    $_SESSION['cod_usuario'] = $usuario['cod_usuario']; //Crear variables de sesión con datos del usuario
        	    $_SESSION['usuario'] = $usuario['usuario'];
        	    $_SESSION['contrasena'] = $usuario['contrasena'];
        	    $_SESSION['nombre'] = $usuario['nombre'];
        	    $_SESSION['apellido'] = $usuario['apellido'];
        	    
        	    echo "success";
        	    return;
        	}
        }
    }
}
echo "error"; //Si falló la comprobación en algún punto
?>