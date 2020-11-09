<?php
include_once('inc/header.php');
include_once('admin/functions/funcs.php');

//obtengo el contenido del archivo
$datos = file_get_contents('datos/comentarios.json');
//convierto a un array
$datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){
        
    
        if(isset($_GET['edit'])){
            //modificando
            $id = $_GET['edit'];
        }else{
            //agrego 
            $id = date('j/n/Y, H:i:s');
        }



        $datosJson[$id] = array('id'=>$id,'idusuario'=>$_POST['tName'], 'idpelicula'=>$_POST['tName'],
         'comentario'=>$_POST['tApellido'],'valoracion'=>$_POST['tFecha']);
    
        //trunco el archivo
        $fp = fopen('datos/comentarios.json','w');
        //convierto a json string
        $datosString = json_encode($datosJson);
        //guardo el archivo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('');
    }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }
?>
<!-- 
Body Section 
-->
	<div class="row">
	<div id="sidebar" class="span3">
		<?php include('inc/sidebar.php');?>
	</div>

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
	<div class="span9">
    
	<div class="well well-small">
	<div class="row-fluid">
			      <div class="span5">
			      
				  <img src="
				  <?php 
						if (is_array($prod['imagen'])) {
							echo 'admin/img/'.$prod['imagen']['name'];
						} else {
						echo 'images/'.$prod['imagen'];
						};
                          ?>
				  
				  " alt="">
			</div>
			<div class="span7">
				<h3><?php echo $prod['nombre']?></h3>
				<hr class="soft"/>
				
				
				<p><strong>Genero:</strong> 
				<?php 

                        if (is_array($prod['genero'])) {
                        
                        foreach ($prod['genero'] as $gen) {
                          
		                      $categorias = json_decode(file_get_contents('datos/categorias.json'),true);
                          
                          echo $categorias[$gen]['nombre'].', ';
                          
                        };
                      } 
                      ?>
				</p>
				<br>
				<p><strong>Precio:</strong> $<?php echo $prod['precio']?></p>
				<br>
				<p><strong>Clasificacion por edades:</strong> <?php echo $prod['clasificacion']?></p>
				<br>
				<p><strong>Año:</strong> <?php echo $prod['anio']?></p>
		</div>
			</div>
				<hr class="softn clr"/>
            <ul id="productDetail" class="nav nav-tabs">
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
            </div>
            
 </div>
 <div class="well well-lg cntr">
			<div class="row-fluid ">
			    	  
					  
					  <!-- ***************************************************************** -->
					  <!-- MODIFICAR QUE SE MUESTRE CUANDO EL USUARIO INICIO SESION -->
					  <!-- ***************************************************************** -->


			    <h4>Comentarios</h4>
		<form class="form-horizontal">
        <fieldset>
           <div class="control-group">
           
              <input type="text" placeholder="*Email" class="input-xlarge span9" required/>
           
		  </div>
		  <div class="control-group">
           
              <input type="text" placeholder="Rating(0-5)" title="Valora la pelicula" class="input-xlarge span9"/>
           
          </div>
		   
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge span9" title="Dejanos tu comentario" name="*Comentario"> </textarea>
           
          </div>
		    <input class="shopBtn" type="reset" value="Borrar"/>
            <button class="shopBtn" type="submit">Enviar Comentario</button>

        </fieldset>
      </form>
			    
			    </div>    
			    </div>
 </div>
    
 
</div> <!-- Body wrapper -->

<?php
break;
			}}
			?>
			


<?php include('inc/footer.php'); ?>