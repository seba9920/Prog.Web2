
<?php
/*
$productos = json_decode(file_get_contents('../DataAccess/productos.json'),true);
    $columns = array_column($productos, 'anio');
    array_multisort($columns, SORT_DESC, $productos);*/

    require_once('../Business/PeliculaBusiness.php');
	$p2019 = new PeliculaBusiness($con);
    
	$cont=0;
    $condicion = 2019;
	foreach ($p2019->getAllAnio($condicion) as $prod) { 
		$cont++;
    ?>
        
            <div class="col-lg-3">
                <h5><?php echo $prod->getAnio();?></h5>
                     <div class="thumbnail">
                        
                        <a href="product-details.php?id=<?php echo $prod->getID()?>"><img class="img-fluid" src="images/<?php echo $prod->getID() ?>.jpg" alt=""></a>
                        <h4><?php echo $prod->getNombre();?></h4>
                        <p><strong> $<?php echo $prod->getPrecio() ?> </strong></p>
                        <h4><a class="btn btn-warning" href="product-details.php?id=<?php echo $prod->getID()?>" title="add to cart"> Detalles </a></h4>
                    </div>

            </div>    
    <?php if($cont==4){ break; }
	
    } ?>


