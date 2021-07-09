<?php
$PeliculasSidebar = true;
  include_once('header.php'); 
  include_once('../Business/ClasificacionBusiness.php');
  require_once('../Business/PeliculaBusiness.php');
  $PeliculaB = new PeliculaBusiness($con);
  $ClasificacionB = new ClasificacionBusiness($con);

if(isset($_GET['del'])){
      
  if($PeliculaB->getDel($_GET['del'])==true){
    redirect('peliculas.php');
  }
}

if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $peli = $PeliculaB->getEntrada($id);

  if($peli['status']==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $PeliculaB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('peliculas.php');
}
?>
  
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Peliculas</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $PeliculaB->contar(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $PeliculaB->contarActivos(); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $PeliculaB->contarInactivos(); ?>)</span>
              <a href="modify-pelicula.php"><input class="btn btn-danger" type="submit" value="Añadir Pelicula"></a>
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
                      <th>Id</th>
                      <th>Status</th>
                      <th>Nombre</th>
                      <th>Imagen</th>
                      <th>Precio</th>
                      <th>Clasificacion</th>
                      <th>Genero</th>
                      <th>Duracion</th>                                            
                      <th>Año</th>
                      <th>Directores</th>
                      <th>Actores</th>
                      <th>Descripcion</th>
                      <th>Comentarios</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $contador=0;
                  foreach($PeliculaB->getEntradas() as $peli){ 
                    $result=$ClasificacionB->getEntrada($peli->getIDClasificacion());?>
                  
                    <tr align="center">
                    <td><?php echo $peli->getID(); ?></td>
                    <td><?php echo $peli->getStatus(); ?></td>
                      <td><?php echo $peli->getNombre(); ?></td>
                      <td><img class="img-fluid" src="../Front/images/<?php echo $peli->getID() ?>.jpg" alt=""></td>
                      <td><?php echo $peli->getPrecio(); ?></td>
                      <td><?php echo $result->getNombre(); ?></td>
                      <td><?php 

                            
                            require_once('../Business/GeneroBusiness.php');
                            $genB = new GeneroBusiness($con);

                            $g=$genB->getEntradaIDPeli($peli->getID());

                            require_once('../Business/SubGeneroBusiness.php');
                            $SubgenB = new SubGeneroBusiness($con);

                            $sg=$SubgenB->getEntradaIDPeli($peli->getID());

                            foreach($g as $gene){
                            echo $gene->getNombre().' ';
                            }

                            foreach($sg as $Subgene){
                            echo $Subgene->getNombre().' ';
                            }

                      ?>
                      </td>
                      <td><?php echo $peli->getDuracion(); ?></td>
                      <td><?php echo $peli->getAnio(); ?></td>
                      <td><?php echo $peli->getDirectores(); ?></td>
                      <td><?php echo $peli->getActores(); ?></td>
                      <td>
                            
                                            <!-- Button trigger modal -->
                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?php echo $contador; ?>">
                       Ver Descripcion
                      </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModalCenter<?php echo $contador; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header bg-danger">
                              <h5 class="modal-title text-white" id="exampleModalLongTitle">Descripcion:</h5>
                              
                            </div>
                            <div class="modal-body" style="background-color:#5a5c69;">
                              <p class="text-white"><?php echo $peli->getDescripcion(); ?></p>
                              <button type="button" class="btn btn-danger float-right" data-dismiss="modal">Cerrar</button>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                      <?php $contador++; ?>

                      </td>
                      <td>
                      <a href="comentarios.php?id=<?php echo $peli->getID();?>"><i class="btn btn-danger text-white">Comentarios</i></a>
                      </td>
                      <td><center>
                      <a href="modify-pelicula.php?edit=<?php echo $peli->getID();?>"><i class="fas fa-edit text-danger"></a></i>&nbsp;&nbsp;
                      <a href="peliculas.php?del=<?php echo $peli->getID();?>"><i class="fas fa-trash-alt text-danger"></a></i>&nbsp;&nbsp;
                       <a href="peliculas.php?status=<?php echo $peli->getID();?>"> <i class="
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
