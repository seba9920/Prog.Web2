<?php
    include('functions/funcs.php');
    session_start();
    
    if(!isset($_SESSION['admin_usuario_logueado'])){
      redirect('login.php'); 
     }
    
    //obtengo el contenido del archivo
    $datosA = file_get_contents('../datos/admin.json');
    //convierto a un array
    $datosAdmin = json_decode($datosA,true);
    
    if(isset($_POST['adminlogin'])){
      foreach($datosAdmin as $admin) { 
        if($_POST['adminpass'] == $admin['pass'] && $_POST['adminuser'] == $admin['user']){
          $_SESSION['admin_usuario_logueado'] = true;
          $_SESSION['adminuser'] = $admin['nombre']." ".$admin['apellido'];
          $_SESSION['admin_error'] = "0";
          redirect('peliculas.php');
        break;
        }else{
          $_SESSION['admin_error'] = "1";  
          redirect('login.php'); 
        }
      }
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

  <title>Panel Admin</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="../assets/img/logo-bootstrap-shoping-cart.png">
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

  <?php

include_once('inc/sidebar.php');
  ?> 
 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">

<!-- Main Content -->
<div id="content">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <form class="form-inline">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      

      <div class="topbar-divider d-none d-sm-block"></div>

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['adminuser'] ?></span>
          <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
          
          <a class="dropdown-item" href="login.php?adminlogout" name="adminlogout" >
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Salir
          </a>
        </div>
      </li>

    </ul>

  </nav>