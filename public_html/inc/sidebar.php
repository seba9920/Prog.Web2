
    <div class="col-12 col-lg-2  bg-dark text-primary">
		<div class="col-12">    	
      	<h5>Categorias</h5>

								<ul>									
										<?php 
										$catdatos = file_get_contents('datos/categorias.json');
										$categorias = json_decode($catdatos,true);
									
										foreach($categorias as $cat){ ?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?cat=<?php echo $cat['id']?>&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>">
													<span class="oi oi-chevron-right"></span>
													<?php echo $cat['nombre']?>
												</a>

											</li>
									</div>
										<?php } ?>
										
											<li>
												<a class="text-white" href="products.php?cat=&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>">
													<span class="icon-chevron-right"></span>
												Todos
												</a>
											</li>
								</ul>
							 
		</div>
    <div class="col-12 col-lg-2 ">
      <h5>Clasificacion por edades</h5>

								<ul> 
										<?php 
											$mardatos = file_get_contents('datos/clasificacion.json');
											$marcas = json_decode($mardatos,true);
													
											foreach($marcas as $mar){ ?>
									<div class="list-group">												
											<li>
													<a class="text-white" href="products.php?cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>&clasificacion=<?php echo $mar['nombre']?>">
														<span class="oi oi-chevron-right"></span>
														<?php echo $mar['nombre']?></a>
											</li>
									</div>
										<?php }?>
											<li>
												<a class="text-white" href="products.php?cat=<?php echo isset($_GET['cat'])?$_GET['cat']:'' ?>&clasificacion=">
													<span class="icon-chevron-right"></span>
												Todos
													</a>
											</li>
								</ul>							
							
	</div>
   </div>     