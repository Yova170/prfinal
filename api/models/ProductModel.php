<?php
require 'utils/Response.php';

class ProductModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getProductsForClient($clientId) {
        // Implementa la lógica para obtener productos según el cliente empresarial

        // Verificar si el cliente existe (puedes tener una tabla 'clientes' y verificar la existencia del cliente)
        if (!$this->isClientExists($clientId)) {
            Response::sendNotFoundResponse('Cliente no encontrado');
        }

       
        $query = "SELECT * FROM clientes_empresariales WHERE id_cliente = ?";

        // Preparar la consulta
        $stmt = $this->conn->prepare($query);

        // Vincular parámetro
        $stmt->bind_param("i", $clientId);

        // Ejecutar la consulta
        $stmt->execute();

        // Obtener resultados
        $result = $stmt->get_result();

        // Cerrar la consulta preparada
        $stmt->close();

        // Verificar si se obtuvieron resultados
        if ($result->num_rows > 0) {
            // Inicializar un array para almacenar los productos
            $products = array();

            // Recorrer los resultados y agregar cada producto al array
            while ($row = $result->fetch_assoc()) {
                $products[] = $row;
            }

            return $products;
        } else {
            return null; // No se encontraron productos para el cliente dado
        }
    }

    private function isClientExists($clientId) {
        // Verificar la existencia del cliente según tu lógica
        // Puedes hacer una consulta a la tabla 'clientes' para verificar si el cliente con el ID dado existe.
        // Devuelve true si existe, false si no.
        $query = "SELECT id_cliente FROM clientes_empresariales WHERE id_cliente = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        return $result->num_rows > 0;
    }
}
?>
