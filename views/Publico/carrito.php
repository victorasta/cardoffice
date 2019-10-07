
    <div class="hero-wrap hero-bread" style="background-image: url('<?=base_url?>assets/images/bg_4.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
 
            <h1 class="mb-0 bread">Carrito de Compras</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Producto</th>
						        <th>Precio</th>
						        <th>Cantidad</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						        <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(<?=base_url?>assets/images/product-2.jpg);"></div></td>
						        
						        <td class="product-name">
						        	<h3>Sierra Electrica 100W</h3>
						        	<p><?= substr("Apta para cortes en madera, hierro y aluminio gracias a su motor de alto rendimiento, eje para discos de 5/8",0,55)?>....</p>
						        </td>
						        
						        <td class="price">$120.00</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
					          	</div>
					          </td>
						        
						        <td class="total">$120.00</td>
						      </tr><!-- END TR-->

						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">
    			<div class="col-lg-7 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Envios Nacionales</h3>
  						<form action="#" class="info">
	              <div class="form-group">
	              	<label for="">Departamento</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Direccion</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	              <div class="form-group">
	              	<label for="country">Telefono de Contacto</label>
	                <input type="text" class="form-control text-left px-3" placeholder="">
	              </div>
	            </form>
    				</div>
    				<p><a href="#" class="btn btn-primary py-3 px-4">Enviar</a></p>
    			</div>
    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Detalle Compra</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>$120.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Envio</span>
    						<span>$0.00</span>
    					</p>
    					<p class="d-flex">
    						<span>Descuento</span>
    						<span>$40.00</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>$80.00</span>
    					</p>
    				</div>
    			</div>
    		</div>
			</div>
		</section>

  <script>
		$(document).ready(function(){

		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		            
		            $('#quantity').val(quantity + 1);

		          
		            // Increment
		        
		    });

		     $('.quantity-left-minus').click(function(e){
		        // Stop acting like a button
		        e.preventDefault();
		        // Get the field name
		        var quantity = parseInt($('#quantity').val());
		        
		        // If is not undefined
		      
		            // Increment
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });
		    
		});
	</script>
    
