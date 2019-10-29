<?php
class Cargar{
    public static function Vista($nombre_vista, $args = array()){
        foreach($args as $key => $value){
            $$key = $value;
        }
        include_once('views/'.$nombre_vista.'.php');
    }
    public static function Modelo($nombre_modelo){
        include_once('models/'.$nombre_modelo.'Model.php');
        
    }
}