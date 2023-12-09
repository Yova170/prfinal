<?php
    require '../../db.php';
    session_start();

    if (isset($_POST['guardar'])) {
        $user = $_SESSION['usuario'];
        $old = $_POST['contrasenao'];
        $new = $_POST['contrasenan'];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $telefono = $_POST["telefono"];
        $direccion = $_POST["direccion"];
        $correo = $_POST["correo"];

        // Obtener la contraseña actual del usuario
        $sqlGetPassword = "SELECT contrasena FROM clientes WHERE usuario = '$user'";
        $resultGetPassword = mysqli_query($conn, $sqlGetPassword);

        if ($resultGetPassword) {
            $row = mysqli_fetch_assoc($resultGetPassword);
            $xcontra = $row['contrasena'];

            // Validar y sanitizar los datos antes de usarlos en las consultas

            // Actualizar la información del usuario
            $sqlUpdateInfo = "UPDATE administradores SET nombre = '$nombre', apellido = '$apellido', telefono = '$telefono', direccion = '$direccion', correo = '$correo' WHERE usuario = '$user'";
            $resultUpdateInfo = mysqli_query($conn, $sqlUpdateInfo);

            // Verificar si la antigua contraseña es correcta y si la nueva contraseña está presente
            if (empty($old)) {
                // Si la casilla de contraseña antigua está en blanco, no se cambia la contraseña
                echo '<script>
                        alert("Información actualizada sin cambiar la contraseña");
                        window.location = "../../micuenta.php";
                    </script>';
            } else {
                // Si la casilla de contraseña antigua no está en blanco, se verifica la antigua contraseña
                if ($old == $xcontra && $resultUpdateInfo) {
                    // Actualizar la contraseña solo si la casilla de nueva contraseña no está en blanco
                    if (!empty($new)) {
                        $sqlUpdatePassword = "UPDATE clientes SET contrasena = '$new' WHERE usuario = '$user'";
                        $resultUpdatePassword = mysqli_query($conn, $sqlUpdatePassword);

                        if ($resultUpdatePassword) {
                            echo '<script>
                                    alert("Contraseña cambiada con éxito");
                                    window.location = "../../micuenta.php";
                                </script>';
                        } else {
                            echo '<script>
                                    alert("Error al cambiar la contraseña");
                                    window.location = "passx.php";
                                </script>';
                        }
                    } else {
                        echo '<script>
                                alert("La nueva contraseña no puede estar en blanco");
                                window.location = "passx.php";
                            </script>';
                    }
                } else {
                    echo '<script>
                            alert("No coinciden las contraseñas actuales");
                            window.location = "passx.php";
                        </script>';
                }
            }
        } else {
            echo '<script>
                    alert("Error al obtener la contraseña actual");
                    window.location = "passx.php";
                </script>';
        }
    } else {
        echo '<script>
                alert("Acceso no autorizado");
                window.location = "passx.php";
            </script>';
    }
?>
