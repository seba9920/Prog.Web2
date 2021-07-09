<?php
	require_once('../Business/PeliculaBusiness.php');
	$pB = new PeliculaBusiness($con);


	$cont=0;
		
	$peli[0]=rand(1,10);
	do{
		$peli[1]=rand(1,10);
	}while($peli[0]==$peli[1]);
	do{
		$peli[2]=rand(1,10);
	}while($peli[1]==$peli[2]||$peli[0]==$peli[2]);
	do{
		$peli[3]=rand(1,10);
	}while($peli[0]==$peli[3]||$peli[1]==$peli[3]||$peli[2]==$peli[3]);
	do{
		$peli[4]=rand(1,10);
	}while($peli[0]==$peli[4]||$peli[1]==$peli[4]||$peli[2]==$peli[4]||$peli[3]==$peli[4]);
	do{
		$peli[5]=rand(1,10);
	}while($peli[0]==$peli[5]||$peli[1]==$peli[5]||$peli[2]==$peli[5]||$peli[3]==$peli[5]||$peli[4]==$peli[5]);

	//echo "salieron: ".$peli[0]." , ".$peli[1]." , ".$peli[2]." , ".$peli[3]." , ".$peli[4]." , ".$peli[5]." , ";
	//echo __FILE__;

	foreach ($pB->getDestacados() as $prod) { 
		
		$cont++;
		if($cont==$peli[0]||$cont==$peli[1]||$cont==$peli[2]||$cont==$peli[3]||$cont==$peli[4]||$cont==$peli[5]){
    ?>
	
		<div class="col-lg-3 <?php if($cont >= 5) {echo "mx-auto"; }?>">
			<!--<h2><a href="#" class="badge badge-secondary">New</a></h2>-->
			<a href="product-details.php?id=<?php echo $prod->getID()?>"><img class="img-fluid" src="images/<?php echo $prod->getID() ?>.jpg" alt=""></a>
		
			<h4><?php echo $prod->getNombre()." ".$cont?></h4>
			<p><strong> $<?php echo $prod->getPrecio() ?> </strong></p>
			<h4><a class="btn btn-warning" href="product-details.php?id=<?php echo $prod->getID()?>" title="add to cart"> Detalles </a></h4>
					<br class="clr">
		</div>

<?php 
	}
		
	} ?>