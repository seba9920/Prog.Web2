<?php
if(isset($_GET['admin'])){
  $AdminSidebar = true;
} 
if(isset($_GET['user'])){
  $UsuarioSidebar = true;
}
include('header.php');
include_once('../Helpers/funcs.php');

require_once('../Business/UserBusiness.php');
$UserB = new UserBusiness($con);

require_once('../Business/PerfilBusiness.php');
$PerfilB = new PerfilBusiness($con);

require_once('../Business/DireccionBusiness.php');
$DirB = new DireccionBusiness($con);

//ADMIN--------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------

if(isset($_POST['add'])){
      
  $datos = array(
          'status'=>$_POST['tStatus'], 
          'nombre'=>$_POST['tName'], 
          'apellido'=>$_POST['tApellido'],
          'fecha_nac'=>$_POST['tFechaNac'], 
          'usuario'=>$_POST['tUser'], 
          'pass'=>$_POST['tPass'], 
          'email'=>$_POST['tEmail'],
          'perfil' => array('perfil'=>$_POST['tPerfil'])
          );
  $UserB->Add($datos);
    redirect('admin.php');

}

//Modificamos un genero ya existente
if(isset($_POST['mod'])) {
        
  $id = $_GET['edit'];
  $datos = array(
    'status'=>$_POST['tStatus'], 
    'nombre'=>$_POST['tName'], 
    'apellido'=>$_POST['tApellido'],
    'fecha_nac'=>$_POST['tFechaNac'], 
    'usuario'=>$_POST['tUser'], 
    'pass'=>$_POST['tPass'], 
    'email'=>$_POST['tEmail'],
    'perfil'=>'Admin'
    );
  $UserB->getMod($id,$datos);       
  redirect('admin.php');
}

?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

        <?php if (isset($_GET['edit'])) {
                  $Edit = true;
                  $User = $UserB->getEntrada($_GET['edit']);
                  $Dir = $DirB->getEntrada($_GET['edit']);
                  if($Dir==true){
                    $direccion=array('calle'=> $Dir->getCalle(),
                                     'altura'=> $Dir->getAltura(),
                                     'piso'=> $Dir->getPiso(),
                                     'dpto'=> $Dir->getDpto(),
                                     'barrio'=> $Dir->getBarrio());
                  }else{
                    $direccion=array('calle'=>'',
                                     'altura'=>'',
                                     'piso'=>'',
                                     'dpto'=>'',
                                     'barrio'=>'');
                  }
                  ?>
                  
            
            <h1 class="h3 mb-2 text-gray-800">Editar Usuario</h1>
          
        <?php } else { ?>

                  <h1 class="h3 mb-2 text-gray-800">Nuevo Usuario</h1>
         
         <?php } ?>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">

          <?php if(isset($Edit)) {?>
            
                  <div class="card-header py-1">
                    <a href="modify-admin.php"><input class="btn btn-danger" type="submit" value="Añadir Nuevo" style="float: right;"></a>
                  </div>
            
            <?php } ?>

            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="com" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                      
                      
                     <tr>
                     <td align="right"><label for="perfil">Perfiles:</label</td>
                      <td>
                          
                          <?php 
                          $cont=0;
                          foreach($PerfilB->getPerfiles() as $per){ 
                            if($per->getStatus()==1) {?>

                          <input                           
                          <?php if(isset($Edit)){
                                  foreach($PerfilB->getPerfilUsuario($_GET['edit']) as $result){
                                    if($per->getID() == $result->getID()){
                                      echo 'checked';
                                    }
                                  } 
                                }?>
                          
                          type="checkbox" id="perfil" name="tPerfil[]" value="<?php echo $per->getID() ?>" size="5" class="bg-danger text-white">
                          <label class="bg-danger text-white" for="perfil"><?php echo $per->getNombre() ?></label>
                          
                            <?php $cont++; 
                            if($cont==3){
                              $cont=0;
                              echo "<br/>";
                            }?>
                          
                          <?php   }} ?>
                          
                          
                      </td>
                      </tr>
                       <tr>
                          <td align="right"><label for="txtName">Nombre:</label</td>
                          <td><input type="text" id="txtName" name="tName" <?= isset($Edit)?'value="'.$User->getNombre().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtApellido">Apellido:</label</td>
                          <td><input type="text" id="txtApellido" name="tApellido" <?= isset($Edit)?'value="'.$User->getApellido().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtFecha">Fecha de nacimiento:</label</td>
                          <td><input type="date" id="txtFecha" name="tFechaNac" <?= isset($Edit)?'value="'.$User->getFechaNac().'"':''?> size="10" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtUser">User:</label</td>
                          <td><input type="text" id="txtUser" name="tUser" <?= isset($Edit)?'value="'.$User->getUsuario().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtEmail">Email:</label</td>
                          <td><input type="text" id="txtEmail" name="tEmail" <?= isset($Edit)?'value="'.$User->getEmail().'"':''?> size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtPass">Password:</label</td>
                          <td><input type="password" id="txtPass" name="tPass" <?= isset($Edit)?'value="'.$User->getPass().'"':''?>  size="50" class="bg-danger text-white" required>
                          <button id="txtPass" class="btn btn-danger" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                          </td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtTelefono">Telefono:</label</td>
                          <td><input type="text" id="txtTelefono" name="tTelefono" <?= isset($Edit)?'value="'.$User->getTelefono().'"':''?> size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtDireccion">Direccion:</label</td>
                          
                          <td>
                          <input type="text" id="txtDireccion" placeholder="Calle" name="tDireccion[calle]" <?= isset($Edit)?'value="'.$direccion['calle'].'"':''?>  size="15" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Altura" name="tDireccion[altura]" <?= isset($Edit)?'value="'.$direccion['altura'].'"':''?> size="5" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Piso" name="tDireccion[piso]" <?= isset($Edit)?'value="'.$direccion['piso'].'"':''?> size="5" class="bg-danger text-white mi-input" >
                          <input type="text" id="txtDireccion" placeholder="Depto" name="tDireccion[depto]" <?= isset($Edit)?'value="'.$direccion['dpto'].'"':''?> size="5" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Barrio" name="tDireccion[barrio]" <?= isset($Edit)?'value="'.$direccion['barrio'].'"':''?> size="15" class="bg-danger text-white mi-input"></td>
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
