<?php
$PermisoSidebar = true;
include('header.php');

//Devuelve el contenido de la tabla Clasificacion    
//$clasi = "SELECT id_clasificacion, nombre, descripcion FROM clasificacion;";
//$resultado = $con->query($clasi); 
//Fin del Select
require_once('../Business/PermisoBusiness.php');
$PermisoB = new PermisoBusiness($con);


if(isset($_GET['del'])){
  //eliminacion de archivo imagen   
  
  $PermisoB->getDel($_GET["del"]);
  //#####################################################################
  

  //fin eliminacion archivo imagen

    unset($_GET['del']);

    redirect('permisos.php');
}
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Permisos</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $PermisoB->contar(); ?>)</span>
             
              <a href="modify-permiso.php"><input class="btn btn-danger" type="submit" value="Añadir Permiso"></a>
              
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" action="modify-permiso.php" enctype="multipart/form-data">
                <table class="table table-xl-responsive-borderless" id="tablajson" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr align="center">
                      <th>ID</th>
                      <th>Nombre</th>
                      <th>Code</th>
                      <th>Module</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($PermisoB->getPermisos() as $peli){ ?>
                  
                    <tr align="center">
                    <td><?php echo $peli->getID(); ?></td>
                    <td><?php echo $peli->getNombre(); ?></td>
                      <td><?php echo $peli->getCode(); ?></td>
                      <td><?php echo $peli->getModule(); ?></td>
                      <td><center>
                      <a href="modify-permiso.php?edit=<?php echo $peli->getID();?>"><i class="fas fa-edit text-danger"></a></i>&nbsp;&nbsp;
                      <a href="permisos.php?del=<?php echo $peli->getID();?>"><i class="fas fa-trash-alt text-danger"></i></a></i></center>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tbody>
                </table>
              </form>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>



  <?php require_once('footer.php'); ?>
  
  <script>
   $(document).ready(function() {
    $('#tablajson').DataTable();
    } );
   
   </script> 

</body>

</html>
