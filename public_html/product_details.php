<?php
	include_once('inc/header.php');
?>
<!-- 
Body Section 
-->
	<div class="row">
	<div id="sidebar" class="span3">
		<?php include('inc/sidebar.php');?>
	</div>

	<?php
		  include('datos/productos.php');
		  
		  $columns = array_column($productos, 'clasificacion');
          array_multisort($columns, SORT_DESC, $productos);
           
		  include('datos/categorias.php');

		  	foreach($productos as $prod){
				
				if($prod['activo']==true){
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
			      
				  <img src="images/<?php echo $prod['imagen'] ?>" alt="">
			</div>
			<div class="span7">
				<h3><?php echo $prod['nombre']?></h3>
				<hr class="soft"/>
				
				
				<p>Genero: <?php echo $prod['genero']?></p>
				<br>
				<p>Precio: $<?php echo $prod['precio']?></p>
				<br>
				<p>Clasificacion por edades: <?php echo $prod['clasificacion']?></p>
				<br>
				<p>Año: <?php echo $prod['anio']?></p>
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
			}}}
			?>
			


<?php include('inc/footer.php'); ?>