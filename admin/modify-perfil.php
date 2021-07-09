<?php
$PerfilSidebar = true;
include('header.php');
include_once('../Helpers/funcs.php');
require_once('../Business/PerfilBusiness.php');



$PerfilB = new PerfilBusiness($con);

    //Guardamos un nuevo Genero
    if(isset($_POST['add'])){
      
      $datos = array(
        'nombre'=>$_POST['nombre']
      );
      $res = $_POST['tPermisos'];
      $PerfilB->Add($datos,$res);
        redirect('perfiles.php');
    
    }

    //Modificamos un genero ya existente
    if(isset($_POST['mod'])) {
            
      $id = $_GET['edit'];
      $res = $_POST['tPermisos'];
      $PerfilB->getMod($id,$res);      
      redirect('perfiles.php');
    }

?>


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php if(Isset($_GET['edit'])) { 
          $Edit = true;
          $Perfil = $PerfilB->getPerfil($_GET['edit']);?>

          <h1 class="h3 mb-2 text-gray-800">Editar Perfil</h1>
         
          <?php } else { ?>
          <h1 class="h3 mb-2 text-gray-800">Nuevo Perfil</h1>
          <?php } ?>


          <!-- DataTales Example -->
          <div class="card shadow mb-4">
          
          
          <?php if(isset($Edit)) { ?>
            <div class="card-header py-1">
              <a href="modify-perfil.php"><input class="btn btn-danger" type="submit" value="Añadir Nuevo" style="float: right;"></a>
            </div>
          <?php } ?>
            
            
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="prod" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                          <td align="right"><label for="txtNombre">Nombre:</label></td>
                          <td><input type="text" id="txtNombre" name="nombre" <?= isset($Edit)?'value="'.$Perfil->getNombre().'"':''?> size="50" class="bg-danger text-white" required></td>
                      </tr>
                    
                      
                      <tr>
                          <td align="right"><label for="txtGene">Permisos:</label</td>
                          <td>
                          
                          <?php 
                          if(isset($Edit)) {
                          $resultado = $PerfilB->PerfilPermisos($_GET['edit']);
                          }
                          require_once('../Business/PermisoBusiness.php');
                          $PermisoB = new PermisoBusiness($con);
                          
                          $cont=0;
                          $contL=0;
                          foreach($PermisoB->getPermisos() as $per){ 
                          $contL++ ?>

                          <input 
                          
                          <?php if(isset($Edit)){
                            foreach($resultado as $result){
                              if($per->getID() == $result->getID()){
                                echo 'checked';
                              }
                          } }?>
                          
                          type="checkbox" id="permisos<?php echo $contL; ?>" name="tPermisos[]" value="<?php echo $per->getID() ?>" size="5" class="bg-danger text-white" required>
                          <label class="bg-danger text-white" for="permisos<?php echo $contL; ?>"><?php echo $per->getNombre() ?></label>
                          
                            <?php $cont++; 
                            if($cont==3){
                              $cont=0;
                              echo "<br/>";
                            }?>
                          
                          <?php   } ?>
                          
                          
                      </td>

                      
                      
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