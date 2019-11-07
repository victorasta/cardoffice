<?php
class Producto
{
    function __construct()
    {
        Cargar::Helper('Usuario');
    }
    public function index()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        $usuario_helper->verificar_sesion(MODULO_PRODUCTOS, SELECT_PRIV);
        $data['menu'] = $usuario_helper->consultar_items_menu_usuario(MODULO_PRODUCTOS);
        $data['title'] = 'Productos';
        $data['usuario'] = $usuario_helper->consultar_informacion_usuario();
        $data['scripts'] = array(base_url . 'assets/dist/js/pages/productos.js');
        Cargar::Vista('templates/header', $data);
        Cargar::Vista('producto/productos', $data);
        Cargar::Vista('templates/footer', $data);
        Database::close();
    }
    public function consultar_items_producto()
    {
        Database::initialize();
        $usuario_helper = new UsuarioHelper();
        if (!$usuario_helper->verificar_sesion(MODULO_PRODUCTOS, SELECT_PRIV, TRUE)) {
            echo json_encode([
                'error' => 'Sin acceso concedido.'
            ]);
            return;
        }
        $categoria = Cargar::Modelo('Categoria');
        $usuario = Cargar::Modelo('Usuario');
        $categorias = $this->CategoriaModel->consultar_categorias();
        $permisos = $this->UsuarioModel->consultar_permisos_usuario($_SESSION['ID_USUARIO'], MODULO_CATEGORIAS);
        Database::close();
        echo json_encode([
            'categorias' => $categorias,
            'permisos' => $permisos
        ]);
    }

    public function update()
    { }

    public function destroy()
    { }
}
