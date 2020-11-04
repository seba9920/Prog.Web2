<?php
$seccion='contacto';
include('inc/header.php');
?>

<!-- 
Body Section 
-->
	<hr class="soften">
	<div class="well well-small">
	<h1>Visitanos</h1>
	<hr class="soften"/>	
	<div class="row-fluid">
		<div class="span8 relative">
		<iframe style="width:100%; height:350px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d820.9965489892207!2d-58.396387782290056!3d-34.60451056844648!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bccaea670d4e67%3A0x2198c954311ad6d9!2sDa%20Vinci!5e0!3m2!1ses!2sar!4v1600835578184!5m2!1ses!2sar"></iframe>
  
		<div class="absoluteBlk">
		<div class="well wellsmall">
		
		
		<h4>¿Quienes somos?</h4>
		<h5>Somos estudiantes en la Escuela DaVicci de la carrera de Analista en Sistemas</h5>
		<h5>-Jhorky Jhosep Escalante Quispe</br>
		-Gilberto Ariel Prieto</br> 
		-Roberto Andrés Rocco</br>
		-Rodrigo Sebastian Tolaba</h5>
		<h4>Direccion</h4>
		<h5>
		Av. Corrientes 2037<br/>
		Argentina, Buenos Aires, CABA C1001<br/></h5>

		</div>
		</div>
		</div>
		
		<div class="span4">
		<h4>Contactanos</h4>
		<form class="form-horizontal">
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="*Nombre y apellido" class="input-xlarge" required/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="*Email" class="input-xlarge" required/>
           
		  </div>
		  <div class="control-group">
           
              <input type="tel" placeholder="Telefono" class="input-xlarge"/>
           
          </div>
		   <div class="control-group">
           
              <input type="text" placeholder="*Area de contacto" class="input-xlarge" pattern="[0-9]{3}-[0-9]{4}-[0-9]{4}" required/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge" name="*Comentario"> </textarea>
           
          </div>
		    <input class="shopBtn" type="reset" value="Borrar"/>
            <button class="shopBtn" type="submit">Enviar email</button>

        </fieldset>
      </form>
		</div>
	</div>

	
</div>
<?php include('inc/footer.php');?>