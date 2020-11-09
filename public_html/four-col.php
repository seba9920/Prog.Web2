<?php
$seccion='four';
include_once('inc/header.php');
?> 
<<<<<<< HEAD



=======

>>>>>>> 714e4c2393eb74ab3f903d1a0c5d07017a2e4c52
	<h3>Three Column Product view </h3>
	<?php  $productos = array(
		1 => array( 'nombre' => 'nombre1', 'precio' => '22.00', 'imagen' => 'a.jpg'),
		2 => array( 'nombre' => 'nombre2', 'precio' => '2.00', 'imagen' => 'b.jpg'),
		3 => array( 'nombre' => 'nombre3', 'precio' => '232.00', 'imagen' => 'c.jpg'),
		4 => array( 'nombre' => 'nombre4', 'precio' => '2232.00', 'imagen' => 'd.jpg'),
		5 => array( 'nombre' => 'nombre5', 'precio' => '2342.00', 'imagen' => 'e.jpg')
	);
	?>
		<ul class="thumbnails">
			<?php
				foreach($productos as $prod){
			?>
					<li class="span3">
					<div class="thumbnail">
						<a href="product_details.php" class="overlay"></a>
						<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
						<a href="product_details.php"><img src="assets/img/<?php echo $prod['imagen']?>" alt=""></a>
						<div class="caption cntr">
							<p><?php echo $prod['nombre']?></p>
							<p><strong> $<?php echo $prod['precio']?></strong></p>
							<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
							<div class="actionList">
								<a class="pull-left" href="#">Add to Wish List </a> 
								<a class="pull-left" href="#"> Add to Compare </a>
							</div> 
							<br class="clr">
						</div>
					</div>
					</li>
				<?php }?>
		  </ul>

		  <?php include('inc/footer.php'); ?>