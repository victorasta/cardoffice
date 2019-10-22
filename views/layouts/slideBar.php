
<div class="row">
    <div class="side-menu">
       <nav class="navbar navbar-default" role="navigation">
           <div class="navbar-header">
               <div class="brand-wrapper">
                    <div class="brand-name-wrapper">
                        <button type="button" class="navbar-toggle">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            Cardoffice
                        </a>
                    </div>
                    <div id="search" class="panel-collapse collapse">
                        <div class="panel-body">
                            <form class="navbar-form" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-default "><span class="glyphicon glyphicon-ok"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           <!-- MENU -->
            <div class="side-menu-container">   
                 <ul class="nav navbar-nav">
                    <?php foreach($consulta as $dato):?>
                        <?php if(!(is_null($dato['url']))):?>
                        <li class="active"><a href="#"><span class="glyphicon"><?=$dato['icon']?> </span><?=$dato['nombre']?></a></li>
                        <?php else:?>
                        <li class="panel panel-default active" id="dropdown">
                        <a data-toggle="collapse" href="#<?=$dato['id']?>">
                            <span class="glyphicon"><?=$dato['icon']?> </span><?=$dato['nombre']?><span class="caret"></span>
                        </a>
                                <div id="<?=$dato['id']?>" class="panel-collapse collapse">
                                    <div class="panel-body">
                                          <?php $query2 = "SELECT mt.*,pr.operaciones FROM menu_item mt, rol_menu rm , privilegios_rol pr WHERE mt.id_menu_padre=".$dato['id']." AND rm.id_rol =".$id_rol." AND rm.id_menu =".$dato['id']." AND pr.id_rol =".$id_rol." AND rm.id_modulo = pr.id_modulo AND pr.id_rol=".$id_rol;
                                           $consulta2 = Database::get()->query($query2);   
                                           ?> 
                                       <?php if(!(is_null( $consulta2))):?>
                                        <ul class="nav navbar-nav">
                                            <?php foreach($consulta2 as $data):?>
                                                <li><a class="active" href=""><?=$data['nombre']?></a></li>
                                            <?php endforeach?>
                                        </ul>
                                      <?php endif?>
                                    </div>
                               </div>
                        </li>
                        <?php endif ?>
                    <?php endforeach?>
                    <li><a href="<?=base_url?>usuario/close"><span class="glyphico"><i class="fas fa-sign-out-alt"></i> </span>Cerrar Sesion</a></li>
                </ul>
           </div><!-- /.navbar-collapse -->
        </nav> 
    </div>
     <!-- CONTENDIO DE PAGINA -->
     <div class="container-fluid">
        <div class="side-body">