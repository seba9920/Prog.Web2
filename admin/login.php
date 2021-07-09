<?php
include('../Helpers/funcs.php');

include_once('../Helpers/config.php');

session_start();
require_once('../Business/UserBusiness.php');
$get = new UserBusiness($con);

if(isset($_POST['adminlogin'])){
  
  $resul= $get->SessionAdmin($_POST);
  if($resul ==true){
        $_SESSION['admin_usuario_logueado'] = true;
        $_SESSION['adminuser'] = $resul->getNombre()." ".$resul->getApellido();
        $_SESSION['admin_error'] = "0";
        redirect('peliculas.php');
        
  }else{
        $_SESSION['admin_error'] = "1";  
  }

  /* die();
  foreach($resultado as $admin) { 
      
      if($_POST['adminpass'] == $admin['pass'] && $_POST['adminuser'] == $admin['usuario']){
        $_SESSION['admin_usuario_logueado'] = true;
        $_SESSION['adminuser'] = $admin['nombre']." ".$admin['apellido'];
        $_SESSION['admin_error'] = "0";
        redirect('peliculas.php');
      break;
      }else{
        $_SESSION['admin_error'] = "1";  
        
      }

  } */

}

if(isset($_GET['adminlogout'])){
  unset($_SESSION['admin_usuario_logueado']);
  unset($_SESSION['adminuser']);
  $_SESSION['admin_error'] = "0";
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

  <title>SB Admin 2 - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="text" name="adminuser" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Usuario" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="adminpass" class="form-control form-control-user" id="exampleInputPassword" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                      <p class="alert-danger"><b>
                      <?php if(isset($_SESSION['admin_error'])){if($_SESSION['admin_error'] == "1" ){ echo "Usuario o Contraseña incorrecta" ;  }}?>
                      </b></p>    
                    <button class="btn btn-primary btn-user btn-block" type="submit" name="adminlogin">Iniciar Sesion</button>
  
                    
                    <!-- <hr>
                    <a href="index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <hr>
                  <!-- <div class="text-center">
                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                  </div> -->
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>
