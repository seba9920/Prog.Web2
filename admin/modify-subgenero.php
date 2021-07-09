<?php
$SubgeneroSidebar = true;
include('header.php');
include_once('../Helpers/funcs.php');
require_once('../Business/SubGeneroBusiness.php');


$SubGeneroB = new SubGeneroBusiness($con);

    //Guardamos un nuevo Genero
    if(isset($_POST['add'])){
      if(!empty($_POST['tGene'])){
        $generos = $_POST['tGene'];
        $datos = array(
          'nombre'=>$_POST['nombre']
        );
        $SubGeneroB->Add($datos, $generos);
      
      
        redirect('subgenero.php');
      } else {
        redirect('modify-subgenero.php');
      }
    }

    //Modificamos un genero ya existente
    if(isset($_POST['mod'])) {
      if(!empty($_POST['tGene'])){      
      $id = $_GET['edit'];
                  
      $datos= array(
        'nombre'=> $_POST['nombre'],
        'genero'=>$_POST['tGene']
        );

      $SubGeneroB->getMod($id,$datos);
      redirect('subgenero.php');
      } else {
        
        redirect('modify-subgenero.php?edit='.$_GET['edit']);
      } 
    }

    
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <?php if (isset($_GET['edit'])) {
            $Edit = true;
            $SubGenero = $SubGeneroB->getEntrada($_GET['edit']);?>
            
            <h1 class="h3 mb-2 text-gray-800">Editar Subgénero</h1>
          
          <?php } else { ?>

          <h1 class="h3 mb-2 text-gray-800">Nuevo Subgénero</h1>
         
         <?php } ?>
          
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            
            <?php if(isset($Edit)) {?>
            
            <div class="card-header py-1">
              <a href="modify-genero.php"><input class="btn btn-danger" type="submit" value="Añadir Nuevo" style="float: right;"></a>
            </div>
            
            <?php } ?>
            
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="prod" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">                        
                        <tr>
                          <td align="right"><label for="txtName">Nombre:</label</td>
                          <td><input type="text" id="txtName" name="nombre" <?= isset($Edit)?'value="'.$SubGenero->getNombre().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtGene">Género:</label</td>
                          <td>
                          
                          <?php 
                          if(isset($Edit)) {
                           $resultado = $SubGeneroB->Genero($_GET['edit']);
                          }
                          require_once('../Business/GeneroBusiness.php');
                          $GeneroB = new GeneroBusiness($con);
                          
                          


                          $cont=0;
                          $contL=0;
                          foreach($GeneroB->getEntradas() as $cat){ 
                          $contL++ ?>
                          <input 
                          
                          <?php if(isset($Edit)){
                            foreach($resultado as $result){
                              if($cat->getID() == $result->getID()){
                                echo 'checked';
                              }
                          } }?>
                          
                           type="checkbox" id="generos<?php echo $contL; ?>" name="tGene[]" value="<?php echo $cat->getID() ?>" size="5" class="bg-danger text-white">
                          <label class="bg-danger text-white" for="generos<?php echo $contL; ?>"><?php echo $cat->getNombre() ?></label>
                          
                            <?php $cont++; 
                            if($cont==3){
                              $cont=0;
                              echo "<br/>";
                            }?>
                          
                          <?php   } ?>
                          
                          
                          </td>
                          

                        </tr>
                        
                        <tr>
                          <td align="right"><input type="submit"  name="<?= isset($Edit)?'mod':'add'?>" value="Guardar" id="btnSavePeli" class="btn btn-danger"></td>
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
