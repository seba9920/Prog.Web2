<?php
$seccion='three';
include_once('inc/header.php');
?> 
<!-- 
Body Section 
-->
<!-- 
Three column view
-->
	<h3>Three Column Product view </h3>
		<ul class="thumbnails">
			<?php include_once('datos/productos.php'); 
				foreach($productos as $prod){
					if($prod['activo'] == true){
						?>
						<li class="span4">
							<div class="thumbnail">
								<a href="product_details.php" class="overlay"></a>
								<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
								<a href="product_details.php"><img src="assets/img/<?php echo $prod['imagen'] ?>" alt=""></a>
								<div class="caption cntr">
									<p><?php echo $prod['nombre'] ?></p>
									<p><strong> $<?php echo $prod['precio'] ?></strong></p>
									<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
									<div class="actionList">
										<a class="pull-left" href="#">Add to Wish List </a> 
										<a class="pull-left" href="#"> Add to Compare </a>
									</div> 
									<br class="clr">
								</div>
							</div>
						</li>
					<?php }
				} ?>
		  </ul>

		  <?php include('inc/footer.php'); ?>