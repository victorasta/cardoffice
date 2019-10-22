<?php
require_once 'models/Cliente.php';
require_once 'models/usuario.php';
Database::initialize();
class usuarioController{

    public function index(){
        require_once 'views/Usuario/registro.php';
    }

    public function save(){
        if(isset($_POST)){
            $cliente = new Cliente();
            $cliente->setNombre($_POST['nombre']);
            $cliente->setApellido($_POST['apellidos']);
            $cliente->setCorreo($_POST['correo']);
            $cliente->setPassword($_POST['password']);
            if($cliente->save()){
                echo " registro ingresado";
            }else{
                 echo "segui intentando";
            }
        }
    }

    public function login(){
       if(isset($_POST)){
        $usuario = new usuario();
         $resultado = $usuario->login($_POST['correo'],$_POST['password']);
          if($resultado && is_object($resultado)){
             if(($resultado->estado)=='activo'){
                $_SESSION['usuario'][] = array("nombre"=>$resultado->nombre,"id_rol"=>$resultado->id_rol,"id_persona"=>$resultado->persona);
                 if(($resultado->id_rol)==4){
                    header("Location:".base_url);
                 }else{
                    header('Location:'.base_url.'cardoffice/home');         
                 }
             }else if(($resultado->estado)=="inactivo"){
                header('Location:'.base_url.'cardoffice/login');  
             }else{
                header('Location:'.base_url.'cardoffice/login');  
             }
         }else{
            header('Location:'.base_url.'cardoffice/login');  
         }
       }  
    }  

    public function close(){
        session_destroy();
        header("Location:".base_url);   
    }

    
}

function error($titulo,$mensaje){
    $alert="
   <script>
         $(function(){
           Swal.fire({
               type: 'error',
               title: '".$titulo."',
               text: '".$mensaje."',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'OK!'
            })
            })
   </script>";
   return $alert;
}