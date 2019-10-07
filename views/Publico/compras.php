
    <div class="hero-wrap hero-bread" style="background-image: url('<?=base_url?>assets/images/bg_5.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Mis Compras</h1>
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
						        <th>Detalle</th>
						        <th>&nbsp;</th>
						        <th>Fecha</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
						      <tr class="text-center">
						  
						        
						        <td class="image-prod"><div class="img h-10" style="background-image:url(https://lapps.es/wp-content/uploads/2019/08/pdf-download-icon.png);"></div></td>
						        
						        <td class="product-name">
						        	<h3>FACTURA 1012322019</h3>

						        </td>
						        
						        <td class="price"><?=date('d-m-Y');?></td>
						        
					          </td>
						        
						        <td class="total">$80.00</td>
						      </tr><!-- END TR-->
						      
						    </tbody>
						  </table>
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
    