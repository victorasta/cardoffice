<?php
class Categoria extends Controller
{
    function __construct()
    {
        Cargar::Helper('Usuario');
    }
    public function index()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        $usuario_helper->verificar_sesion(MODULO_CATEGORIAS, SELECT_PRIV);
        $data['menu'] = $usuario_helper->consultar_items_menu_usuario(MODULO_CATEGORIAS);
        $data['title'] = 'Categorías';
        $data['usuario'] = $usuario_helper->consultar_informacion_usuario();
        $data['scripts'] = array(base_url . 'assets/dist/js/pages/categorias.js');
        Cargar::Vista('templates/header', $data);
        Cargar::Vista('producto/categorias', $data);
        Cargar::Vista('templates/footer', $data);
        Database::close();
    }

    public function consultar_categorias()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        if (!$usuario_helper->verificar_sesion(MODULO_CATEGORIAS, SELECT_PRIV, TRUE)) {
            echo json_encode([
                'error' => 'Sin acceso concedido.'
            ]);
            return;
        }
        $this->cargar_modelo('Categoria');
        $this->cargar_modelo('Usuario');
        $categorias = $this->CategoriaModel->consultar_categorias();
        $permisos = $this->UsuarioModel->consultar_permisos_usuario($_SESSION['ID_USUARIO'], MODULO_CATEGORIAS);
        Database::close();
        echo json_encode([
            'categorias' => $categorias,
            'permisos' => $permisos
        ]);
    }
    public function consultar_categoria()
    {
        if (!isset($_POST['id_categoria']) || $_POST['id_categoria'] == '' || !is_numeric($_POST['id_categoria'])) {
            echo json_encode([
                'error' => 'ID de categoría requerida'
            ]);
            return;
        }
        Database::initialize();
        Cargar::Helper('Usuario');
        $usuario_helper = new UsuarioHelper();
        if (!$usuario_helper->verificar_sesion(MODULO_CATEGORIAS, SELECT_PRIV, TRUE)) {
            echo json_encode([
                'error' => 'Sin acceso concedido'
            ]);
            return;
        }
        $this->cargar_modelo('Categoria');
        $categoria = $this->CategoriaModel->consultar_categoria($_POST['id_categoria']);
        Database::close();
        echo json_encode([
            'ID_CATEGORIA' => $categoria->ID_CATEGORIA,
            'NOMBRE_CATEGORIA' => $categoria->NOMBRE_CATEGORIA,
            'ESTADO_CATEGORIA' => $categoria->ESTADO_CATEGORIA
        ]);
    }
    public function eliminar_categoria()
    {
        if (!isset($_POST['id_categoria']) || $_POST['id_categoria'] == '' || !is_numeric($_POST['id_categoria'])) {
            echo json_encode([
                'error' => 'ID de categoría requerida'
            ]);
            return;
        }
        $error = NULL;
        try {
            Database::initialize();
            $usuario_helper = new UsuarioHelper();
            if (!$usuario_helper->verificar_sesion(MODULO_CATEGORIAS, DELETE_PRIV, TRUE)) {
                throw new Exception("Sin acceso permitido");
            }
            Database::get()->autocommit(FALSE);
            Database::get()->begin_transaction();
            $this->cargar_modelo('Categoria');
            $this->CategoriaModel->eliminar_categoria($_POST['id_categoria']);
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
    public function guardar_categoria()
    {
        if (
            !isset($_POST['nombre_categoria']) || trim($_POST['nombre_categoria']) == ''
            || !isset($_POST['estado_categoria']) || trim($_POST['estado_categoria']) == ''
            || (isset($_POST['id_categoria']) &&  trim($_POST['id_categoria']) != '' ? !is_numeric($_POST['id_categoria']) : FALSE)
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
            if (!$usuario_helper->verificar_sesion(MODULO_CATEGORIAS, ($_POST['id_categoria'] == '' ? INSERT_PRIV : UPDATE_PRIV), TRUE)) {
                throw new Exception("Sin acceso permitido");
            }
            Database::get()->autocommit(FALSE);
            Database::get()->begin_transaction();
            $this->cargar_modelo('Categoria');
            $nombre_categoria = mb_strtoupper($_POST['nombre_categoria'], 'utf-8');
            $estado_categoria = mb_strtoupper($_POST['estado_categoria'], 'utf-8');
            $estado_categoria = $estado_categoria != 'A' && $estado_categoria != 'I' ? 'I' : $estado_categoria;
            if ($_POST['id_categoria'] == '')
                $this->CategoriaModel->insertar_categoria($nombre_categoria, $estado_categoria);
            else
                $this->CategoriaModel->actualizar_categoria($_POST['id_categoria'], $nombre_categoria, $estado_categoria);
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
