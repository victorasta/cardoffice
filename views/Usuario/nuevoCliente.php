<h1>Registro de Usuario</h1>
<form action="<?=base_url?>/usuario/save" method="post">
    <div class="row">
        <div class="col-5 col-xl-4">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control " pattern="[a-zA-Z ]+" name="nombre">
            </div>
        </div>
    <div>
    <div class="form-group">
        <label for="nombre">Apellidos:</label>
        <input type="text" pattern="[a-zA-Z ]+"  class="form-control" name="apellidos">
    </div>
    <div class="form-group">
        <label for="nombre">Correo:</label>
        <input type="email"  class="form-control" name="correo">
    </div>
    <div class="form-group">
        <label for="nombre">Contraseña:</label>
        <input type="password" class="form-control" name="password">
    </div>
    <input type="submit"  class="btn btn-success" name="enviar" value="Registrar">
</form>