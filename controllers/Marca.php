<?php
class Marca
{
    function __construct()
    {
        Cargar::Helper('Usuario');
    }
    public function index()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        $usuario_helper->verificar_sesion(MODULO_MARCAS, SELECT_PRIV);
        $data['menu'] = $usuario_helper->consultar_items_menu_usuario(MODULO_MARCAS);
        $data['title'] = 'Marcas';
        $data['usuario'] = $usuario_helper->consultar_informacion_usuario();
        $data['scripts'] = array(base_url . 'assets/dist/js/pages/marcas.js');
        Cargar::Vista('templates/header', $data);
        Cargar::Vista('producto/marcas', $data);
        Cargar::Vista('templates/footer', $data);
        Database::close();
    }

    public function consultar_marcas()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        if (!$usuario_helper->verificar_sesion(MODULO_MARCAS, SELECT_PRIV, TRUE)) {
            echo json_encode([
                'error' => 'Sin acceso concedido'
            ]);
            return;
        }
        Cargar::Modelo('Marca');
        Cargar::Modelo('Usuario');
        $marcaModel = new MarcaModel();
        $marcas = $marcaModel->consultar_marcas();
        $usuarioModel = new UsuarioModel();
        $permisos = $usuarioModel->consultar_permisos_usuario($_SESSION['ID_USUARIO'], MODULO_MARCAS);
        Database::close();
        echo json_encode([
            'marcas' => $marcas,
            'permisos' => $permisos
        ]);
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
        Cargar::Modelo('Marca');
        $marcaModel = new MarcaModel();
        $marca = $marcaModel->consultar_marca($_POST['id_marca']);
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
