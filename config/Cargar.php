<?php
class Cargar{
    public static function Vista($nombre_vista, $args = array()){
        foreach($args as $key => $value){
            $$key = $value;
        }
        include_once('views/'.$nombre_vista.'.php');
    }
    public static function Modelo($nombre_modelo){
        include_once('models/'.$nombre_modelo.'.php');
        $nombre_modelo = new $nombre_modelo();
        return $nombre_modelo;
    }
    public static function Helper($nombre_helper){
        include_once('helpers/'.$nombre_helper.'Helper.php');
    }
}