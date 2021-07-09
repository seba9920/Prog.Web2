<?php
$SubgeneroSidebar = true;
include_once('header.php');

  //Devuelve el contenido de la tabla Clasificacion    
  //$generos = "SELECT id_genero, nombre FROM genero;";
  //$resultado = $con->query($generos); 
 require_once('../Business/SubGeneroBusiness.php');
  $SubgeneroB = new SubGeneroBusiness($con);
  
  //Fin del Select

if(isset($_GET['del'])){

  //eliminacion de generos  
  $id = $_GET['del'];
  $SubgeneroB->getDel($id);

  unset($_GET['del']);

    redirect('subgenero.php');
}
if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $cat=$SubgeneroB->getEntrada($id);

  if($cat->getStatus()==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $SubgeneroB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('subgenero.php');
}
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Subgéneros</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $SubgeneroB->contar(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $SubgeneroB->contarActivos(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $SubgeneroB->contarInactivos(); ?>)</span>
              <a href="modify-subgenero.php"><input class="btn btn-danger" type="submit" value="Añadir Subgénero"></a>
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
                  if(isset($_GET['id'])){
                    $dato=array('genero'=>$_GET['id']);
                    
                    $sub=$SubgeneroB->getEntradas($dato);
                  }else{
                    $sub=$SubgeneroB->getEntradas();
                  }

                  foreach($sub as $cat){ ?>
                    <tr align="center">
                    <td><?php echo $cat->getID(); ?></td>
                    <td><?php echo $cat->getStatus(); ?></td>
                      <td><?php echo $cat->getNombre(); ?></td>
                      <td><center>
                      <a href="modify-subgenero.php?edit=<?php echo $cat->getID();?>"><i class="fas fa-edit text-danger"></a></i>&nbsp;&nbsp;
                      <a href="subgenero.php?del=<?php echo $cat->getID();?>"><i class="fas fa-trash-alt text-danger"></a></i>&nbsp;&nbsp;
                       <a href="subgenero.php?status=<?php echo $cat->getID();?>"> <i class="
                      <?php if($cat->getStatus() == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
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
