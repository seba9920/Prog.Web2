<?php
include('inc/header.php');
?> 	
<div class="container-fluid">

	<div class="row">
	<div class="col-12">
        <div class="col-10 col-md-8 col-lg-5 mx-auto">		
	
	<div class="card bg-transparent border-0">
	<form class="form-horizontal py-4">
		<div class="d-flex justify-content-center pb-4"><i class="fas fa-user-plus" style="font-size: 100px"></i></div>
		
		<div class="control-group">
			<div class="controls py-2">
				
				<input type="text" class="form-control form-control-lg" name="user" placeholder="Usuario" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="password" name="pass" placeholder="Contraseña"required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="name" placeholder="Nombre" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="lastname" placeholder="Apellido" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="mail" placeholder="Email" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="date" name="date" placeholder="Usuario" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="dir" placeholder="Dirección" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="phone" placeholder="Teléfono" required>
			</div>
		</div>		
		<div class="control-group">
		<center>
			<input class="btn btn-danger" type="reset" value="Reset">
			<input class="btn btn-success" type="submit" name="register" value="Registrarse">
		</center>
		</div>
	</form>
	</div>
</form>
</div>
</div>
</div>

<?php
include('inc/footer.php');
?> 