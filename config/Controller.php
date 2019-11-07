<?php
Class Controller{
    protected function cargar_modelo($nombre_modelo){
        $nombre_modelo .= 'Model';
        $modelo = Cargar::Modelo($nombre_modelo);
        $this->$nombre_modelo = $modelo;
    }
}