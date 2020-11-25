<?php
include('inc/header.php');

//obtengo el contenido del archivo
$datos = file_get_contents('datos/comentarios.json');
//convierto a un array
$datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){
		
		$id = date('j/n/Y, H:i:s');

        $datosJson[$id] = array('id'=>$id,'user'=> $_SESSION['user'],'peli'=> $_GET['id'], 'rating'=>$_POST['tRating'], 'comentario'=>$_POST['tComentario']);
    
        //trunco el archivo
        $fp = fopen('datos/comentarios.json','w');
        //convierto a json string
        $datosString = json_encode($datosJson);
        //guardo el archivo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('product-details.php?id='.$_GET['id'] );
	}
	$totalrating=0;
	$tot=0;
	$prom=0;
	
						
					$comments = json_decode(file_get_contents('datos/comentarios.json'),true);
					foreach($comments as $com){ 
					 	if($com['peli'] == $_GET['id']){ 
					 
							$totalrating +=$com['rating'];
							$tot++;
						} 
					} 
				$prom=$totalrating/$tot;
	
?>





<div class="container-fluid">
    <div class="row">
        <?php include('inc/sidebar.php');?>


        <!-- Detalle del producto -->
        <div class="col-12 col-lg-10">
            <h3>Listado de Peliculas</h3>
            <div class="row">

                <?php
		  $productos = json_decode(file_get_contents('datos/productos.json'),true);
		  
		  $columns = array_column($productos, 'clasificacion');
          array_multisort($columns, SORT_DESC, $productos);
           
		  

		  	foreach($productos as $prod){
				
				
				$imprimir=true;

					
					if(!empty($_GET['id'])){
						if($prod['id'] !=$_GET['id']){
							$imprimir=false;
						}
					}
					
						if($imprimir){
						?>
                <div class="col-10">

                    <div>
                        <div class="row">
                            <div class="col-5">

                                <img class="img-fluid" src="
				  <?php 
						if (is_array($prod['imagen'])) {
							echo 'admin/img/'.$prod['imagen']['name'];
						} else {
						echo 'images/'.$prod['imagen'];
						};
                          ?>
				  
				  " alt="">
                            </div>
                            <div class="col-7">
                                <h3><?php echo $prod['nombre']?></h3>
                                <!--<hr class="soft"/>-->


                                <p class="text-dark"><strong>Genero:</strong>
                                    <?php 

                        if (is_array($prod['genero'])) {
                        
                        foreach ($prod['genero'] as $gen) {
                          
		                      $categorias = json_decode(file_get_contents('datos/categorias.json'),true);
                          
                          echo $categorias[$gen]['nombre'].' ';
                          
                        };
                      } 
                      ?>
                                </p>
                                <br>
                                <p class="text-dark"> <strong>Precio:</strong> $<?php echo $prod['precio']?></p>
                                <br>
                                <p class="text-dark"><strong>Clasificacion por edades:</strong> <?php echo $prod['clasificacion']?></p>
                                <br>
                                <p class="text-dark"><strong>Año:</strong> <?php echo $prod['anio']?></p>
                            </div>
                        </div>
                        
                        <!--           <ul id="productDetail" class="nav nav-pills">
              <li class="active"><a href="#home" data-toggle="tab">Detalles</a></li>
            </ul>
            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			  
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow"><td class="techSpecTD1">Directores:</td><td class="techSpecTD2"><?php echo $prod['director']?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Actores: </td><td class="techSpecTD2"><?php echo $prod['actores']?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Duracion:</td><td class="techSpecTD2"><?php echo $prod['duracion']?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Rating:</td><td class="techSpecTD2">*<?php echo $prod['rating']?>/10</td></tr>
				
				</tbody>
				</table>
				<h4>Descripcion</h4>
				<p><?php echo $prod['descripcion']?></p>
			</div>
			<div class="tab-pane fade" id="profile">
				</div>
            </div>-->

                        <ul class="nav nav-pills pt-3">
                              <li><a class="btn btn-primary" data-toggle="tab" href="#home">Detalle</a></li>
                        </ul>
                        <div class="tab-content bg-transparent" style="padding:20px;">
                              <div id="home" class="tab-pane fade-show">
                                    <div class="row">Directores:
                                    <div class="col"><?php echo $prod['director']?></div>
                                </div>
                                    <div class="row">Actores:
                                    <div class="col"><?php echo $prod['actores']?></div>
                                </div>
                                    <div class="row">Duracion:
                                    <div class="col"><?php echo $prod['duracion']?></div>
                                </div>
								    <div class="row">Descripcion:
                                    <div class="col"><?php echo $prod['descripcion']?></div>
                                </div>
                                    <div class="row">Rating:
                                    <div class="col"><?php echo round($prom, 2); ?> / 5 </div>
                                </div>
                                  </div>
                        </div>



                    </div>






                </div>


            </div> <!-- Body wrapper -->

            <?php
break;
			}}
			?>


				<div class="col-md-10 mx-auto">
					<div class="d-flex justify-content-center"><h4 class="mb-3">Comentarios</h4></div>

					<?php 
						
								$t=0;
						$columns = array_column($comments, 'id');
						array_multisort($columns, SORT_DESC, $comments);
							foreach($comments as $com){ 
								if($t==10){break;}
											
								if($com['peli'] == $_GET['id']){ ?>	
					<div class="container-fluid border rounded border-dark mb-3" style="box-shadow: inset 0 0 10px; word-wrap: break-word;">

									
				            <div class="box box-b box-block my-4">

				              <div class="box-comment-info d-flex justify-content-between">
				                <div class="d-flex">
				                <!--<img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(27).jpg" alt="Howard Thomas Avatar"
									 class="rounded-circle z-depth-0 mr-3" alt="avatar image" height="50">-->
									 <i class="fas fa-user-circle mr-2" style="font-size: 40px;"></i> 
				                <div>

					                  <div class="box-comment-author">
					                    <b><?php echo $com['user'];?></b>
					                  </div>
					                  <div>
									  <?php echo $com['id'];?>
					                  </div>
					                </div>
				                </div>
				                <div class="mr-5"><b>Rating:</b> <?php echo $com['rating'];?></div>
				              </div>
				              <div class="mt-4">				              	
							  <?php echo $com['comentario'];?>
				              </div>
							
							</div>
							
				    </div>
					<?php 
				$totalrating +=$com['rating'];
				$tot++;
				$t++;
				} } 
				$prom=$totalrating/$tot;
				
				?>
				</div>

