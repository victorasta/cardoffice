<?php
class Reportes extends Controller
{
    function __construct()
    {
        Cargar::Helper('Usuario');
    }
    public function roles()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        $usuario_helper->verificar_sesion(MODULO_REP_ROLES, SELECT_PRIV);
        $data['menu'] = $usuario_helper->consultar_items_menu_usuario(MODULO_REP_ROLES);
        $data['title'] = 'Roles';
        $data['usuario'] = $usuario_helper->consultar_informacion_usuario();
        $data['scripts'] = array(base_url . 'assets/dist/js/pages/reportes.js');
        Cargar::Vista('templates/header', $data);
        Cargar::Vista('reportes/roles', $data);
        Cargar::Vista('templates/footer', $data);
        Database::close();
    }

    public function consultar_roles()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        if (!$usuario_helper->verificar_sesion(MODULO_REP_ROLES, SELECT_PRIV, TRUE)) {
            echo json_encode([
                'error' => 'Sin acceso concedido'
            ]);
            return;
        }
        $this->cargar_modelo('Reportes');
        $this->cargar_modelo('Usuario');
        $roles = $this->ReportesModel->consultar_roles();
        $permisos = $this->UsuarioModel->consultar_permisos_usuario($_SESSION['ID_USUARIO'], MODULO_REP_ROLES);
        Database::close();
        echo json_encode([
            'roles' => $roles,
            'permisos' => $permisos
        ]);
    }

    public function exportar_tabla_pdf()
    {
        include_once 'assets/plugins/mpdf/vendor/autoload.php';
        // if (!isset($_POST['data'])) {
        //     echo json_encode([
        //         'error' => 'No data'
        //     ]);
        //     return;
        // }
        // $error = NULL;
        // try {
        //     $tabla = '<table>';
            
        //     $tabla .= '</table>';
        // } catch (Exception $e) {
        //     $error = $e->getMessage();
            
        // } finally {
            
        //     echo json_encode([
        //         'error' => $error
        //     ]);
        // }
        // $tabla = '<table>';
        // $tabla .= strval($_POST['tabla']);
        // $tabla .= '</table>';
        
        // #$mpdf = new \Mpdf\Mpdf();
        $html='<p><span>EJEMPLO</span>';

        // Create an instance of the class:
        $mpdf = new \Mpdf\Mpdf();

        // Write some HTML code:
        $mpdf->WriteHTML($html);
        // Output a PDF file directly to the browser
        $mpdf->Output();
        
    }

    public function consultar_marca()
    {
        if (!isset($_POST['id_marca']) || $_POST['id_marca'] == '' || !is_numeric($_POST['id_marca'])) {
            echo json_encode([
                'error' => 'ID de marca requerida'
            ]);
            return;
        }
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        if (!$usuario_helper->verificar_sesion(MODULO_MARCAS, SELECT_PRIV, TRUE)) {
            echo json_encode([
                'error' => 'Sin acceso concedido'
            ]);
            return;
        }
        $this->cargar_modelo('Marca');
        $marca = $this->MarcaModel->consultar_marca($_POST['id_marca']);
        Database::close();
        echo json_encode([
            'ID_MARCA' => $marca->ID_MARCA,
            'NOMBRE_MARCA' => $marca->NOMBRE_MARCA,
            'ESTADO_MARCA' => $marca->ESTADO_MARCA
        ]);
    }
    public function eliminar_marca()
    {
        if (!isset($_POST['id_marca']) || $_POST['id_marca'] == '' || !is_numeric($_POST['id_marca'])) {
            echo json_encode([
                'error' => 'ID de marca requerida'
            ]);
            return;
        }
        $error = NULL;
        try {
            Database::initialize();
            $usuario_helper = new UsuarioHelper();
            if (!$usuario_helper->verificar_sesion(MODULO_MARCAS, DELETE_PRIV, TRUE)) {
                throw new Exception("Sin acceso permitido");
            }
            Database::get()->autocommit(FALSE);
            Database::get()->begin_transaction();
            Cargar::Modelo('Marca');
            $marcaModel = new MarcaModel();
            $marcaModel->eliminar_marca($_POST['id_marca']);
            Database::get()->commit();
        } catch (Exception $e) {
            $error = $e->getMessage();
            try {
                Database::get()->rollback();
            } catch (Exception $e2) {
                $error .=  '. ' . $e2->getMessage();
            }
        } finally {
            Database::close();
            echo json_encode([
                'error' => $error
            ]);
        }
    }
    public function guardar_marca()
    {
        if (
            !isset($_POST['nombre_marca']) || trim($_POST['nombre_marca']) == ''
            || !isset($_POST['estado_marca']) || trim($_POST['estado_marca']) == ''
            || (isset($_POST['id_marca']) &&  trim($_POST['id_marca']) != '' ? !is_numeric($_POST['id_marca']) : FALSE)
        ) {
            echo json_encode([
                'error' => 'Verifique su entrada.'
            ]);
            return;
        }
        $error = NULL;
        try {
            Database::initialize();
            $usuario_helper = new UsuarioHelper();
            if (!$usuario_helper->verificar_sesion(MODULO_MARCAS, ($_POST['id_marca'] == '' ? INSERT_PRIV : UPDATE_PRIV), TRUE)) {
                throw new Exception("Sin acceso permitido");
            }
            Database::get()->autocommit(FALSE);
            Database::get()->begin_transaction();
            Cargar::Modelo('Marca');
            $marcaModel = new MarcaModel();
            $nombre_marca = mb_strtoupper($_POST['nombre_marca'], 'utf-8');
            $estado_marca = mb_strtoupper($_POST['estado_marca'], 'utf-8');
            $estado_marca = $estado_marca != 'A' && $estado_marca != 'I' ? 'I' : $estado_marca;
            if ($_POST['id_marca'] == '')
                $marcaModel->insertar_marca($nombre_marca, $estado_marca);
            else
                $marcaModel->actualizar_marca($_POST['id_marca'], $nombre_marca, $estado_marca);
            Database::get()->commit();
        } catch (Exception $e) {
            $error = $e->getMessage();
            try {
                Database::get()->rollback();
            } catch (Exception $e2) {
                $error .=  '. ' . $e2->getMessage();
            }
        } finally {
            Database::close();
            echo json_encode([
                'error' => $error
            ]);
        }
    }

    public function save()
    { }

    public function update()
    { }

    public function destroy()
    { }
}
