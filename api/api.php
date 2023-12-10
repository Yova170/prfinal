<?php
require 'db.php';
require 'controllers/ProductController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ($uri[1] !== 'api' || $uri[2] !== 'v1') {
    header('HTTP/1.1 404 Not Found');
    exit();
}

$requestMethod = $_SERVER['REQUEST_METHOD'];

$productController = new ProductController($conn);

switch ($requestMethod) {
    case 'GET':
        $productController->handleGetRequest();
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
        break;
}
?>
