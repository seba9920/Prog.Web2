<?php 
$IndexSidebar = true;
include_once('header.php'); 

require_once('../Helpers/config.php');

require_once('../Business/UserBusiness.php');
require_once('../Business/PeliculaBusiness.php');

$UserB = new UserBusiness($con);
$PeliB = new PeliculaBusiness($con);

?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Home</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Reporte General</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Admin (Registrados) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="admin.php">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Admin (Registrados)</div>
                                          
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $UserB->contar($Perfil="Admin"); ?></div>
                                           
                                        </div>
                                        <div class="col-auto">
                                        <i class="fas fa-user-cog fa-2x text-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                                                                      
                        <!-- Usuarios (Registrados) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="user.php">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Usuarios (Registrados)</div>
                                                                                 
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $UserB->contar($Perfil='Cliente') ?></div>
                                          
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                        
                        <!-- Total (Peliculas) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="peliculas.php">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Total (Peliculas)</div>
                                                                                       
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $PeliB->contar(); ?></div>
                                          
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-video fa-2x text-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                                                                       
                        <!-- Total Ventas Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                        <a href="#">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Total Ventas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40.000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div></a>
                    </div>
                  <!--Equipo de Desarrollo-->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Team</h1>
                    </div>
                    <section class="bg-white py-2">
                        <div class="container" align="center">
                            <div class="row">
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-team hvr-grow-shadow">
                                        <div class="card-body">
                                            <img class="card-team-img mb-3" src="../Front/team/User_icon_2.png" width="200" height="200" alt="..." />
                                            <div class="card-team-name">Jhorky Escalante</div>
                                            <div class="card-team-position mb-3">Analista de Sistemas</div>
                                            <p class="small mb-0">Hola.</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-linkedin-in"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-team">
                                        <div class="card-body">
                                            <img class="card-team-img mb-3" src="../Front/team/User_icon_2.png" width="200" height="200" alt="..." />
                                            <div class="card-team-name">Roberto Rocco</div>
                                            <div class="card-team-position mb-3">Analista de Sistemas</div>
                                            <p class="small mb-0">Hola.</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-linkedin-in"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-team">
                                        <div class="card-body">
                                            <img class="card-team-img mb-3" src="../Front/team/User_icon_2.png" width="200" height="200" alt="..." />
                                            <div class="card-team-name">Rodrigo Tolaba</div>
                                            <div class="card-team-position mb-3">Analista de Sistemas</div>
                                            <p class="small mb-0">Hola.</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-linkedin-in"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>                                                                
                                <div class="col-md-6 col-xl-3">
                                    <div class="card card-team">
                                        <div class="card-body">
                                            <img class="card-team-img mb-3" src="../Front/team/User_icon_2.png" width="200" height="200" alt="..." />
                                            <div class="card-team-name">Ariel Prieto</div>
                                            <div class="card-team-position mb-3">Analista de Sistemas</div>
                                            <p class="small mb-0">Hola.</p>
                                        </div>
                                        <div class="card-footer text-center">
                                            <a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-facebook-f"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-twitter"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-linkedin-in"></i></a><a class="btn btn-icon btn-transparent-dark mx-1" href="#!"><i class="fab fa-github"></i></a>
                                        </div>
                                    </div>
                                </div>                                                                
                            </div>
                        </div>

                    </section>                    
        <!-- /.container-fluid -->

        </div>
      <!-- End of Main Content -->
      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  </div>
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  


  <?php require_once('footer.php') ?>

  


  </div>
</body>

</html>
