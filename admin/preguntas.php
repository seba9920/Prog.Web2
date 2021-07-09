<?php
$ComentarioSidebar = true;
include('header.php');
include_once('../Helpers/funcs.php');

 
 require_once('../Business/PeliculaBusiness.php');
 $PeliculaB = new PeliculaBusiness($con);

 require_once('../Business/ComentarioBusiness.php');
 $ComentarioB = new ComentarioBusiness($con);

if(isset($_GET['del'])){
    
    $ComentarioB->getDelPregunta($_GET['del']);
    
    unset($_GET['del']);

    redirect('preguntas.php');
}
if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $preguntas = $ComentarioB->getPregunta($id);

  if($preguntas['status']==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $ComentarioB->cambioStatusPregunta($id,$sta);

  unset($_GET['status']);

  redirect('preguntas.php');
}
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Preguntas</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
              <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $ComentarioB->contar(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $ComentarioB->contarActivos(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $ComentarioB->contarInactivos(); ?>)</span>
              <a href="modify-preguntas.php"><input class="btn btn-danger" type="submit" value="Añadir Pregunta"></a>
              <input class="btn btn-danger" type="submit" value="Importar">
              <input class="btn btn-danger" type="submit" value="Exportar">
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST"  enctype="multipart/form-data">
                
                <div style="overflow-x:auto;">
                <table class="table table-xl-responsive-borderless"  id="tablajson" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr align="center">
                      <th>ID</th>
                      <th>Status</th>
                      <th>Pregunta</th>
                      <th>Detalle</th>
                      <th>Tipo</th>
                      <th>Obligatorio</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $contador=0;
                  foreach($ComentarioB->getPreguntas() as $preg){ ?>
                    <tr align="center">
                    <td><?php echo $preg['id_campo_dinamico_comentario']; ?></td>
                    <td><?php echo $preg['status']; ?></td>
                    <td><?php echo $preg['pregunta']; ?></td>
                    <td><?php if($preg['detalle']==null){echo "NULL";}else{echo $preg['detalle'];} ?></td>
                    <td><?php 
                        switch($preg['tipo']){
                            case 1: echo "Texto";
                            break;
                            case 2: echo "Checkbox";
                            break;
                            case 3: echo "Select";
                            break;
                            case 4: echo "Radio";
                            break;
                            } 
                        ?></td>
                    <td><?php echo $preg['obligatorio']; ?></td>
                      <td><center>
                      <a href="modify-preguntas.php?edit=<?php echo $preg['id_campo_dinamico_comentario'];?>"><i class="fas fa-edit text-danger"></i></a>&nbsp;
                      <a href="preguntas.php?del=<?php echo $preg['id_campo_dinamico_comentario'];?>"><i class="fas fa-trash-alt text-danger"></i></a>&nbsp;
                      <a href="preguntas.php?status=<?php echo $preg['id_campo_dinamico_comentario'];?>"> <i class="
                      <?php if($preg['status'] == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
                      "></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tbody>
                </table>
                </div>
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
