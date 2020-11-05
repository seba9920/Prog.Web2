<?php


/********************* GENERAR JSON *****************/

$pelis = array( 
  'nombre' => $_POST['nombre'],
  'precio' => $_POST['precio'],
  'clasificacion' => $_POST['clasi'],
  'año' => $_POST['año'],
  'direc' => $_POST['direc'],
  'actores' => $_POST['actores'],
  'descripcion' => $_POST['descrip']
)

/*if ( isset($_POST["tName"]) && isset($_POST["tPrecio"]) && isset($_POST["tClasi"]) &&
    isset($_POST["tAnio"]) && isset($_POST["tDirect"]) && isset($_POST["tActor"]) 
    && isset($_POST["tImg"]) && isset($_POST["tDescripcion"]))
{
 
 $datos = array(); //creamos un array

$dato1=$_POST['tName'];
$dato2=$_POST['tPrecio'];
$dato3=$_POST['tClasi'];
$dato4=$_POST['tAnio'];
$dato5=$_POST['tDirect'];
$dato6=$_POST['tActor'];
$dato7=$_POST['tImg'];
$dato8=$_POST['tDescripcion'];


$datos[] = array('tName'=> $dato1, 'tPrecio'=> $dato2, 'tClasi'=> $dato3,
                'tAnio'=> $dato4, 'tDirect'=> $dato5, 'tActor'=> $dato6, 'tImg'=> $dato7, 'tDescripcion'=> $dato8);


 //Creamos el JSON
 $json_string = json_encode($datos);


 $file = 'datos.json';
 file_put_contents($file, $json_string); 


}
else
{
 //echo "<span style='color: red;'>Por favor, ingrese algún dato. </span></br></br>";
}*/


?>





<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin-Peliculas</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

<?php
include_once('inc/header.php');
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

          <!-- Topbar Search
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form> -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario</span>
                <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Ajustes
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Salir
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Nueva Pelicula</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-0">
              <!--<input class="btn btn-danger" type="submit" value="Añadir Nuevo">-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="peliculas.php" name="prod">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                          <td align="right"><label for="txtName">Nombre</label</td>
                          <td><input type="text" id="txtName" name="tName" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtPrecio">Precio</label</td>
                          <td><input type="text" id="txtPrecio" name="tPrecio" size="10" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtClasi">Clasificación</label</td>
                          <td><input type="text" id="txtClasi" name="tClasi" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtAnio">Año</label</td>
                          <td><input type="text" id="txtAnio" name="tAnio" size="5" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtDirect">Directores</label</td>
                          <td><input type="text" id="txtDirect" name="tDirect" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtActor">Actores</label</td>
                          <td><input type="text" id="txtActor" name="tActor" size="50" class="bg-danger text-white"></td>
                        </tr>                                                
                        <tr>
                        <td align="right"><label for="txtImg">Imagen</label</td>
                          <td><input type="file" id="txtImg" name="tImg" accept="image/*" class="bg-danger text-white"></td>
                          </tr>
                          <td align="right"><label for="txtDescripcion">Descripcion</label</td>
                          <td align="left"><textarea id="txtDescripcion" name="tdescripcion" cols="80" rows="5" class="bg-danger text-white"></textarea></td>
                        </tr>                           
                        </tr>
                          <td align="right"><input type="submit" value="Guardar" id="btnSavePeli" class="btn btn-danger"></td>
                          <td align="left"><input type="reset" value="Reset" class="btn btn-danger"></td>
                        </tr>                         
                      </table>
                    </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy;Copyright 2020. Todos los derechos reservados.</span><br>
            <span>Movie Shop</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
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

  <script src="js/recib-prod.js"></script>
  <script src="js/recib-prod2.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
