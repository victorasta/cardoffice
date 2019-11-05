<?php

class Usuario
{
    function __construct()
    {
        #Cargar::Modelo('Cliente');
        Cargar::Modelo('Usuario');
        Database::initialize();
    }
    public function index()
    {
        require_once 'views/Usuario/registro.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $cliente = new Cliente();
            $cliente->setNombre($_POST['nombre']);
            $cliente->setApellido($_POST['apellidos']);
            $cliente->setCorreo($_POST['correo']);
            $cliente->setPassword($_POST['password']);
            if ($cliente->save()) {
                echo " registro ingresado";
            } else {
                echo "segui intentando";
            }
        }
    }

    public function login()
    {
        if (!isset($_POST['correo']) || trim($_POST['correo'] == '') || !isset($_POST['password']) || trim($_POST['password'] == '')) {
            echo json_encode([
                'error' => 'No debe dejar campos vacíos'
            ]);
            return;
        }
        $usuario = new UsuarioModel();
        $resultado = $usuario->consultar_usuario($_POST['correo']);
        if ($resultado === FALSE || !is_object($resultado) || !password_verify($_POST['password'], $resultado->passwrd)) {
            echo json_encode([
                'error' => 'Usuario o contraseña incorrectos'
            ]);
            return;
        }
        $_SESSION['ID_USUARIO'] = $resultado->id;
        Database::close();
        echo json_encode([
            'error' => NULL
        ]);
    }

    public function logout()
    {
        session_destroy();
        header("Location:" . base_url);
    }
}

function error($titulo, $mensaje)
{
    $alert = "
   <script>
         $(function(){
           Swal.fire({
               type: 'error',
               title: '" . $titulo . "',
               text: '" . $mensaje . "',
               confirmButtonColor: '#3085d6',
               confirmButtonText: 'OK!'
            })
            })
   </script>";
    return $alert;
}
