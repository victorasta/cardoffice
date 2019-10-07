<?php

class marca{
    private $id;
    private $nombre;
    private $apellido;
    private $dui;
    private $telefono;
    private $movil;
    private $direccion;
    private $foto;
    private $fecha_registro;
    private $codigo;
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
    
    function getApellido(){
        return $this->apellido;
    }
    function setApellido($apellido){
        $this->apellido = $this->db->real_escape_string($apellido);
    }
    
    function getDui(){
        return $this->dui;
    }
    function setDui($dui){
        $this->dui = $this->db->real_escape_string($dui);
    }

    function getTelefono(){
        return $this->telefono;
    }
    function setTelefono($telefono){
        $this->telefono = $this->db->real_escape_string($telefono);
    } 

    function getMovil(){
        return $this->movil;
    }
    function setMovil($movil){
        $this->movil = $this->db->real_escape_string($movil);
    }

    function getDireccion(){
        return $this->direccion;
    }
    function setDireccion($direccion){
        $this->direccion = $this->db->real_escape_string($direccion);
    }
    
    function getFoto(){
        return $this->foto;
    }
    function setFoto($foto){
        $this->foto = $this->db->real_escape_string($foto);
    }
  
    function getFecha(){
        return $this->fecha_registro;
    }
    function setFecha($fecha){
        $this->fecha_registro = $this->db->real_escape_string($fecha);
    }

    function getCodigo(){
        return $this->Codigo;
    }
    function setCodigo($codigo){
        $this->codigo = $this->db->real_escape_string($codigo);
    }




}