<!--
			<div class="container-fluid col-md-10 mx-auto">
				<div class="card text-white bg-dark mb-3 d-inline-block" style="max-width: 20rem;">
					  <div class="card-header">Nov 15, 2020</div>
					  	<div class="card-body">
							<img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Howard Thomas Avatar" 
								class="rounded-circle z-depth-0 mr-3" alt="avatar image" height="50">
					    	<h4 class="card-title">Howard Thomas</h4>
					    	<p class="card-text mt-4" style="color: white;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					  </div>
				</div>
			</div>


		<div class="container-fluid col-md-10 mx-auto">

			<div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true">
			  <div class="toast-header my-2">
			  	<img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" alt="Howard Thomas Avatar" class="rounded-circle z-depth-0 mr-3" alt="avatar image" height="50">
			    <strong class="mr-auto">Howard Thomas</strong><br/>
			    <small>Nov 15, 2020</small>
			    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
			      <span aria-hidden="true">&times;</span>-->
	<!--		    </button>
			  </div>
			  <div class="toast-body">
			  	<strong class="mr-auto">Rating:</strong><br/>
			    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
								quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
								consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
								cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
								proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
			  </div>-->


		<div class="container-fluid">

                    <div class="row py-4">
        <div class="col-md-6 mx-auto">

		<?php
		if(isset($_SESSION['usuario_logueado'])){ ?>

          <form method="POST" action="">
            <div class="form-group">
                <div class="d-flex justify-content-center"><h4 class="mb-3">Escribe tu comentario</h4></div>

           	</div>
		
            <div class="form-group">
              <!--<input type="text" name="rating" class="form-control form-control-lg"
                     id="example-input-rating"
					 placeholder="Rating 1-5">-->

					 <label for="txtRating">Rating: </label>
					 <select name="tRating" id="txtRating" class="bg-danger text-white">
							 
						 <option value="1">Calificacion - 1</option>					 
						 <option value="2">Calificacion - 2</option>
						 <option value="3">Calificacion - 3</option>
						 <option value="4">Calificacion - 4</option>
						 <option value="5">Calificacion - 5</option>
					 </select>	 
            </div>

            <div class="form-group">
              <textarea placeholder="Escribe tu comentario..."
                        class="form-control"
                        id="example-textarea" name="tComentario" rows="7"></textarea>
            </div>

                                <div class="text-right">
                                    <a href="#" class="btn btn-danger">
                                        <span>Reset</span>
                                    </a>
                                    <!--<a href="#" class="btn btn-success">
										<span>Enviar</span>-->
									<input class="btn btn-success" type="submit" name="add" value="Enviar">	
                                        
                                    </a>
                                </div>

		  </form>
		  <?php } ?>
        </div>
      </div>
</div>

        </div>
        
        
        
    </div>
</div>









    <?php
include('inc/footer.php');
?>