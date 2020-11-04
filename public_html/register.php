<?php include('inc/header.php');?>
<!-- 
Body Section 
-->
	<div class="row">
	<div class="span12">
	
	<div class="well">
	<form class="form-horizontal">
		<center><h3>Datos Personales</h3></center>
		<hr>
		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="inputFname">Usuario:&nbsp;<sup>*&nbsp;</sup></label>
				<input type="text" name="user" placeholder="Usuario" required>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="inputFname">Nombre:&nbsp;<sup>*&nbsp;</sup></label>
				<input type="text" name="name" placeholder="Nombre" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="inputFname">Apellido:&nbsp;<sup>*&nbsp;</sup></label>
				<input type="text" name="lastname" placeholder="Apellido" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="inputFname">Email:&nbsp;<sup>*&nbsp;</sup></label>
				<input type="text" name="mail" placeholder="Email" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="inputFname">Contraseña:&nbsp;<sup>*&nbsp;</sup></label>
				<input type="text" name="pass" placeholder="Contraseña"required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				<label class="control-label" for="inputFname">Fecha de Nacimiento:&nbsp;<sup>*&nbsp;</sup></label>
				<input type="date" name="date" placeholder="Usuario" required>
			</div>
		</div>
		<div class="control-group">
		<center>
			<input type="reset" value="Reset" class="exclusive shopBtn">
			<input type="submit" name="register" value="Registrarse" class="exclusive shopBtn">
		</center>
		</div>
	</form>
	</div>
</form>
<?php include('inc/footer.php');?>

</div>
</div>
</div>
