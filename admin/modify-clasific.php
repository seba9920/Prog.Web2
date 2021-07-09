<?php
$ClasificacionSidebar = true;
include('header.php');
include_once('../Helpers/funcs.php');

require_once('../Business/ClasificacionBusiness.php');
$ClasificacionB = new ClasificacionBusiness($con);

    //Guardamos un nuevo Genero
    if(isset($_POST['add'])){
      
      $datos = array(
        'nombre'=>$_POST['nombre'],
        'descripcion'=> $_POST['descripcion']
      );
      $ClasificacionB->Add($datos);
        redirect('clasificacion.php');
    
    }

    //Modificamos un genero ya existente
    if(isset($_POST['mod'])) {
            
      $id = $_GET['edit'];
      $datos= array(
        'nombre'=> $_POST['nombre'],
        'descripcion'=> $_POST['descripcion']
      );     
      $ClasificacionB->getMod($id,$datos);       
      redirect('clasificacion.php');
    }

?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php if(Isset($_GET['edit'])) { 
          $Edit = true;
          $Clasificacion = $ClasificacionB->getEntrada($_GET['edit']);?>

          <h1 class="h3 mb-2 text-gray-800">Editar Clasificación</h1>
         
          <?php } else { ?>
          <h1 class="h3 mb-2 text-gray-800">Nueva Clasificación</h1>
          <?php } ?>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          
          
          <?php if(isset($Edit)) { ?>
            <div class="card-header py-1">
              <a href="modify-clasific.php"><input class="btn btn-danger" type="submit" value="Añadir Nuevo" style="float: right;"></a>
            </div>
          <?php } ?>
            
            
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="prod" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                          <td align="right"><label for="txtName">Nombre:</label></td>
                          <td><input type="text" id="txtName" name="nombre" <?= isset($Edit)?'value="'.$Clasificacion->getNombre().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtDescripcion">Descripción:</label></td>
                          <td align="left"><textarea id="txtDescripcion" name="descripcion" cols="80" rows="5" class="bg-danger text-white" required><?= isset($Edit)? $Clasificacion->getDescripcion():''?></textarea></td>
                        </tr>                            
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