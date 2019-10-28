<?php
class empleadoController{
    public function index(){
        echo "Controllador de empleado, accion index";
    }
    public function save(){    
    }

    public function update(){    
    }

    public function destroy(){  
    }


    public function newEmpleado()
     {
          Database::initialize();
          if ((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol'] != 4)) {
               require_once 'views/layouts/header.php';
               require_once 'views/layouts/slideBar.php';
          } else {
               require_once 'views/layoutsCliente/header.php';
               require_once 'views/layoutsCliente/navbar.php';
          }
          if (isset($_SESSION['usuario'])) {
               if ($_SESSION['usuario'][0]['id_rol'] == 4) {
                    require_once 'views/error404.php';
               } else {
                    require_once 'views/Empleado/nuevoEmpleado.php';
               }
          } else {
               require_once 'views/error404.php';
          }
          if ((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol'] != 4)) {
               require_once 'views/layouts/footer.php';
          } else {
               require_once 'views/layoutsCliente/footer.php';
          }
     }
}