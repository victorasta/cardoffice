<?php
class Producto{
    function __construct()
    {
        Cargar::Helper('Usuario');
    }
    public function index(){
        echo "Controllador de Producto, accion index";
    }
    public function save(){    
    }

    public function update(){    
    }

    public function destroy(){  
    }
    public function marcas()
    {
         Database::initialize();
         $usuario_helper = new UsuarioHelper();
         $usuario_helper->verificar_sesion(MODULO_MARCAS, SELECT_PRIV);     
         $data['menu'] = $usuario_helper->consultar_items_menu_usuario(MODULO_MARCAS);
         $data['title'] = 'Marcas';
         Cargar::Vista('templates/header', $data);
         Cargar::Vista('producto/marcas', $data);
         Cargar::Vista('templates/footer', $data);
    }
}