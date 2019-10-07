
        <link href="<?=base_url?>assets/css/login.css" rel="stylesheet">
    
        <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <br>
                <img src="<?=base_url?>assets/images/logo.png" id="icon" alt="User Icon" />
                <h1 style="font-family: 'Permanent Marker', cursive;">Cardoffice</h1>
                </div>
                <form action="<?=base_url?>usuario/login" method="POST">
                    <input type="text" id="correo" class="fadeIn second" name="correo" placeholder="Correo" autocomplete="off">
                    <input type="password" id="password" class="fadeIn third" name="password" placeholder="Contraseña">
                    <input type="submit" class="fadeIn fourth btn btn-success bg-success" value="Iniciar Sesion">
                </form>
                <div id="formFooter">       
                </div>
            </div>
        </div>
