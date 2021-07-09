<?php
$ComentarioSidebar = true;
include('header.php');
include_once('../Helpers/funcs.php');

 
 require_once('../Business/PeliculaBusiness.php');
 $PeliculaB = new PeliculaBusiness($con);

 require_once('../Business/ComentarioBusiness.php');
 $ComentarioB = new ComentarioBusiness($con);

if(isset($_GET['del'])){
    $ComentarioB->getDel($_GET['del']);
    
  
    
    unset($_GET['del']);
    redirect('comentarios.php');
}
if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $coment = $ComentarioB->getEntrada($id);

  if($coment->getStatus()==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $ComentarioB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('comentarios.php');
}
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Comentarios</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
              <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $ComentarioB->contar(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $ComentarioB->contarActivos(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $ComentarioB->contarInactivos(); ?>)</span>
              
              <input class="btn btn-danger" type="submit" value="Importar">
              <input class="btn btn-danger" type="submit" value="Exportar">
              <a  class="btn btn-danger" href="preguntas.php">Preguntas</a>
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
                      <th>Fecha</th>
                      <th>Usuario</th>
                      <th>Pelicula</th>
                      <th>Rating</th>
                      <th>Titulo</th>
                      <th>Comentario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  <?php $contador=0;
                  if(isset($_GET['id'])){
                    $comen = $ComentarioB->getEntradaIDPeli($_GET['id']);
                  }else{
                    $comen=$ComentarioB->getEntradas();
                  }

                  foreach($comen as $peli){ ?>
                    <tr align="center">
                    <td><?php echo $peli->getIDComentario(); ?></td>
                    <td><?php echo $peli->getStatus(); ?></td>
                    <td><?php echo $peli->getFecha(); ?></td>
                    <td>
                        <?php 
                        $comen = $ComentarioB->getNombre($peli->getIDUsuario());
                        echo $comen->getNombre()." ".$comen->getApellido(); ?>
                    </td>
                      
                      <td>
                      <?php 
                       $pel = $PeliculaB->getEntrada($peli->getIDPelicula());                      
                              echo $pel['nombre'];
                       ?>
                      </td>
                      
                      <td><?php echo $peli->getRating(); ?></td>
                      <td><?php echo $peli->getTitulo(); ?></td>
                      <td>
                      
                                            <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $contador; ?>">
                       Ver Comentario
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter<?php echo $contador; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-danger">
                              <h5 class="modal-title text-white" id="exampleModalLongTitle">Comentario:</h5>
                              
                            </div>
                            <div class="modal-body" style="background-color:#5a5c69;">
                              <p class="text-white"><?php echo $peli->getComentario(); ?></p>
                              <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                      <?php $contador++; ?>


                      </td>
                      <td><center>
                      <a href="modify-comentario.php?edit=<?php echo $peli->getIDComentario();?>"><i class="fas fa-edit text-danger"></i></a>&nbsp;
                      <a href="comentarios.php?del=<?php echo $peli->getIDComentario();?>"><i class="fas fa-trash-alt text-danger"></i></a>&nbsp;
                      <a href="comentarios.php?status=<?php echo $peli->getIDComentario();?>"> <i class="
                      <?php if($peli->getStatus() == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
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
