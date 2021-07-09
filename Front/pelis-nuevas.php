<?php

require_once('../Business/PeliculaBusiness.php');
$pLanzamientos = new PeliculaBusiness($con);


$cont=0;

	foreach ($pLanzamientos->getUltimos() as $prod) { 
		if($prod->getStatus()==1){
		$cont++;
	?>
		<div class="col-lg-3">
			<!--<h2><a href="#" class="badge badge-secondary">New</a></h2>-->
			<a href="product-details.php?id=<?php echo $prod->getID()?>"><img class="img-fluid" src="images/<?php echo $prod->getID() ?>.jpg" alt=""></a>
		
			<h4><?php echo $prod->getNombre()?></h4>
			<p><strong> $<?php echo $prod->getPrecio() ?> </strong></p>
			<h4><a class="btn btn-warning" href="product-details.php?id=<?php echo $prod->getID()?>" title="add to cart"> Detalles </a></h4>
					<br class="clr">
		</div>

	<?php if($cont==4){ break; }
	
		} 
	}?>