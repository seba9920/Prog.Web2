<?php
$AdminSidebar = true;
include('header.php'); 
include_once('../Helpers/funcs.php');
$Perfil = "Admin";

  //Devuelve el contenido de la tabla Clasificacion    
  //$admins = "SELECT id_admin, status, nombre, apellido, fecha, usuario, email FROM admin;";
  //$resultado = $con->query($admins); 
  //Fin del Select
  
  require_once('../Business/UserBusiness.php');
  $UserB = new UserBusiness($con);
  


if(isset($_GET['deladmin'])){
    $id=$_GET['deladmin'];
    $UserB->delete($id);
    unset($_GET['deladmin']);
    redirect('admin.php');
}
if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $user=$UserB->getEntrada($id);

  if($user->getStatus()==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $UserB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('admin.php');
}
 
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
   <div class="container-fluid">

          <!-- DataTales Example -->
<!-- ADMIN---------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------- -->

      <h1 class="h3 mb-2 text-gray-800">Gestionar Admins</h1>
           <div class="card shadow mb-4">
            <div class="card-header py-1">
            <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $UserB->contar($Perfil); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $UserB->contarActivos($Perfil); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $UserB->contarInactivos($Perfil); ?>)</span>
              <a href="modify-usuario.php"><input class="btn btn-danger" type="submit" value="Añadir Admin"></a>
              <input class="btn btn-danger" type="submit" value="Imprimir">
              <input class="btn btn-danger" type="submit" value="PDF">
              <input class="btn btn-danger" type="submit" value="CSV">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-xl-responsive-borderless" id="tablajson2" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr align="center">
                      <th>ID</th>
                      <th>Status</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha de creacion</th>
                      <th>Usuario</th>
                      <th>Email</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  $dato = array('tipo'=>'Admin');
                  foreach($UserB->getEntradas($dato) as $adm){ ?>
                    <tr align="center">
                      <td><?php echo $adm->getIDUsuario(); ?></td>
                      <td><?php echo $adm->getStatus(); ?></td>
                      <td><?php echo $adm->getNombre(); ?></td>
                      <td><?php echo $adm->getApellido(); ?></td>
                      <td><?php echo $adm->getFecha(); ?></td>
                      <td><?php echo $adm->getUsuario();?></td>
                      <td><?php echo $adm->getEmail(); ?></td>
                      
                      

                      <td><center>
                      <a href="modify-usuario.php?edit=<?php echo $adm->getIDUsuario();?>&admin"><i class="fas fa-edit text-danger"></i></a>&nbsp;
                      <a href="admin.php?deladmin=<?php echo $adm->getIDUsuario();?>"><i class="fas fa-trash-alt text-danger"></i></a>&nbsp;
                      <a href="admin.php?status=<?php echo $adm->getIDUsuario();?>"><i class="
                      <?php if($adm->getStatus() == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
                      "></i></a>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
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
    $(document).ready(function() {
    $('#tablajson2').DataTable();
    } );
   </script> 

</body>

</html>
