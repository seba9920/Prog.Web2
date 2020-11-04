<?php include('inc/header.php');?>
<!-- 
Body Section 
-->
	<div class="row" style="margin-left:40px">
	<div class="well span10">
	<div class="span10">

	
	<div class="row" style="margin-left:40px">
	
		<div class="span4">
			<div class="well">
			<center><h5>Iniciar Sesion</h5></center>
			<hr class="soften"/>
			<form>
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" placeholder="Email">
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Password</label>
				<div class="controls">
				  <input type="password" class="span3" placeholder="Password">
				</div>
			  </div>
			<div class="control-group">
		  	<center>
				<input type="submit" value="Iniciar Sesion" class="exclusive shopBtn">
				<input type="submit" name="Registrarse" value="Registrarse" class="exclusive shopBtn">
				
			</center>
			</div>
			</form>
		</div>
		</div>
		<div class="span4">
			<div class="well">
			<center><h5>Recuperar Contraseña</h5></center>
			<hr class="soften"/>
			<center>Si olvidadeste tu contraseña, ingresa tu email y te enviaremos un link para recuperarla.</center><br/>
			<form>
			  <div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input class="span3"  type="text" placeholder="Email">
				</div>
			  </div>
			  <div class="controls">
			  <button type="submit" class="exclusive shopBtn">Enviar</button>
			  </div>
			</form>
		</div>
		</div>
		
	</div>	
	
</div>
</div>
</div>
<?php include('inc/footer.php');?>