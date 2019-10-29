<?php

class Oficina
{
     public function index()
     {
          $this->Home();
     }

     public function prueba_transaccion()
     {
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

     public function login()
     {
          Cargar::Vista('login');
          /*           Database::initialize();
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
          } */
     }

     public function Home()
     {
          if (!isset($_SESSION['ID_USUARIO'])) {
               header('location:' . base_url . 'login');
               exit();
          }
          Database::initialize();
          require_once('models/UsuarioModel.php');
          $usuario = new UsuarioModel();
          $modulos = $usuario->consultar_items_menu_usuario();
          $data['menu'] = '';

          foreach ($modulos as $modulo) {
               $nombre_dependientes = explode('___', $modulo['NOMBRE_DEPENDIENTES']);
               $url_dependientes = explode('___', $modulo['URL_DEPENDIENTES']);
               $icono_dependientes = explode('___', $modulo['ICONO_DEPENDIENTES']);
               $data['menu'] .= '<li class="nav-item has-treeview">
			<a href="'.$modulo['URL_MODULO'].'" class="nav-link">
				<i class="'.$modulo['ICONO_MODULO'].'"></i>
				<p>
					'.$modulo['NOMBRE_MODULO'].'
					<i class="fas fa-angle-left right"></i>
				</p>
			</a>
			<ul class="nav nav-treeview">';
			for($i=0; $i < count($nombre_dependientes); $i++){
				$data['menu'] .= '<li class="nav-item">
				<a href="#" class="nav-link">
					<i class="far fa-circle nav-icon"></i>
					<p>'.$nombre_dependientes[$i].'</p>
				</a>
			</li>';
			}
			$data['menu'] .= '</ul>
               </li>';
               $data['title'] = 'Inicio';
               Cargar::Vista('templates/header', $data);
               Cargar::Vista('home', $data);
               Cargar::Vista('templates/footer', $data);
          }
     }
}
