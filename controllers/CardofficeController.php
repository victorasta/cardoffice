<?php

class cardofficeController
{
     public function index()
     {
          Database::initialize();
          if ((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol'] != 4)) {
               require_once 'views/layouts/header.php';
               require_once 'views/layouts/slideBar.php';
          } else {
               require_once 'views/layoutsCliente/header.php';
               require_once 'views/layoutsCliente/navbar.php';
          }
          require_once 'views/Publico/home.php';
          if ((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol'] != 4)) {
               require_once 'views/layouts/footer.php';
          } else {
               require_once 'views/layoutsCliente/footer.php';
          }
     }

     public function prueba_transaccion()
     {
          Database::initialize();
          require_once 'models/transactions/T_Cliente.php';
          try {
               Database::get()->begin_transaction();
               T_Cliente::SendToTrans();
               Database::get()->commit();
          } catch (Exception $e) {
               echo "Insertar $e en tabla de errores";
               try {
                    Database::get()->rollback();
               } catch (Exception $e2) {
                    echo $e2;
               }
          }
     }
     public function catalogo()
     {
          require_once 'views/Publico/productos.php';
     }
     public function detalle()
     {
          require_once 'views/Publico/detalle.php';
     }

     public function informacion()
     {
          require_once 'views/Publico/nosotros.php';
     }

     public function carrito()
     {
          require_once 'views/Publico/carrito.php';
     }

     public function compras()
     {
          require_once 'views/Publico/compras.php';
     }

     public function login()
     {
          Database::initialize();
          if ((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol'] != 4)) {
               require_once 'views/layouts/header.php';
               require_once 'views/layouts/slideBar.php';
          } else {
               require_once 'views/layoutsCliente/header.php';
               require_once 'views/layoutsCliente/navbar.php';
          }
          require_once 'login.php';
          if ((isset($_SESSION['usuario']) && $_SESSION['usuario'][0]['id_rol'] != 4)) {
               require_once 'views/layouts/footer.php';
          } else {
               require_once 'views/layoutsCliente/footer.php';
          }
     }

     public function Home()
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
                    require_once 'views/Producto/listaProducto.php';
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
