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
		  $datos = file_get_contents('datos/productos.json');
		  $datosJson = json_decode($datos,true);
		  
		  
		  $columns = array_column($datosJson, 'anio');
          array_multisort($columns, SORT_DESC, $datosJson);
		   
		  

		  

		  	foreach($datosJson as $prod){
		  	    
				
				
				$imprimir=true;

					if(!empty($_GET['cat'])){
					  
				   if(isset($prod['genero'])){
					if(is_array($prod['genero'])){
							
								foreach($prod['genero'] as $index => $value){
									if($value !=$_GET['cat']){
										$imprimir=false;
									}elseif($value ==$_GET['cat']){
										$imprimir=true;
									break;
									}
								}
							
							}elseif($prod['genero'] !=$_GET['cat']){
							$imprimir=false;
						}}
						
						
					}
					
					if(!empty($_GET['clasificacion'])){
						if($prod['clasificacion'] !=$_GET['clasificacion']){
							$imprimir=false;
						}
					}

					

					
						if($imprimir==true){
							if (is_array($prod['imagen'])) {
                                          
								$img = 'admin/img/'.$prod['imagen']['name'];
												  
							 } else {
							 $img = 'images/'.$prod['imagen'];
							 };
						?>
						<li class="span5 ">
						<div class="thumbnail ">
							<a href="product_details.php?id=<?php echo $prod['id']?>" class="overlay"></a>
							<a class="zoomTool" href="product_details.php?id=<?php echo $prod['id']?>" title="add to cart"><span class="icon-search"></span>Detalles</a>
							<a href="product_details.php?id=<?php echo $prod['id']?>"><img src="<?php echo $img ?>" alt=""></a>
							<div class="caption cntr peliculas">
								<p><strong><?php echo $prod['nombre'] ?></strong></p>
								<p><?php echo $prod['anio'] ?></p>
								<p>$<?php echo $prod['precio'] ?></p>
								<br class="clr">
							</div>
						</div>
						</li>
			
			
			<?php
			}}
			?>
			
			
		  </ul>
		</div>
	
	
	
	</div>
	</div>
	<?php include('inc/footer.php'); ?>