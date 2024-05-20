<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *'); // CORS Kikapcsolása
header('Access-Control-Allow-Methods: GET, POST');
$keresdolgozo = explode('/', $_SERVER['QUERY_STRING']);
if($keresdolgozo[0] === "dolgozok"){
    require_once 'dolgozok/index.php';
}else{
    http_response_code(405);
    $errotJson = array('message' => 'Nincs ilyen API');
    return json_encode($errotJson);
}