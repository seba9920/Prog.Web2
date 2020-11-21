<?php
    $productos = json_decode(file_get_contents('datos/productos.json'),true);
    $columns = array_column($productos, 'anio');
    array_multisort($columns, SORT_DESC, $productos);
?>
<?php
$mostrar = '0';   
   foreach ($productos as $prod){

            
            if ($prod['anio'] < '2015' && $mostrar <= '3') {
                $mostrar++;
 ?>
            <div class="col-lg-3">
                <h5><?php echo $prod['anio']?></h5>

                        <a href="product-details.php?id=<?php echo $prod['id']?>"><img class="img-fluid" src="images/<?php echo $prod['imagen'] ?>" alt=""></a>
                        <h4><?php echo $prod['nombre']?></h4>
                        <p><strong> $<?php echo $prod['precio'] ?> </strong></p>
                        <h4><a class="btn btn-warning" href="product-details.php?id=<?php echo $prod['id']?>" title="add to cart"> Detalles </a></h4>

                  
            </div>                
        <?php }  }?>