<?php

class oferta{
    private $id_inventario;
    private $id_producto;
    private $fechaInicio;
    private $fechaFinalizacion;
    private $descuento;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    function getId(){
        return $this->id_inventario;
    }  
    function setId($id){
        $this->id_inventario = $id;
    }

    function getIdproducto(){
        return $this->id_producto;
    }  
    function setIdproducto($id_producto){
        $this->id_producto =  $this->db->real_escape_string($id_producto);
    }

    function getFechaInicio(){
        return $this->fechaInicio;
    }
    function setFechaInicio($fechaInicio){
        $this->fechaInicio =  $this->db->real_escape_string($fechaInicio);
    }
    
    function getFechaFinalizacion(){
        return $this->fechaInicio;
    }
    function setFechaFinalizacion($fechaFinal){
        $this->fechaFinalizacion =  $this->db->real_escape_string($fechaFinal);
    }

    function getDescuento(){
        return $this->id_producto;
    }  
    function setDescuento($descuento){
        $this->descuento =  $this->db->real_escape_string($descuento);
    }

}