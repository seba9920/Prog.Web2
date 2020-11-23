<?php

include_once('functions/funcs.php');


//ADMIN--------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

$datos = file_get_contents('../datos/admin.json');
//convierto a un array
$datosJson = json_decode($datos,true);
$errorpass="";
if(isset($_POST['tPass1'])&&isset($_POST['tPass2']))  {
if($_POST['tPass1']==$_POST['tPass2']){
    if(isset($_POST['add'])){
        
    
        $id = date('j/n/Y, H:i:s');

        $datosJson[$id] = array('id'=>$id,'tipo'=> "Admin", 'nombre'=>$_POST['tName'], 'apellido'=>$_POST['tApellido'],
         'fecha'=>$_POST['tFecha'], 'user'=>$_POST['tUser'], 'email'=>$_POST['tEmail'], 'pass'=>$_POST['tPass1'], 'direccion'=>$_POST['tDireccion'],
         'telefono'=>$_POST['tTel'], 'pedidos'=>$_POST[''], 'gasto'=>$_POST['']);
    
        //trunco el archivo
        $fp = fopen('../datos/admin.json','w');
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


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" method="POST" action="">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="tName" id="txtName" placeholder="Nombre"
                    value="<?php if(isset($_POST['tName'])) { echo $_POST['tName']; } ?>" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="tApellido" id="txtApellido" placeholder="Apellido" 
                    value="<?php if(isset($_POST['tApellido'])) { echo $_POST['tApellido']; } ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="date" class="form-control form-control-user" name="tFecha" id="txtFecha" placeholder="Fecha de Nacimiento"
                  value="<?php if(isset($_POST['tFecha'])) { echo $_POST['tFecha']; } ?>" required>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="tEmail" id="txtEmail" placeholder="Email Address"
                  value="<?php if(isset($_POST['tEmail'])) { echo $_POST['tEmail']; } ?>" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="tUser" id="txtUser" placeholder="Usuario"
                  value="<?php if(isset($_POST['tUser'])) { echo $_POST['tUser']; } ?>" required>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="tPass1" id="txtPass1" placeholder="Password" required>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="tPass2" id="txtPass2" placeholder="Repeat Password" required>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                <p class="text-danger"><?php if ($errorpass != ""){ echo $errorpass; }?></p>
                </div>
                <hr>
                <label for="txtDireccion">Direccion:</label>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="tDireccion[barrio]" id="txtDireccion" placeholder="Barrio"
                    value="<?php if(isset($_POST['tDireccion']['barrio'])) { echo $_POST['tDireccion']['barrio']; } ?>">
                  </div>
                  <div class="col-sm-6 ">
                    <input type="text" class="form-control form-control-user" name="tDireccion[calle]" id="txtDireccion" placeholder="Calle"
                    value="<?php if(isset($_POST['tDireccion']['calle'])) { echo $_POST['tDireccion']['calle']; } ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="tDireccion[altura]" id="txtDireccion" placeholder="Altura"
                    value="<?php if(isset($_POST['tDireccion']['altura'])) { echo $_POST['tDireccion']['altura']; } ?>">
                  </div>
                  <div class="col-sm-4 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="tDireccion[piso]"  id="txtDireccion" placeholder="Piso"
                    value="<?php if(isset($_POST['tDireccion']['piso'])) { echo $_POST['tDireccion']['piso']; } ?>">
                  </div>
                  <div class="col-sm-4">
                    <input type="text" class="form-control form-control-user" name="tDireccion[depto]" id="txtDireccion" placeholder="Depto"
                    value="<?php if(isset($_POST['tDireccion']['depto'])) { echo $_POST['tDireccion']['depto']; } ?>">
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="tTel"  id="txtTelefono" placeholder="Telefono"
                  value="<?php if(isset($_POST['tTel'])) { echo $_POST['tTel']; } ?>">
                </div>
                <hr>
                <tr >
                <td ><input type="submit" name="add" value="Registrarse" class="btn btn-primary btn-user btn-block"></td>
                <td ><input type="reset" value="Borrar" class="btn btn-danger btn-user btn-block"></td>
                </tr>
                
              </form>
              <hr>
              
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
