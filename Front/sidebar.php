
         <div class="col-12 col-lg-2  bg-dark text-primary">

<!-- ################################################################################################ -->
<!-- #########################################--GENEROS--############################################ -->
<!-- ################################################################################################ -->

		  <div class="col-12">    	
        	<h5>Generos</h5>

								<ul>									
										<?php 
										require_once('../Helpers/config.php');
										require_once('../Business/GeneroBusiness.php');
										$GeneroB = new GeneroBusiness($con);
										
										require_once('../Business/ClasificacionBusiness.php');
										$ClasificacionB = new ClasificacionBusiness($con);

										foreach($GeneroB->getEntradas($_GET) as $cat){ 
											if($cat->getStatus()==1){
											if(!empty($cat->getNombre())){?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo $cat->getID()?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=<?php echo isset($_GET['orden'])?$_GET['orden']:''?> ">
												
													<span class="oi oi-chevron-right"></span>
													<?php echo $cat->getNombre()?>
												</a>

											</li>
									</div>
										<?php } } }?>
										
											<li>
												<a class="text-white" href="products.php?genero=
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=<?php echo isset($_GET['orden'])?$_GET['orden']:''?> ">
													<span class="icon-chevron-right"></span>
												Todos
												</a>
											</li>
								</ul>
							 
		</div>
		
<!-- ################################################################################################ -->
<!-- #######################################--SUBGENEROS--########################################### -->
<!-- ################################################################################################ -->

		<div class="col-12  ">	
      	<h5>SubGeneros</h5>

								<ul>									
										<?php 
										require_once('../Business/SubGeneroBusiness.php');
										$SubGeneroB = new SubGeneroBusiness($con);
										
										

										foreach($SubGeneroB->getEntradas($_GET) as $subcat){ 
										if($subcat->getStatus()==1){
										if(!empty($subcat->getNombre())){?>
									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo $subcat->getID()?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=<?php echo isset($_GET['orden'])?$_GET['orden']:'' ?> ">

													<span class="oi oi-chevron-right"></span>
													<?php echo $subcat->getNombre()?>
												</a>

											</li>
									</div>
										<?php } } } ?>
										
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=<?php echo isset($_GET['orden'])?$_GET['orden']:'' ?> ">
													<span class="icon-chevron-right"></span>
												Todos
												</a>
											</li>
								</ul>
							 
		</div>

<!-- ################################################################################################ -->
<!-- ######################################--CLASIFICACION--######################################### -->
<!-- ################################################################################################ -->

    <div class="col-12 ">
      <h5>Clasificacion por edades</h5>

								<ul> 
										<?php 
											
													
											foreach($ClasificacionB->getEntradas($_GET) as $mar){ 
												if($mar->getStatus()==1){?>
											
									<div class="list-group">												
											<li>
													<a class="text-white" href="products.php?
													genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
													&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
													&clasificacion=<?php echo $mar->getID()?>
													&orden=<?php echo isset($_GET['orden'])?$_GET['orden']:'' ?> ">

														<span class="oi oi-chevron-right"></span>
														<?php echo $mar->getNombre()?></a>
											</li>
									</div>
										<?php }}?>
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=
												&orden=<?php echo isset($_GET['orden'])?$_GET['orden']:'' ?>">

													<span class="icon-chevron-right"></span>
												Todos
													</a>
											</li>
								</ul>							
							
	  </div>

<!-- ################################################################################################ -->
<!-- ##########################################--ORDEN--############################################# -->
<!-- ################################################################################################ -->

	  <div class="col-12  ">	
      	<h5>Ordenados por</h5>
								<ul>									
									<?php
									if(!isset($_GET['orden']) || empty($_GET['orden']) || $_GET['orden'] !=1){
									?>
									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=1">
													<span class="oi oi-chevron-right"></span>
													A-Z
													
												</a>

											</li>
									</div>
									<?php
									}
									if(!isset($_GET['orden']) || empty($_GET['orden']) || $_GET['orden'] !=2){
									?>
									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=2">
													<span class="oi oi-chevron-right"></span>
													Z-A
												</a>

											</li>
									</div>

									<?php
									}
									if(!isset($_GET['orden']) || empty($_GET['orden']) || $_GET['orden'] !=3){
									?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=3">
													<span class="oi oi-chevron-right"></span>
													Año Asc
												</a>

											</li>
									</div>

									<?php
									}
									if(!isset($_GET['orden']) || empty($_GET['orden']) || $_GET['orden'] !=4){
									?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=4">
													<span class="oi oi-chevron-right"></span>
													Año Desc
												</a>

											</li>
									</div>

									<?php
									}
									if(!isset($_GET['orden']) || empty($_GET['orden']) || $_GET['orden'] !=5){
									?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=5">
													<span class="oi oi-chevron-right"></span>
													Rating Desc
												</a>

											</li>
									</div>

									<?php
									}
									if(!isset($_GET['orden']) || empty($_GET['orden']) || $_GET['orden'] !=6){
									?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=6">
													<span class="oi oi-chevron-right"></span>
													Rating Asc
												</a>

											</li>
									</div>
									<?php } ?>

									<div class="list-group">	
											<li>
												<a class="text-white" href="products.php?
												genero=<?php echo isset($_GET['genero'])?$_GET['genero']:'' ?>
												&subgenero=<?php echo isset($_GET['subgenero'])?$_GET['subgenero']:'' ?>
												&clasificacion=<?php echo isset($_GET['clasificacion'])?$_GET['clasificacion']:'' ?>
												&orden=">
													<span class="oi oi-chevron-right"></span>
													Ningun Orden
												</a>

											</li>
									</div>

								</ul>
							 
		</div>
    </div>     