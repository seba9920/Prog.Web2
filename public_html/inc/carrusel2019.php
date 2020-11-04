
<?php

//<a href="#" class="tag"></a> => estrella "NEW"
    include_once('datos/productos.php');
    $columns = array_column($productos, 'rating');
    array_multisort($columns, SORT_DESC, $productos);
?>
<?php
$mostrar = '0';   
   foreach ($productos as $prod){

            
            if ($prod['rating'] >= '8.0' && $prod['rating'] < '9.0' && $mostrar <= '3') {
                $mostrar++;
 ?>
            
                <li class="span3">
                <h3><?php echo $prod['rating']?></h3>
                     <div class="thumbnail">
                        <a class="zoomTool" href="product_details.php?id=<?php echo $prod['id']?>" title="add to cart"><span class="icon-search"></span>Detalles</a>
                        <a href="product_details.php?id=<?php echo $prod['id']?>"><img src="images/<?php echo $prod['imagen'] ?>" alt=""></a>
                    </div>
                </li>
        <?php }  }?>


