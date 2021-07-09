	<div class="col-12 col-lg-10">
	<?php
	require_once('../Business/PeliculaBusiness.php');
	require_once('../Business/GeneroBusiness.php');
	require_once('../Business/SubGeneroBusiness.php');
	require_once('../Business/ClasificacionBusiness.php');
	$PeliculaB = new PeliculaBusiness($con);
	$GeneroB= new GeneroBusiness($con);
	$SubGeneroB= new SubGeneroBusiness($con);
	$ClasiB= new ClasificacionBusiness($con);

	?>


		<h3>Listado de Peliculas
		<?php  
		echo !empty($_GET['genero'])? ' / '.$GeneroB->getEntrada($_GET['genero'])->getNombre().' ':'';
		
		echo !empty($_GET['subgenero'])? ' / '.$SubGeneroB->getEntrada($_GET['subgenero'])->getNombre().' ':'';

		echo !empty($_GET['clasificacion'])? ' / '.$ClasificacionB->getEntrada($_GET['clasificacion'])->getNombre().' ':'';
			
		if(!empty($_GET['orden'])){
			if($_GET['orden']==1){
			echo '/ A-Z';
			}else if($_GET['orden']==2){
				echo '/ Z-A';
				} else if($_GET['orden']==3){
					echo '/ Año ASC';
					} else if($_GET['orden']==4){
						echo '/ Año DESC';
						} else if($_GET['orden']==5){
							echo '/ Rating ASC';
							} else if($_GET['orden']==6){
								echo '/ Rating DESC';
								}
		}
		?>
		
		</h3>

		<div class="row">
		
			<?php foreach($PeliculaB->getEntradas($_GET) as $prod){ 
				if($prod->getStatus()==1){
				?>
					
					<div class="col-lg-3">
						<a href="product-details.php?id=<?php echo $prod->getID()?>" class="overlay"></a>
						<a href="product-details.php?id=<?php echo $prod->getID()?>"><center><img class="img-fluid" src="<?php echo 'images/'.$prod->getID().'.jpg' ?>" alt=""></center></a>
							<div class="caption cntr peliculas" align="center">
								<h4><?php echo $prod->getNombre() ?></h4>
								<strong><?php echo $prod->getAnio() ?></strong>
								<p><strong>$<?php echo $prod->getPrecio() ?></strong></p>
						<h4><a class="btn btn-warning" href="product-details.php?id=<?php echo $prod->getID()?>" title="add to cart">Detalles</a></h4>
								<br class="clr">
							</div>
					</div>
			<?php }
				 } ?>
		</div>
	
	</div>