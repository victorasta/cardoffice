<?php
class Login
{
    public function index()
    {
        if (isset($_SESSION['ID_USUARIO'])) {
            header('location:' . base_url);
            exit();
        }
        Cargar::Vista('login');
    }
}
