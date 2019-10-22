<?php
ob_start();
session_start();
require_once 'autoload.php';
require_once 'config/db.php';
require_once 'config/parametros.php';
if (!isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = controller_default;
    $action = action_default;
} else if (isset($_GET['controller']) && !isset($_GET['action'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
    $action = action_default;
} else if (isset($_GET['controller']) && isset($_GET['action'])) {
    $nombre_controlador = $_GET['controller'] . 'Controller';
    $action = $_GET['action'];
} else {
    $error = new errorController();
    $error->index();
    exit();
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
