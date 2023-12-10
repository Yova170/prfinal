<?php
require 'models/ProductModel.php';

class ProductController {
    private $model;

    public function __construct($conn) {
        $this->model = new ProductModel($conn);
    }

    public function handleGetRequest() {
        // Supongamos que obtienes el ID del cliente empresarial de la solicitud.
        $clientId = isset($_GET['client_id']) ? $_GET['client_id'] : null;

        if ($clientId) {
            $products = $this->model->getProductsForClient($clientId);

            if ($products) {
                Response::sendJsonResponse($products);
            } else {
                Response::sendNotFoundResponse();
            }
        } else {
            Response::sendBadRequestResponse('Se requiere ID del cliente.');
        }
    }
}
?>
