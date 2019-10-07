<h1>Registro Nuevo Empleado</h1>
<div class="col col-xl-5">
    <form method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" name="nombre" pattern="['a-zA-z ]+" autocomplete="off" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nombre">Apelleido:</label>
                <input type="text" class="form-control" name="apellido" pattern="['a-zA-z ]+" autocomplete="off" required>
            </div>
        
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">DUI:</label>
                <input type="text" class="form-control" maxlength="14"  name="dui" pattern="[0-9]{8}-[0-9]{1}" placeholder="00000000-0" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nombre">NIT:</label>
                <input type="text" class="form-control"  name="nit" maxlength="17" placeholder="0000-000000-000-0" pattern="[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Telefono:</label>
                <input type="text" class="form-control"  maxlength="9" name="telefono" placeholder="0000-0000" pattern="[0-9]{4}-[0-9]{4}" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nombre">Telefono 2:(Opcional)</label>
                <input type="text" class="form-control" maxlength="9" placeholder="0000-0000" name="telefono2" pattern="[0-9]{4}-[0-9]{4}">
            </div>
        </div>
        
        <div class="form-group">
                <label for="nombre">Direccion:</label>
                <textarea class="form-control" required name="direccion"></textarea>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Foto:</label>
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" name="foto">
            </div>
       </div>

       <div class="form-group col-md-6">
                <label for="nombre">Cargo:</label>
                <input list="marca"  class="form-control" name="rol" required >
                <datalist id="marca">
                        <option value="Gerente">
                        <option value="Empleado">       
                </datalist>
        </div>
    
    <button type="submit" class="btn btn-success"> Guardar </button>
    </form>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>