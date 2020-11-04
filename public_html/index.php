<?php
$seccion='index';
include_once('inc/header.php');
?> 
<!-- 
Body Section 
-->
<div class="row">

	<div class="span12">
	<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
			  <div class="item">
			  <a href="product_details.php?id=48"><img style="width:100%" src="images/carrusel/bohemian_rhapsody_carrusel.jpg" alt="Bohemian Rhapsody"></a>
                <div class="carousel-caption">
                      <h4>Bohemian Rhapsody</h4>
                </div>
              </div>
			  <div class="item">
			  <a href="product_details.php?id=1"><img style="width:100%" src="images/carrusel/the_godfather_carrusel.jpg" alt="The Godfather"></a>
                <div class="carousel-caption">
                      <h4>The Godfather</h4>
                </div>
              </div>
			  <div class="item active">
			  <a href="product_details.php?id=66"><img style="width:100%" src="images/carrusel/the_shawshank_redemption_carrusel.jpg" alt="The Shawshank Redemption"></a>
                <div class="carousel-caption">
                      <h4>The Shawshank Redemption</h4>
                </div>
              </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
        </div>
<!--
New Products
-->
	<div class="well well-small">
	<h3>Mejores Peliculas </h3>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
			<div class="item active">
			  <ul class="thumbnails">
				<?php 
				include('inc/carrusel2019.php');
				?>
				
			  </ul>
			  </div>
		   <div class="item">
		  <ul class="thumbnails">
			<?php 
			include('inc/carrusel2020.php');
			?>
		  </ul>
		  </div>
		   </div>
		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
		
		<hr class="soften"/>
		<h3>Ultimos Lanzamientos </h3>
		<hr class="soften"/>
		
		<div class="row-fluid">
		  <ul class="thumbnails">
			
			<?php 
			include('inc/pelis_nuevas.php');
			?>

			
		  </ul>
		</div>
	</div>
	
	</div>
	</div>
<?php include('inc/footer.php'); ?>