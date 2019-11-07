        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Administración de marcas</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item">CardOffice</li>
                                <li class="breadcrumb-item active">Marcas</li>
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
                            <h3 class="card-title">Marcas</h3>

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
                                            <h3 class="card-title">Datos generales de la marca</h3>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <form role="form" method="post" action="" id="fm-marca">
                                            <div class="card-body">
                                                <input type="hidden" id="marca_id_marca">
                                                <div class="form-group">
                                                    <label for="marca_nombre_marca">Nombre de la marca <span class="asterisk" title="Campo requerido">*</span></label>
                                                    <input type="text" class="form-control" id="marca_nombre_marca" name="marca_nombre_marca" placeholder="Ingrese el nombre de la marca" data-validetta="required" autocomplete="off">
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                                    <input type="checkbox" class="custom-control-input" id="marca_estado_marca">
                                                    <label class="custom-control-label" for="marca_estado_marca">Marca habilitada</label>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-outline-primary" id="guardar_marca"><i id="guardar-marca-icon" class="fas fa-save"></i> Guardar</button>
                                                <button type="reset" class="btn btn-outline-secondary" id="limpiar"><i class="fas fa-trash"></i> Limpiar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-navy">
                                        <div class="card-header">
                                            <h3 class="card-title">Marcas registradas</h3>
                                            <div class="card-tools">
                                                <button class="btn btn-tool btn-actualizar-tabla-marcas"><span title="Actualizar tabla"><i class="btn-actualizar-tabla-marcas-icon fas fa-redo-alt"></i></span></button>
                                            </div>
                                        </div>
                                        <!-- /.card-header -->
                                        <!-- form start -->
                                        <div class="card-body">
                                            <table id="tabla_marcas" class="table table-bordered table-hover text-center">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nombre</th>
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