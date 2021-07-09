<?php
include('header.php');

$datos = file_get_contents('../DataAccess/usuarios.json');
//convierto a un array
$datosJson = json_decode($datos,true);
$errorpass="";
if(isset($_POST['tPass1'])&&isset($_POST['tPass2']))  {
if($_POST['tPass1']==$_POST['tPass2']){

    if(isset($_POST['add'])){
        
    
        $id = date('j/n/Y, H:i:s');

        $datosJson[$id] = array('id'=>$id,'tipo'=> "Cliente", 'nombre'=>$_POST['tName'], 'apellido'=>$_POST['tApellido'],
         'fecha'=>$_POST['tFecha'], 'user'=>$_POST['tUser'], 'email'=>$_POST['tEmail'], 'pass'=>$_POST['tPass1'], 'direccion'=>$_POST['tDireccion'],
         'telefono'=>$_POST['tTel'], 'pedidos'=>$_POST[''], 'gasto'=>$_POST['']);
    
        //trunco el archivo
        $fp = fopen('../DataAccess/usuarios.json','w');
        //convierto a json string
        $datosString = json_encode($datosJson);
        //guardo el archivo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('login.php');
	}
	
  }else{
    $errorpass="Las Contraseñas no coinciden";
  }
}
?>

<div class="container-fluid">

	<div class="row">
	<div class="col-12">
        <div class="col-10 col-md-8 col-lg-5 mx-auto">		
	
	<div class="card bg-transparent border-0">
	<form class="form-horizontal py-4" method="POST" action="">
		<div class="d-flex justify-content-center pb-4"><i class="fas fa-user-plus" style="font-size: 100px"></i></div>
		
		<div class="control-group">
			<div class="controls py-2">
				
				<input type="text" class="form-control form-control-lg" name="tUser" id="txtUser" placeholder="Usuario" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="password" name="tPass1" id="txtPass1" placeholder="Contraseña"required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="password" name="tPass2" id="txtPass2"  placeholder="Repetir Contraseña"required>
			</div>
		</div>
		<div class="d-flex justify-content-center">
                <p class="text-danger form-control-lg"><?php if ($errorpass != ""){ echo $errorpass; }?></p>
                </div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="tName" id="txtName" placeholder="Nombre" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="tApellido" id="txtApellido" placeholder="Apellido" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				
				<input class="form-control form-control-lg" type="text" name="tEmail" id="txtEmail" placeholder="Email" required>
			</div>
		</div>
		<div class="control-group">
			<div class="controls py-2">
				<input class="form-control form-control-lg" type="date" name="tFecha" id="txtFecha"  required>
			</div>
		</div>
		<hr>
		<label class="form-control-lg" for="txtDireccion">Direccion:</label>
		<div class="control-group row">
			<div class="controls py-2 col-md-6">
				<div>
					<input class="form-control form-control-lg" type="text" name="tDireccion[barrio]" id="txtDireccion" placeholder="Barrio" >
				</div>
			</div>
			<div class="controls py-2 col-md-6">
				<div>
					<input class="form-control form-control-lg" type="text" name="tDireccion[calle]" id="txtDireccion" placeholder="Calle" >
				</div>
			</div>
		</div>
		<div class="control-group row">
			<div class="controls py-2 col-md-4">
				<div>
					<input class="form-control form-control-lg" type="text" name="tDireccion[altura]" id="txtDireccion" placeholder="Altura" >
				</div>
			</div>
			<div class="controls py-2 col-md-4">
				<div>
					<input class="form-control form-control-lg" type="text" name="tDireccion[piso]"  id="txtDireccion" placeholder="Piso" >
				</div>
			</div>
			<div class="controls py-2 col-md-4">
				<div>
					<input class="form-control form-control-lg" type="text" name="tDireccion[depto]" id="txtDireccion" placeholder="Depto" >
				</div>
			</div>
		</div>
		<hr>
		<div class="control-group">
			<div class="controls py-2">
 				<input class="form-control form-control-lg" type="text" name="tTel"  id="txtTelefono" placeholder="Teléfono" >
			</div>
		</div>		
		<div class="control-group">
		<center>
			<input class="btn btn-danger" type="reset" value="Reset">
			<input class="btn btn-success" type="submit" name="add" value="Registrarse">
		</center>
		</div>
	</form>
	</div>
</form>
</div>
</div>
</div>

<?php
include('footer.php');
?> 