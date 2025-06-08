<?php

require_once '../database/functions.php';

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
 
$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'GET') {
    $list = getOrderList($conn);

    $data = [
        'status' => 200,
        'list' => $list
    ];

    echo json_encode($data);
} else {
    $data = [
        'status' => 405,
        'message' => $requestMethod . ' Invalid request method. Only GET is allowed.'
    ];

    header('HTTP/1.1 405 Method Not Allowed');
    echo json_encode($data);
}

?>
