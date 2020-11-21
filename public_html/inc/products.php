<?php
$seccion='grid';
include_once('inc/header.php');
?> 
<!-- 
Body Section 
-->
	<div class="row">
<div id="sidebar" class="span3">
<?php include('inc/sidebar.php');?>

	</div>
	<div class="span9">
<!--
Products
-->
	<div class="well well-small">
	<h3>Listado de peliculas</h3>
		<div class="row-fluid">
		  <ul class="thumbnails">
		  
		  
		  <?php
		  include('datos/productos.php');
		  
           
		  include('datos/categorias.php');

		  	foreach($productos as $prod){
				
				if($prod['activo']==true){
				$imprimir=true;

					if(!empty($_GET['cat'])){
						if(is_array($prod['categorias'])){
							
								foreach(($prod['categorias']) as $index => $value){
									if($value !=$_GET['cat']){
										$imprimir=false;
									}elseif($value ==$_GET['cat']){
										$imprimir=true;
									break;
									}
								}
 					    }elseif($prod['categorias'] !=$_GET['cat']){
							$imprimir=false;
						}

					}
					if(!empty($_GET['clasificacion'])){
						if($prod['clasificacion'] !=$_GET['clasificacion']){
							$imprimir=false;
						}
					}
					
						if($imprimir){
						?>
						<li class="span5">
						<div class="thumbnail">
							<a href="product_details.php" class="overlay"></a>
							<a class="zoomTool" href="product_details.php" title="add to cart"><span class="icon-search"></span>Detalles</a>
							<a href="product_details.php"><img src="generos/images/<?php echo $prod['imagen'] ?>" alt=""></a>
							<div class="caption cntr peliculas">
								<p><strong><?php echo $prod['nombre'] ?></strong></p>
								<p><?php echo $prod['genero'] ?> - <?php echo $prod['anio'] ?></p>
								
								<br class="clr">
							</div>
						</div>
						</li>
			
			<?php
			}}}
			?>
			
			
		  </ul>
		</div>
	
	
	
	</div>
	</div>
	<?php include('inc/footer.php'); ?>