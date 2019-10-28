<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';

if(isset($_GET['data']) && $_GET['data'] != ''){
$data = explode('/', $_GET['data']);
if(count($data) < 1){
    $nombre_controlador = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
}
else if(count($data) < 2){
    $nombre_controlador = trim($data[0]) != '' ? $data[0].'Controller' : DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
}
else{
    $nombre_controlador = trim($data[0]) != '' ? $data[0].'Controller' : DEFAULT_CONTROLLER;
    $action = trim($data[1]) != '' ? $data[1] : DEFAULT_ACTION;
}
}
else{
    $nombre_controlador = DEFAULT_CONTROLLER;
    $action = DEFAULT_ACTION;
}

if (class_exists($nombre_controlador)) {
    $controlador = new $nombre_controlador();
    if (method_exists($controlador, $action)) {
        $controlador->$action();
    }
else {
        $error = new errorController();
        $error->index();
    }
} else {
    $error = new errorController();
    $error->index();
    exit();
} 
