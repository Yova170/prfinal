<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['table']))
{
    require '../../db.php';
    if(isset($conn))
    {
        //Solo proceder si se eligió una de las tablas disponibles
        $tablas = array("clientes", "administradores");
        if(in_array($_POST['table'], $tablas, true))
        {
            if(!isset($_POST['action'])) //Si no se está recibiendo una acción de CRUD
            {
                $query_str = 'SELECT * FROM ' . $_POST['table'] . ' LIMIT 5'; //Traer 5 registros de la tabla seleccionada
                
                if(isset($_POST['offset'])) //Agregar offset si se dio uno
                {
                    $offset = $_POST['offset'];
                    if($offset < 0) $offset = 0;
                    $query_str .= ' OFFSET ' . $offset;
                }
                
                $query = mysqli_query($conn, $query_str);
                $result = $query->fetch_all(); //Traer los registros de la BD
                
                if(!isset($_POST['offset'])) //Si no se dio un offset, arregar los encabezados como primera fila
                {
                    $headers = mysqli_query($conn, 'DESCRIBE ' . $_POST['table']);
                    //$result_h = $headers->fetchAll(PDO::FETCH_COLUMN);
                    //$result_h = $headers->fetch_column();
                    
                    $result_h = array();
                    while($row = mysqli_fetch_array($headers))
                    {
                        $result_h[] = $row['Field'];
                    }
                    //$result_h = $headers->fetch_assoc();
                    
                    array_unshift($result, $result_h);
                }
                
                echo json_encode($result); //Devolver registros en formato JSON
            }
            else //Si se está realizando una acción de CRUD
            {
                //Quitar variables de tabla y accion del POST y guardarlas en variables auxiliares
                //para usar el POST directamente con el prepared statement
                $table = $_POST['table'];
                $action = $_POST['action'];
                unset($_POST['table']);
                unset($_POST['action']);
                
                $sql = "";
                
                if($action == "Add") //Si se pide agregar un registro
                {
                    $sql = "INSERT INTO " . $table;
                    if($table == "clientes")
                    {
                        $sql .= " VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
                    }
                    else
                    {
                        $sql .= " VALUES(?, ?, ?, ?, ?, ?, ?)";
                    }
                }
                elseif($action == "Save") //Si se pide actualizar un registro
                {
                    $sql = "UPDATE " . $table . " SET ";
                    if($table == "clientes")
                    {
                        $sql .= "usuario = ?, correo = ?, contrasena = ?, nombre = ?, apellido = ?, direccion = ?, telefono = ? WHERE cod_usuario = ?";
                    }
                    else
                    {
                        $sql .= "usuario = ?, contrasena = ?, nombre = ?, apellido = ?, direccion = ?, telefono = ? WHERE cod_usuario = ?";
                    }
                }
                elseif($action == "Delete") //Si se pide eliminar un registro
                {
                    $sql = "DELETE FROM " . $table . ' WHERE cod_usuario = ?';
                    //if($table == "clientes") $sql .= 'officeCode = :id';
                    //elseif($table == "user") $sql .= 'codusuario = :id';
                }
                //echo $sql;
                //exit();
                //$statement = mysqli_stmt_init($conn);
                //mysqli_stmt_prepare($statement, $sql);
                
                $statement = $conn->prepare($sql); // prepare
                //$stmt->execute([$email, $password]); 
                
                echo ($statement->execute(array_values($_POST))) ? "success" : "failure"; //Devolver resultado del statement
            }
        }
    }
}
?>