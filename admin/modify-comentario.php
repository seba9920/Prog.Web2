<?php
include('header.php');
include_once('../Helpers/funcs.php');

include_once('../Business/ComentarioBusiness.php');
$ComentarioB = new ComentarioBusiness($con);

include_once('../Business/PeliculaBusiness.php');
$PeliculaB = new PeliculaBusiness($con);

    //Guardamos un nuevo Genero
    if(isset($_POST['add'])){
      $datos = array(
        'id_usuario'=>$_POST['tUser'],
        'id_pelicula'=>$_POST['tIdPelicula'],
        'rating'=>$_POST['tRating'],
        'titulo'=>$_POST['tTitulo'],
        'comentario'=>$_POST['tComentario']
      );
      $ComentarioB->Add($datos);
        redirect('comentarios.php');
    
    }

    //Modificamos un genero ya existente
    if(isset($_POST['mod'])) {
      $id = $_GET['edit'];
  
           
      $datos= array(
        'id_usuario'=>$_POST['tUser'],
        'id_pelicula'=>$_POST['tIdPelicula'],
        'rating'=>$_POST['tRating'],
        'titulo'=>$_POST['tTitulo'],
        'comentario'=>$_POST['tComentario']
      );
      $ComentarioB->getMod($_GET['edit'], $datos);       
      redirect('comentarios.php');
    }


?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
        <?php if (isset($_GET['edit'])) {
            $Edit = true;
            $Comentario = $ComentarioB->getEntrada($_GET['edit']);?>
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Editar Comentarios</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
            <?php } ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="com" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                                                
                        <tr>
                          <td align="right"><label for="txtUser">Usuario:</label</td>
                          <td><input type="text" id="txtUser" name="tUser" <?= isset($Edit)?'value="'.$Comentario->getIDUsuario().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtIdPelicula">ID Pelicula:</label</td>
                          <td><input type="text" id="txtIdPelicula" name="tIdPelicula" <?= isset($Edit)?'value="'.$Comentario->getIDPelicula().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtRating">Rating:</label</td>
                          <td><input type="text" id="txtRating" name="tRating"  <?= isset($Edit)?'value="'.$Comentario->getRating().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtTitulo">Titulo:</label</td>
                          
                          <td><input type="text" id="txtTitulo" name="tTitulo"  <?= isset($Edit)?'value="'.$Comentario->getTitulo().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>                            
                        <tr>

                        <tr>
                          <td align="right"><label for="txtComentario">Comentario:</label</td>
                          <td align="left"><textarea id="txtComentario" name="tComentario" cols="80" rows="5" class="bg-danger text-white" required><?= isset($Edit)?$Comentario->getComentario():''?></textarea></td>
                        </tr>                            
                        <tr>

                        <tr>
                          <td align="right"><input type="submit" name="<?= isset($Edit)?'mod':'add'?>" value="Guardar" class="btn btn-danger"></td>
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
      

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?php require_once('footer.php'); ?>

</body>

</html>
