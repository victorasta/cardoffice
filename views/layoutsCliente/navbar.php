<body class="goto-here">
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Cardoffice</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
			  <li class="nav-item active"><a href="<?=base_url?>" class="nav-link">Inicio</a></li>
			  <li class="nav-item"><a href="<?=base_url?>cardoffice/informacion" class="nav-link">Quienes Somos?</a></li>
			  <li class="nav-item"><a href="<?=base_url?>cardoffice/catalogo" class="nav-link">Productos</a></li>
			  <?php if(isset($_SESSION['usuario'])&& $_SESSION['usuario'][0]['id_rol']==4):?>
			  <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user" style="color:green;"></i> <?=$_SESSION['usuario'][0]['nombre']?></a>
				<div class="dropdown-menu" aria-labelledby="dropdown04">
				  <a class="dropdown-item" href="<?=base_url?>cardoffice/compras">Mis Compras</a>
				  <a class="dropdown-item" href="<?=base_url?>cardoffice/carrito">Carrito</a>
				  <a class="dropdown-item" href="<?=base_url?>usuario/close">Cerrar Sesion</a>
				</div>
			  </li>
			  <?php else :?>
	          <li class="nav-item"><a href="<?=base_url?>cardoffice/login" class="nav-link">Iniciar Sesion</a></li>
			  <?php endif?>
	          <li class="nav-item cta cta-colored"><a href="<?=base_url?>cardoffice/carrito" class="nav-link"><span class="icon-shopping_cart"></span>[1]</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->
