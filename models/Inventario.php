<?php

class venta{
    private $id;
    private $detalle;
    private $subtotal;
    private $total;
    private $estado;
    private $fecha_emision;
    private $id_usuario;
    private $id_comprobante;
    private $iva;
    private $id_cliente;
    private $direccion;
    private $tipo_venta;
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

    function getDetalle(){
        return $this->detalle;
    }  
    function setDetalle($detalle){
        $this->detalle = $this->db->real_escape_string($detalle);
    }

    function getSubtotal(){
        return $this->subtotal;
    }  
    function setSubtotal($subtotal){
        $this->subtotal = $this->db->real_escape_string($subtotal);
    }

    function getTotal(){
        return $this->total;
    }  
    function setTotal($total){
        $this->total = $this->db->real_escape_string($total);
    }

    function getEstado(){
        return $this->estado;
    }  
    function setEstado($estado){
        $this->estado = $this->db->real_escape_string($estado);
    }

    function getEmision(){
        return $this->fecha_emision;
    }  
    function setEmision($fecha_emision){
        $this->fecha_emision = $this->db->real_escape_string($fecha_emision);
    }

    function getComprobante(){
        return $this->id_comprobante;
    }  
    function setComprobante($id_comprobante){
        $this->id_comprobante = $this->db->real_escape_string($id_comprobante);
    }

    function getVendedor(){
        return $this->id_usuario;
    }  
    function setVendedor($id_vendedor){
        $this->id_usuario = $this->db->real_escape_string($id_vendedor);
    }

    function getCliente(){
        return $this->id_cliente;
    }  
    function setCliente($id_cliente){
        $this->id_cliente = $this->db->real_escape_string($id_cliente);
    }

    function getDireccion(){
        return $this->direccion;
    }
     function setDireccion($direccion){
        $this->direccion= $this->db->real_escape_string($direccion);
    }

    function getTipoVenta(){
        return $this->tipo_venta;
    }
     function setTipoVenta($tipo_venta){
        $this->tipo_venta= $this->db->real_escape_string($tipo_venta);
    }

    
    
}