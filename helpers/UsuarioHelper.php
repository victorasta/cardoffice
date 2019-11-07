<?php
class UsuarioHelper
{

    public function verificar_sesion($id_modulo, $priv = FALSE, $ret = FALSE)
    {
        if (!isset($_SESSION['ID_USUARIO']) || trim($_SESSION['ID_USUARIO']) == '') {
            if ($ret == FALSE) {
                header('Location: ' . base_url . 'login');
                exit();
            } else {
                return FALSE;
            }
        }
        Cargar::Modelo('UsuarioModel');
        $usuariomodel = new UsuarioModel();
        if ($usuariomodel->consultar_usuario($_SESSION['ID_USUARIO'], $id_modulo, $priv) === FALSE) {
            if ($ret == FALSE) {
                throw new Exception("Acceso denegado");
            } else {
                return FALSE;
            }
        }
        return TRUE;
    }
    public function consultar_items_menu_usuario($id_mod = FALSE)
    {
        Cargar::Modelo("UsuarioModel");
        $usuariomodel = new UsuarioModel();
        $modulos = $usuariomodel->consultar_items_menu_usuario($_SESSION['ID_USUARIO']);
        $menu = '';
        foreach ($modulos as $modulo) {
            $id_dependientes = explode('___', $modulo['ID_DEPENDIENTES']);
            $nombre_dependientes = explode('___', $modulo['NOMBRE_DEPENDIENTES']);
            $url_dependientes = explode('___', $modulo['URL_DEPENDIENTES']);
            $icono_dependientes = explode('___', $modulo['ICONO_DEPENDIENTES']);
            $menu .= '<li class="nav-item ' . ($modulo['URL_MODULO'] == '#' ? 'has-treeview' : '') . '">
         <a href="' . base_url . $modulo['URL_MODULO'] . '" class="nav-link' . ($modulo['URL_MODULO'] != '#' ? ($id_mod !== FALSE ? $modulo['ID_MODULO'] == $id_mod ? ' active' : '' : '') : ($id_mod !== FALSE ? in_array($id_mod, $id_dependientes) ? ' active' : '' : '')) . '">
             <i class="' . $modulo['ICONO_MODULO'] . '"></i>
             <p>
                 ' . $modulo['NOMBRE_MODULO'] . '' . ($modulo['URL_MODULO'] == '#' ? '<i class="fas fa-angle-left right"></i>' : '') . '
             </p>
         </a>';
            if ($modulo['URL_MODULO'] == '#') {
                $menu .= '<ul class="nav nav-treeview">';
                for (
                    $i = 0;
                    $i < count($nombre_dependientes)
                        && trim($id_dependientes[$i]) != ''
                        && trim($nombre_dependientes[$i]) != ''
                        && trim($url_dependientes[$i]) != ''
                        && trim($icono_dependientes[$i]) != '';
                    $i++
                ) {
                    $menu .= '<li class="nav-item">
                      <a href="' . base_url . $url_dependientes[$i] . '" class="nav-link' . ($id_mod !== FALSE ? $id_dependientes[$i] == $id_mod ? ' active' : '' : '') . '">
                           <i class="far fa-circle nav-icon"></i>
                           <p>' . $nombre_dependientes[$i] . '</p>
                      </a>
                 </li>';
                }
                $menu .= '</ul>';
            }
            $menu .= '</li>';
        }
        return $menu;
    }
    function consultar_informacion_usuario()
    {
        Cargar::Modelo("UsuarioModel");
        $usuarioModel = new UsuarioModel();
        $informacion_usuario = $usuarioModel->consultar_informacion_usuario($_SESSION['ID_USUARIO']);
        if ($informacion_usuario == FALSE)
            return array('nombre' => '', 'rol' => '');
        else
            return array(
                'nombre' => htmlentities($informacion_usuario->nombre, ENT_QUOTES) . ' ' . htmlentities($informacion_usuario->apellido, ENT_QUOTES), 'rol' => htmlentities($informacion_usuario->NOMBRE_ROL, ENT_QUOTES)
            );
    }
}
