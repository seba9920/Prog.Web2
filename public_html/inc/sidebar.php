<div class="well well-small">
	<h3>Categorías</h3>
	<ul class="nav nav-list"> 
	<?php include('datos/categorias.php');
		foreach($categorias as $cat){
	?>
			<li><a href="products.php?cat=<?php echo $cat['id']?>&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>"><span class="icon-chevron-right"></span><?php echo $cat['nombre']?></a></li>
		<?php }?>
		<li><a href="products.php?cat=&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>"><span class="icon-chevron-right"></span>Todos</a></li>
		</ul>
		</div>
<div class="well well-small">		
		<h3>Clasificacion por edades</h3>
		<ul class="nav nav-list"> 
		<?php include('datos/marcas.php');
		foreach($marcas as $mar){
	?>
			<li><a href="products.php?cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>&clasificacion=<?php echo $mar['nombre']?>"><span class="icon-chevron-right"></span><?php echo $mar['nombre']?></a></li>
		<?php }?>
		<li><a href="products.php?cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>&clasificacion="><span class="icon-chevron-right"></span>Todos</a></li>
		</ul>
</div>

			<!--  <div class="well well-small alert alert-warning cntr">
				  <h2>50% Discount</h2>
				  <p> 
					 only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
				  </p>
			  </div>
			  <div class="well well-small" ><a href="#"><img src="assets/img/paypal.jpg" alt="payment method paypal"></a></div>
			
			<a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
			<br>
			<br>
			<ul class="nav nav-list promowrapper">
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="assets/img/bootstrap-ecommerce-templates.png" alt="bootstrap ecommerce templates">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.php">VIEW</a> <span class="pull-right">$22.00</span></h4>
				</div>
			  </div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="assets/img/shopping-cart-template.png" alt="shopping cart template">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.php">VIEW</a> <span class="pull-right">$22.00</span></h4>
				</div>
			  </div>
			</li>
			<li style="border:0"> &nbsp;</li>
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="assets/img/bootstrap-template.png" alt="bootstrap template">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.php">VIEW</a> <span class="pull-right">$22.00</span></h4>
				</div>
			  </div>
			</li>
		  </ul>-->

 