<?php 
include 'controllers/ErrorController.php'; #El controlador de errores es imprescindible
try {
    ob_start();
    session_start();
    #require_once 'autoload.php';
    require_once 'config/db.php';
    require_once 'config/constants.php';
    require_once 'config/Cargar.php';
    if (isset($_GET['data']) && $_GET['data'] != '') {
        $data = explode('/', $_GET['data']);
        if (count($data) < 1) {
            $nombre_controlador = DEFAULT_CONTROLLER;
            $action = DEFAULT_ACTION;
        } else if (count($data) < 2) {
            $nombre_controlador = trim($data[0]) != '' ? $data[0] : DEFAULT_CONTROLLER;
            $action = DEFAULT_ACTION;
        } else {
            $nombre_controlador = trim($data[0]) != '' ? $data[0] : DEFAULT_CONTROLLER;
            $action = trim($data[1]) != '' ? $data[1] : DEFAULT_ACTION;
        }
    } else {
        $nombre_controlador = DEFAULT_CONTROLLER;
        $action = DEFAULT_ACTION;
    }
    if (!file_exists('controllers/' . $nombre_controlador . '.php'))
        throw new Exception("No se encontró <b><i>" . $nombre_controlador .' / '. $action . '</i></b>');

    include_once 'controllers/' . $nombre_controlador . '.php';
    if (class_exists($nombre_controlador)) {
        $controlador = new $nombre_controlador();
        if (method_exists($controlador, $action)) {
            $controlador->$action();
        } else {
            throw new Exception("No se encontró <b><i>" . $nombre_controlador .' / '. $action . '</i>. '. password_hash("12345", PASSWORD_BCRYPT).'</b>');
        }
    } else {
        throw new Exception("(?) No se encontró <b><i>" . $nombre_controlador . '</i></b>');
    }
} catch (Exception $e) {
    $error = new errorController($e->getMessage());
    $error->index();
    exit();
}
