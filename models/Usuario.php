<?php

class usuario{
    private $id;
    private $correo;
    private $password;
    private $id_rol;
    private $estado;
    private $id_empleado;
    private $id_cliente;
    private $db;

    public function __construct(){
        $this->db=Database::connect();
    }

    function getId(){
       return $this->id;
    }
    function setId($id){
        $this->id =$id;
    }

    function getCorreo(){
        return $this->correo;
     }
    function setCorreo($correo){
         $this->correo =$correo;
    }

    function getPassword(){
        return $this->password;
     }
     function setPassword($password){
         $this->password =$password;
     }

     function getEstado(){
        return $this->estado;
     }
     function setEstado($estado){
         $this->estado =$stado;
     }

     function getIdrol(){
        return $this->id_rol;
     }
     function getIdempleado(){
        return $this->id_empleado;
     }
     function getIdcliente(){
        return $this->id_cliente;
     }

     
     public function login($correo,$password){
      $resultado = false;
      $sql ="SELECT * FROM usuario where correo="."'$correo'";     
      $login= $this->db->query($sql);
      if($login && $login->num_rows ==1){
         $usuario = $login->fetch_object();
         if(password_verify($password,$usuario->passwrd)){
               if(is_null($usuario->id_empleado) && !is_null($usuario->id_cliente)){
                   $sql="SELECT cl.id as persona ,cl.nombre,cl.apellido ,us.correo,us.id_rol,us.estado, us.id as id_usuario FROM cliente cl,usuario us WHERE us.id_cliente = cl.id AND cl.id ='".$usuario->id_cliente."'";
                   $login= $this->db->query($sql);
                   $usuario = $login->fetch_object();
                   $resultado = $usuario;
                  }else {
                   $sql="SELECT em.nombre , us.id_rol , us.estado, em.id as persona FROM empleado em , usuario us WHERE em.id = us.id_empleado and us.id_empleado ='".$usuario->id_empleado."'";
                   $login= $this->db->query($sql);
                   $usuario = $login->fetch_object();
                   $resultado = $usuario;
                  }       
              }
         }
      return $resultado;
    }
}