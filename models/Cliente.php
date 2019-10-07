<?php

class cliente{
    private $id;
    private $nombre;
    private $apellido;
    private $telefono;
    private $correo;
    private $password;
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
    function getTelefono(){
        return $this->telefono;
    }  
    function setTelefono($telefono){
        $this->telefono = $this->db->real_escape_string($telefono);
    }
    function getCorreo(){
        return $this->correo;
     }
    function setCorreo($correo){
         $this->correo =$this->db->real_escape_string($correo);
    }

    function getPassword(){
        return $this->password;
     }
     function setPassword($password){
         $this->password = password_hash($this->db->real_escape_string($password),PASSWORD_BCRYPT,['cost'=> 4]);
     }

    public function save(){
           $sql = "CALL crear_cliente('{$this->nombre}','{$this->apellido}','{$this->correo}','{$this->password}')";
           $save = $this->db->query($sql);
           $resultado = false;
           if($save){
               $resultado = true;
           }
           return $resultado;
    }
   

}