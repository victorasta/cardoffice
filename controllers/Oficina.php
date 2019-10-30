<?php

class Oficina
{
     function __construct()
     {
          Cargar::Helper("Usuario");
     }
     public function index()
     {
          $this->Home();
     }

     public function prueba_transaccion()
     {
          throw new Exception("Excepción de la transacción");
          Database::initialize();
          require_once 'models/transactions/T_Cliente.php';
          try {
               Database::get()->autocommit(FALSE);
               Database::get()->begin_transaction();

               //CONJUNTO DE INSTRUCCIONES DE LOS MODELOS A EJECUTAR
               T_Cliente::SendToTrans();
               #Usuario_model->Insertar_usuario(10, 'Carlos', 'Baires');
               #Cliente_model->Eliminar_cliente(15);
               //FIN DEL CONJUNTO DE INSTRUCCIONES DE LOS MODELOS A EJECUTAR

               Database::get()->commit();
          } catch (Exception $e) {
               echo "Hubo un problema. " . $e->getMessage();
               try {
                    Database::get()->rollback();
               } catch (Exception $e2) {
                    echo $e2->getMessage();
               }
          } finally {
               try {
                    Database::get()->close();
               } catch (Exception $e3) {
                    echo $e3->getMessage();
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
     public function Home()
     {
          Database::initialize();
          $usuario_helper = new UsuarioHelper();
          $usuario_helper->verificar_sesion(MODULO_INICIO, SELECT_PRIV);     
          $data['menu'] = $usuario_helper->consultar_items_menu_usuario(MODULO_INICIO);
          $data['title'] = 'Inicio';
          Cargar::Vista('templates/header', $data);
          Cargar::Vista('home', $data);
          Cargar::Vista('templates/footer', $data);
     }
}
