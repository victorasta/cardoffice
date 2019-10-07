<?php
class devoluciones{
    private $id;
    private $detalle;
    private $fecha_ingreso;
    private $cliente;
    private $id_empleado;

    public function __construct(){
        $this->db=Database::connect();
    }

    function getId(){
        return $this->id;
    }  
    function setId($id){
        $this->id = $id;
    }

    function getDetalle(){
        return $this->detalle;
    }  
    function setDetalle($detalle){
        $this->detalle = $this->db->real_escape_string( $detalle);
    }

    function getFecha_ingreso(){
        return $this->fecha_ingreso;
    }  
    function setFecha_ingreso($fecha_ingreso){
        $this->fecha_ingreso =  $this->db->real_escape_string($fecha_ingreso);
    }
    function getCliente(){
        return $this->cliente;
    }  
    function setCliente($cliente){
        $this->cliente =  $this->db->real_escape_string($cliente);
    }
    function getEmplado(){
        return $this->id_empleado;
    }  
    function setEmpleado($id_empleado){
        $this->id_empleado =  $this->db->real_escape_string($id_empleado);
    }


}
