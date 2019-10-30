<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CardOffice | Iniciar sesión</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <link rel="stylesheet" href="<?= base_url ?>assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="<?= base_url ?>assets/plugins/validetta/validetta.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="<?= base_url ?>"><b>CardOffice</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Inicie sesión para acceder</p>
        <form action="#" method="POST" id="fm-login">
          <div class="input-group mb-3">
            <input type="text" id="correo" name="correo" class="form-control" placeholder="Usuario" data-validetta="required,email" data-vd-message-error="Debe proporcionar una dirección de correo electrónico válida" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" data-validetta="required" autocomplete="off">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12">
              <button class="btn bg-navy btn-block btn-flat" id="send">Acceder <i id="send-icon" class="fas fa-arrow-circle-right"></i></button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <p class="mb-1">
          <a href="#">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

</body>

</html>
<script>
  const url = '<?= base_url ?>';
</script>
<script src="<?= base_url ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?= base_url ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="<?= base_url ?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?= base_url ?>assets/plugins/validetta/validetta.js"></script>
<script src="<?= base_url ?>assets/plugins/validetta/localization/validettaLang-es-ES.js"></script>
<script src="<?= base_url ?>assets/dist/js/main.js"></script>
<script src="<?= base_url ?>assets/dist/js/pages/login.js"></script>
<!-- jQuery -->
