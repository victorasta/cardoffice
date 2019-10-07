
    <div class="hero-wrap hero-bread" style="background-image: url('<?=base_url?>assets/images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <h1 class="mb-0 bread">Informacion de Producto</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="<?=base_url?>assets/images/product-1.jpg" class="image-popup"><img src="<?=base_url?>assets/images/product-2.jpg" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			
				<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    			     <h3>Sierra Electrica 100W</h3>
    				 <p class="price"><span>$120.00</span></p>
    				 <p>Apta para cortes en madera, hierro y aluminio gracias a su motor de alto rendimiento, eje para discos de 5/8''.<br>
								CONEXIÓN A 120 VOLTIOS<br>
								3 PROFUNDIDADES DE CORTE<br>
								VELOCIDAD DE 3,700 RPM<br>			
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
									<div class="select-wrap">    
											<h6>Marca:Black&Decker</h6>
											<h6>Disponibles:4</h6>
									</div>
		                        </div>
						   </div>

							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             				<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
											<i class="ion-ios-remove"></i>
									</button>
	            		       </span>
	             	           <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
								<span class="input-group-btn ml-2">
										<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
												<i class="ion-ios-add"></i>
										</button>
								</span>
	                      </div>
	          			<div class="w-100"></div>
						<div class="col-md-12"></div>
          			</div>
          			<p><a href="cart.html" class="btn btn-black py-3 px-5">Agregar a Carrito</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <h2 class="mb-4">Productos Relacionados</h2>      
          </div>
        </div>   		
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?=base_url?>assets/images/product-2.jpg" alt="Colorlib Template">
    						<span class="status">30%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Sierra Electrica 100W</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    			<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="#" class="img-prod"><img class="img-fluid" src="<?=base_url?>assets/images/product-2.jpg" alt="Colorlib Template">
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="#">Sierra Electrica</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    						<p class="price"><span>$120.00</span></p>
		    					</div>
	    					</div>
    						<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>
	    							<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a>
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section>

  <script>
		$(document).ready(function(){
		var quantitiy=0;
		   $('.quantity-right-plus').click(function(e){
		        e.preventDefault();
		        var quantity = parseInt($('#quantity').val());
		            $('#quantity').val(quantity + 1);   
		    });

		     $('.quantity-left-minus').click(function(e){
		        e.preventDefault();
		        var quantity = parseInt($('#quantity').val());
		            if(quantity>0){
		            $('#quantity').val(quantity - 1);
		            }
		    });		    
		});
	</script>
    