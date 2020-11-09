<?php

$productos = json_decode(file_get_contents('datos/productos.json'),true);
$columns = array_column($productos, 'anio');
array_multisort($columns, SORT_DESC, $productos);?>

<?php 
    $mostrar ='0';
    foreach ($productos as $prod) { 

    
    if ($prod['anio'] = '2020' && $mostrar < '3' ) {
        $mostrar++
    ?>

<li class="span4">
	<div class="thumbnail">
				 
			<a href="#" class="tag"></a>
			<a href="product_details.php?id=<?php echo $prod['id']?>"><img src="images/<?php echo $prod['imagen'] ?>" alt=""></a>
		<div class="caption cntr">
			<h3><?php echo $prod['nombre']?></h3>
			<p><strong> $<?php echo $prod['precio'] ?> </strong></p>
			<h4><a class="shopBtn" href="product_details.php?id=<?php echo $prod['id']?>" title="add to cart"> Detalles </a></h4>
					<br class="clr">
		</div>
	</div>
</li>
<?php } }?>