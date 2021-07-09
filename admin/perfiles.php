<?php
$PerfilSidebar = true;
include('header.php');


require_once('../Business/PerfilBusiness.php');
$PerfilB = new PerfilBusiness($con);



if(isset($_GET['del'])){

  $PerfilB->getDel($_GET['del']);

  redirect('perfiles.php');
}

if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $perf = $PerfilB->getPerfil($id);

  if($perf->getStatus()==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $PerfilB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('perfiles.php');
}

?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Perfiles</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
              <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $PerfilB->contar(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $PerfilB->contarActivos(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $PerfilB->contarInactivos(); ?>)</span>
              <a href="modify-perfil.php"><input class="btn btn-danger" type="submit" value="Añadir Perfil"></a>
              <input class="btn btn-danger" type="submit" value="Importar">
              <input class="btn btn-danger" type="submit" value="Exportar">
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" action="" enctype="multipart/form-data">
                <table class="table table-xl-responsive-borderless" id="tablajson" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr align="center">
                      <th>ID</th>
                      <th>Status</th>
                      <th>Nombre</th>
                      
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($PerfilB->getPerfiles() as $perfil){ ?>
                  
                    <tr align="center">
                    <td><?php echo $perfil->getID(); ?></td>
                    <td><?php echo $perfil->getStatus(); ?></td>
                      <td><?php echo $perfil->getNombre(); ?></td>
                      
                      <td><center>
                      <a href="modify-perfil.php?edit=<?php echo $perfil->getID();?>"><i class="fas fa-edit text-danger"></i></a>&nbsp;
                      <a href="perfiles.php?del=<?php echo $perfil->getID();?>"><i class="fas fa-trash-alt text-danger"></i></a>&nbsp;
                      <a href="perfiles.php?status=<?php echo $perfil->getID();?>"> <i class="
                      <?php if($perfil->getStatus() == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
                      "></i></a>
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
