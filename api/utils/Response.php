<?php
class Response {
    public static function sendJsonResponse($data) {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit();
    }

    public static function sendNotFoundResponse() {
        header('HTTP/1.1 404 Not Found');
        exit();
    }

    public static function sendBadRequestResponse($message) {
        header('HTTP/1.1 400 Bad Request');
        echo json_encode(array('error' => $message));
        exit();
    }
}
?>
