<?php
$PermisoSidebar = true;
include('header.php');
include_once('../Helpers/funcs.php');
require_once('../Business/PermisoBusiness.php');



$PermisoB = new PermisoBusiness($con);

    //Guardamos un nuevo Permiso
    if(isset($_POST['add'])){
      
      $datos = array(
        'nombre'=>$_POST['nombre'],
        'code'=>$_POST['code'],        
        'module'=>$_POST['module']
      );
      $PermisoB->Add($datos);
        redirect('permisos.php');
    
    }

    //Modificamos un permiso ya existente
    if(isset($_POST['mod'])) {
            
      $id = $_GET['edit'];
      $datos= array(
        'nombre'=>$_POST['nombre'],
        'code'=>$_POST['code'],        
        'module'=>$_POST['module']
      );     
      $PermisoB->getMod($id,$datos);       
      redirect('permisos.php');
    }

?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php if(Isset($_GET['edit'])) { 
          $Edit = true;
          $Permisos = $PermisoB->getPermiso($_GET['edit']);?>

          <h1 class="h3 mb-2 text-gray-800">Editar Permiso</h1>
         
          <?php } else { ?>
          <h1 class="h3 mb-2 text-gray-800">Nuevo Permiso</h1>
          <?php } ?>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          
          
          <?php if(isset($Edit)) { ?>
            <div class="card-header py-1">
              <a href="modify-permiso.php"><input class="btn btn-danger" type="submit" value="Añadir Nuevo" style="float: right;"></a>
            </div>
          <?php } ?>
            
            
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="prod" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <td align="right"><label for="txtNombre">Nombre:</label></td>
                            <td><input type="text" id="txtNombre" name="nombre" <?= isset($Edit)?'value="'.$Permisos->getNombre().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>
                        <tr>
                            <td align="right"><label for="txtCode">Code:</label></td>
                            <td><input type="text" id="txtCode" name="code" <?= isset($Edit)?'value="'.$Permisos->getCode().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>
                        <tr>
                            <td align="right"><label for="txtModule">Module:</label></td>
                            <td><input type="text" id="txtModule" name="module" <?= isset($Edit)?'value="'.$Permisos->getModule().'"':''?> size="50" class="bg-danger text-white" required></td>
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