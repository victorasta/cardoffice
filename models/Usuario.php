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
         $this->estado =$estado;
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
      $login= Database::get()->query($sql);
      if($login && $login->num_rows ==1){
         $usuario = $login->fetch_object();
         if(password_verify($password,$usuario->passwrd)){
               if(is_null($usuario->id_empleado) && !is_null($usuario->id_cliente)){
                   $sql="SELECT cl.id as persona ,cl.nombre,cl.apellido ,us.correo,us.id_rol,us.estado, us.id as id_usuario FROM cliente cl,usuario us WHERE us.id_cliente = cl.id AND cl.id ='".$usuario->id_cliente."'";
                   $login= Database::get()->query($sql);
                   $usuario = $login->fetch_object();
                   $resultado = $usuario;
                  }else {
                   $sql="SELECT em.nombre , us.id_rol , us.estado, em.id as persona FROM empleado em , usuario us WHERE em.id = us.id_empleado and us.id_empleado ='".$usuario->id_empleado."'";
                   $login= Database::get()->query($sql);
                   $usuario = $login->fetch_object();
                   $resultado = $usuario;
                  }       
              }
         }
      return $resultado;
    }

    public function consultar_items_menu_usuario(){
       $qry = "SELECT N1.NOMBRE_ITEM, N1.URL_ITEM, N1.ICONO_ITEM, N2.NOMBRE_DEPENDIENTES, N2.URL_DEPENDIENTES, N2.ICONO_DEPENDIENTES
       FROM items N1
       INNER JOIN
       V_PERMISOS PN1
       ON N1.ID_ITEM = PN1.ID_ITEM
       LEFT JOIN
       (
       SELECT
       I.DEPENDENCIA_ITEM,
       GROUP_CONCAT(I.NOMBRE_ITEM ORDER BY I.ID_ITEM SEPARATOR '___') 'NOMBRE_DEPENDIENTES',
       GROUP_CONCAT(I.URL_ITEM ORDER BY I.ID_ITEM SEPARATOR '___') 'URL_DEPENDIENTES',
       GROUP_CONCAT(I.ICONO_ITEM ORDER BY I.ID_ITEM SEPARATOR '___') 'ICONO_DEPENDIENTES'
       FROM items I
       INNER JOIN V_PERMISOS PN2
       ON I.ID_ITEM = PN2.ID_ITEM
       WHERE I.NIVEL_ITEM = 2
       AND PN2.ID = ?
       AND (PN2.INSERT_PRIV = 'Y' OR PN2.UPDATE_PRIV = 'Y' OR PN2.DELETE_PRIV = 'Y' OR PN2.SELECT_PRIV = 'Y')
       GROUP BY I.DEPENDENCIA_ITEM
       )N2
       ON N1.ID_ITEM = N2.DEPENDENCIA_ITEM
       WHERE N1.NIVEL_ITEM = 1
       AND PN1.ID = ?
       AND (PN1.INSERT_PRIV = 'Y' OR PN1.UPDATE_PRIV = 'Y' OR PN1.DELETE_PRIV = 'Y' OR PN1.SELECT_PRIV = 'Y')
       ";
       $stmt = Database::get()->prepare($qry);
       $stmt->bind_param("ii", $_SESSION['usuario'], $_SESSION['usuario']);
       $stmt->execute();
      $result = $stmt->get_result();
      while($row = $result->fetch_assoc()){
         $dependientes = explode('___', $row['NOMBRE_DEPENDIENTES']);
         echo 'NOMBRE: '.$row['NOMBRE_ITEM'].'<BR>';
         foreach($dependientes as $d){
            echo 'Dependiente: '.$d.'<br>';
         }
      }
      $stmt->close();
    }
}