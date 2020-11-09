
<?php

$productos = json_decode(file_get_contents('datos/productos.json'),true);
    $columns = array_column($productos, 'anio');
    array_multisort($columns, SORT_DESC, $productos);
?>
<?php
$mostrar = '0';   
   foreach ($productos as $prod){

            
            if ($prod['anio'] >= '2018' && $prod['anio'] < '2020' && $mostrar <= '3') {
                $mostrar++;

                /*'<pre>';
                var_dump($prod);
                '</pre>';*/
 ?>             
            
                <li class="span3">
                <h3><?php echo $prod['anio']?></h3>
                     <div class="thumbnail">
                        <a class="zoomTool" href="product_details.php?id=<?php echo $prod['id']?>" title="add to cart"><span class="icon-search"></span>Detalles</a>
                        <a href="product_details.php?id=<?php echo $prod['id']?>"><img src="images/<?php echo $prod['imagen'] ?>" alt=""></a>
                    </div>
                </li>
        <?php }  }?>


