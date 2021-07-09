<?php
$ClasificacionSidebar = true;
include('header.php');

//Devuelve el contenido de la tabla Clasificacion    
//$clasi = "SELECT id_clasificacion, nombre, descripcion FROM clasificacion;";
//$resultado = $con->query($clasi); 
//Fin del Select
require_once('../Business/ClasificacionBusiness.php');
$ClasificacionB = new ClasificacionBusiness($con);


if(isset($_GET['del'])){
  //eliminacion de archivo imagen   
  $sql = "DELETE FROM clasificacion WHERE id_clasificacion=".$_GET["del"];
  $count = $con->exec($sql);
  

  //fin eliminacion archivo imagen

    unset($_GET['del']);

    redirect('clasificacion.php');
}
if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $cat=$ClasificacionB->getEntrada($id);

  if($cat->getStatus()==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $ClasificacionB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('clasificacion.php');
}
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Clasificaciones</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $ClasificacionB->contar(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $ClasificacionB->contarActivos(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $ClasificacionB->contarInactivos(); ?>)</span>
              <a href="modify-clasific.php"><input class="btn btn-danger" type="submit" value="Añadir Clasificacion"></a>
              <input class="btn btn-danger" type="submit" value="Importar">
              <input class="btn btn-danger" type="submit" value="Exportar">
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" action="edit-clasific.php" enctype="multipart/form-data">
                <table class="table table-xl-responsive-borderless" id="tablajson" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr align="center">
                      <th>ID</th>
                      <th>Status</th>
                      <th>Nombre</th>
                      <th>Descripcion</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach($ClasificacionB->getEntradas() as $peli){ ?>
                  
                    <tr align="center">
                    <td><?php echo $peli->getID(); ?></td>
                    <td><?php echo $peli->getStatus(); ?></td>
                      <td><?php echo $peli->getNombre(); ?></td>
                      <td><?php echo $peli->getDescripcion(); ?></td>
                      <td><center>
                      <a href="modify-clasific.php?edit=<?php echo $peli->getID();?>"><i class="fas fa-edit text-danger"></a></i>&nbsp;&nbsp;
                      <a href="clasificacion.php?del=<?php echo $peli->getID();?>"><i class="fas fa-trash-alt text-danger"></a></i>&nbsp;&nbsp;
                      <a href="clasificacion.php?status=<?php echo $peli->getID();?>"> <i class="
                      <?php if($peli->getStatus() == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
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
