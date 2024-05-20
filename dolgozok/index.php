<?php
switch($_SERVER['REQUEST_METHOD']){
    case "GET":
        require_once 'dolgozok/getdolgozo.php';
        break;
    case "POST":
        require_once 'dolgozok/postdolgozo.php';
        break;
    default:
        break;
}