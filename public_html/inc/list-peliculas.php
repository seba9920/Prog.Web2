			<div class="col-12 col-lg-10">
		      <h3>Listado de Peliculas</h3>
		      	<div class="row">


						  
						  
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
											
											}elseif($prod['genero'] !=$_GET['cat']||$prod['categorias'] !=$_GET['cat']){
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

												<div class="col-lg-3">
													<a href="product-details.php?id=<?php echo $prod['id']?>" class="overlay"></a>
													<a href="product-details.php?id=<?php echo $prod['id']?>"><center><img class="img-fluid" src="<?php echo $img ?>" alt=""></center></a>
														<div class="caption cntr peliculas" align="center">
															<h4><?php echo $prod['nombre'] ?></h4>
															<strong><?php echo $prod['anio'] ?></strong>
															<p><strong>$<?php echo $prod['precio'] ?></strong></p>
													<h4><a class="btn btn-warning" href="product-details.php?id=<?php echo $prod['id']?>" title="add to cart">Detalles</a></h4>
															<br class="clr">
														</div>
												</div>

							
							
							<?php
							}}
							?>
							
							

				</div>
			
			</div>