<?php 
$opc = $_SESSION['usuario'][0]['id_rol'];
switch($opc){
    case 1:
       echo "<h1>Ha iniciado como Administrador</h1>";
    break;
    case 2:
        echo "<h1>Ha iniciado como Gerente</h1>";
    break;
    case 3:
       echo "<h1>Ha iniciado como Empleado</h1>";
    break;
}