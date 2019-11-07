        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administración de productos</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">CardOffice</li>
                                <li class="breadcrumb-item active">Productos</li>
                            </ol>
                        </div>
                    </div>


                </div>
                <!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Poductos</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                    <i class="fas fa-minus"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-navy">
                                        <div class="card-header">
                                            <h3 class="card-title">Datos generales del producto</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" method="post" action="" id="fm-producto">
                                            <div class="card-body">
                                                <input type="hidden" id="producto_id_producto">
                                                <div class="form-group">
                                                    <label for="producto_id_categoria">Categoría del producto <span class="asterisk" title="Campo requerido">*</span></label>
                                                    <select id="producto_id_categoria" name="producto_id_categoria" class="form-control select2 select2-navy" data-dropdown-css-class="select2-navy" style="width: 100%;" data-validetta="required">
                                                        <option value=""></option>
                                                        <option>Equipo manual</option>
                                                        <option>Herramientas industriales</option>
                                                        <option>Tuberías</option>
                                                        <option>Maquinaría pesada</option>
                                                        <option>Vigas</option>
                                                        <option>Cerrajería</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="producto_id_marca">Marca del producto <span class="asterisk" title="Campo requerido">*</span></label>
                                                    <select id="producto_id_marca" name="producto_id_marca" class="form-control select2 select2-navy" data-dropdown-css-class="select2-navy" style="width: 100%;" data-validetta="required">
                                                        <option value=""></option>
                                                        <option>CATERPILLAR</option>
                                                        <option>DEWALL</option>
                                                        <option>STANLEY</option>
                                                        <option>MINI</option>
                                                        <option>BMW</option>
                                                        <option>VOLVO</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="producto_modelo_producto">Modelo del producto <span class="asterisk" title="Campo requerido">*</span></label>
                                                    <input type="text" class="form-control" id="producto_modelo_producto" name="producto_modelo_producto" placeholder="Ingrese el modelo del producto" data-validetta="required" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="producto_descripcion_producto">Descripción del producto <span class="asterisk" title="Campo requerido">*</span></label>
                                                    <input type="text" class="form-control" id="producto_descripcion_producto" name="producto_descripcion_producto" placeholder="Ingrese la descripción del producto" data-validetta="required" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="producto_img_producto">Imagen del producto</label>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="producto_img_producto" accept="image/jpeg, image/png, image/jpg">
                                                        <label class="custom-file-label" for="producto_img_producto">Seleccionar</label>
                                                    </div>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" id="producto_estado_producto">
                                                    <label class="custom-control-label" for="producto_estado_producto">Producto habilitado</label>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-outline-primary" id="guardar_producto"><i id="guardar-producto-icon" class="fas fa-save"></i> Guardar</button>
                                                <button type="reset" class="btn btn-outline-secondary" id="limpiar"><i class="fas fa-trash"></i> Limpiar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-navy">
                                        <div class="card-header">
                                            <h3 class="card-title">Productos registradas</h3>
                                            <div class="card-tools">
                                                <button class="btn btn-tool btn-actualizar-tabla-productos"><span title="Actualizar tabla"><i class="btn-actualizar-tabla-productos-icon fas fa-redo-alt"></i></span></button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <div class="card-body">
                                            <table id="tabla_productos" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Descripción</th>
                                                        <th>Estado</th>
                                                        <th>Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- /.card-body -->
                                        <div class="card-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>

            </section>
            <!-- /.content -->
            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Volver al inicio">
                <i class="fas fa-chevron-up"></i>
            </a>
        </div>

        <!-- /.content-wrapper -->