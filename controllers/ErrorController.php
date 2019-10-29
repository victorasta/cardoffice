<?php
class ErrorController{
    private $msg;
    function __construct($msg)
    {
        $this->msg = $msg;
    }
    public function index(){
        $data['encabezado'] = 'Error';
        $data['contenido'] = $this->msg;
        Cargar::Vista('ErrorGeneral', $data);
    }
}