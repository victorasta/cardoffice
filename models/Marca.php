<?php

class marca{
    private $id;
    private $nombre;
    private $estado;
    private $db;
    
    public function __construct(){
        $this->db=Database::connect();
    }

    function getId(){
        return $this->id;
    }  
    function setId($id){
        $this->id = $id;
    }
    
    function getNombre(){
        return $this->nombre;
    }
    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function getEstado(){
        return $this->estado;
    }
    function setEstado($estado){
        $this->estado = $this->db->real_escape_string($estado);
    }

}