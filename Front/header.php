<?php
require_once('../Helpers/funcs.php');
require_once('../Helpers/config.php');

session_start();

require_once('../Business/UserBusiness.php');
$get = new UserBusiness($con);
require_once('../Business/PerfilBusiness.php');
$perfil = new PerfilBusiness($con);

if(isset($_POST['login'])){
  
  $resul= $get->SessionUser($_POST);
  if($resul ==true){
    foreach($perfil->getPerfilUsuario($resul->getIDUsuario()) as $res){
      if($res->getNombre()=='Admin'){
        $_SESSION['admin'] = true;
      }
    }
    

        $_SESSION['usuario_logueado'] = true;
        $_SESSION['user'] = $resul->getNombre()." ".$resul->getApellido();
        $_SESSION['error'] = "0";
        $_SESSION['id'] = $resul->getIDUsuario();
        redirect('peliculas.php');
        
  }else{
        $_SESSION['admin_error'] = "1";  
  }
}
 

if(isset($_GET['logout'])){
  unset($_SESSION['usuario_logueado']);
  unset($_SESSION['user']);
  unset($_SESSION['admin']);
  unset($_SESSION['id']);
  $_SESSION['error'] = "0";
}
?>



<!doctype html>
<html lang="es">
  <head>
      <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <!--<link rel="stylesheet" href="assets/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    
 
  
  <!-- Custom fonts for this template -->

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">



    <link rel="stylesheet" href="assets/css/estilos.css">
    <link rel="shortcut icon" href="assets/img/logo-bootstrap-shoping-cart.png">
    <title>Shop Movies</title>
  </head>
  <body>
  
    <section class="bienvenidos">
                    <div class="col-flex justify-content-end align-items-center">

                      <center><a href="index.php"><img class="img-fluid" src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop" ></a></center>


                <div class="container-fluid">
                  <div class="row flex-nowrap d-flex justify-content-between ">
                    <nav class="navbar navbar-expand-lg">
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="assets/img/menu.png" height="40px">
                      </button>



                      <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                        <div class="navbar-nav d-md" >
                          <a class="nav-link" href="index.php">Inicio</span></a>
                          <a class="nav-link" href="products.php">Listado de Peliculas</a>
                          <a class="nav-link" href="contact.php">Contacto</a>
                        </div>                   
                      </div>                 
                    </nav>


                    <div class="dropdown d-md mr-3">
                                        <img src="https://mdbootstrap.com/img/Photos/Avatars/avatar-5.jpg" class="rounded-circle z-depth-0 "
                                        alt="avatar image" height="35">                              
                              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class=" text-gray-600 small"><?php if(isset($_SESSION['user'])){ echo $_SESSION['user'];} else{ echo "User";} ?></span>                          
                              </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                  
                                  <?php if(!isset($_SESSION['user'])) { ?> 
                                     <a href="login.php"><button class="dropdown-item" type="button" >Login</button></a>
                                     <a href="register.php"><button class="dropdown-item" type="button">Register</button></a>
                                  <?php } ?>
                                  
                                  <?php if(isset($_SESSION['admin'])&&$_SESSION['admin']==true) { ?> 
                                  
                                  <a href="admin/index.php"><button class="dropdown-item" name="panelAdmin" type="button">Panel Admin</button></a>
                                  <?php } ?>

                                  <?php if(isset($_SESSION['user'])) { ?> 
                                  
                                  <a href="index.php?logout"><button class="dropdown-item" name="logout" type="button">Logout</button></a>
                                  <?php } ?>

                                </div>
                            </div>

                    </div>
                  </div>


                    </div>

    </section>  
    

