
<?php

$id_rol=3;
$query = "SELECT * FROM rol_menu rm, menu m WHERE rm.id_rol=".$_SESSION['usuario'][0]['id_rol']." AND rm.id_menu =m.id";
$consulta = Database::get()->query($query);
?>

<!DOCTYPE HTML5>
<html>
    <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cardoffice</title>
    <!-- ANTIGUO DE DONALD
    <script src="<?=base_url?>assets/js/homePanel.js"></script>
        <script src="<?=base_url?>assets/js/jquery-1.11.1.min.js"></script>
         <link href="<?=base_url?>assets/css/bootstrap/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
       
            <link rel="stylesheet" href="assets/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
         
             <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet"/>
       
        <link href="<?=base_url?>assets/css/home.css" rel="stylesheet" >
         
         <script src="<?=base_url?>assets/js/bootstrap.min2.js"></script>
      -->
      
      <meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url?>assets/plugins/fontawesome-free/css/all.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- overlayScrollbars -->
<link rel="stylesheet" href="<?=base_url?>assets/dist/css/adminlte.min.css">

<script src="<?=base_url?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=base_url?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url?>assets/dist/js/demo.js"></script>
    </head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">