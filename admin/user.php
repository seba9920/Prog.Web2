<?php
$UsuarioSidebar = true;
include('header.php'); 
include_once('../Helpers/funcs.php');
$Perfil="Cliente";
//Devuelve el contenido de la tabla Usuarios    

/*$usuarios = "SELECT id_usuario,status,nombre,apellido,fecha,fecha_nac,usuario,email,telefono,pedidos,dinero_gastado FROM usuario";
$resultado = $con->query($usuarios);*/

require_once('../Business/UserBusiness.php');
$UserB = new UserBusiness($con);

if(isset($_GET['del'])){

    $deleteCom = "DELETE FROM comentario WHERE id_usuario=".$_GET['del'];
    $count = $con->exec($deleteCom);

    $selectDir = "SELECT id_direccion FROM direccion
    INNER JOIN usuario_direccion on direccion.id_direccion=usuario_direccion.id_direccion
    WHERE id_usuario=".$_GET['del'];
    $dir = $con->query($selectDir);

    $deleteDir = "DELETE FROM usuario_direccion WHERE id_usuario=".$_GET['del'];
    $count = $con->exec($deleteDir);

    foreach($dir as $d){
      $deleteDir = "DELETE FROM direccion WHERE id_direccion=".$d['id_direccion'];
      $count = $con->exec($deleteDir);
    }

    $deleteUser = "DELETE FROM usuario WHERE id_usuario=".$_GET['del'];
    $count = $con->exec($deleteUser);

    unset($_GET['del']);
    redirect('user.php');
}
if(isset($_GET['status'])){
  $id = $_GET['status'];
  
  $cat=$UserB->getEntrada($id);

  if($cat->getStatus()==1){
    $sta = 0;
  }else{
    $sta = 1;
  }
  
  $UserB->cambioStatus($id,$sta);

  unset($_GET['status']);

  redirect('user.php');
}

?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
   <div class="container-fluid">

          <!-- DataTales Example -->

<!-- CLIENTES---------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------- -->
<div class="container-fluid">
       <h1 class="h3 mb-2 text-gray-800">Gestionar Clientes</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            <span class="m-0 font-weight-bold text-danger">Todo(<?php echo $UserB->contar($Perfil); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Publicado(<?php echo $UserB->contarActivos($Perfil); ?>)</span>
              <span class="m-0 font-weight-bold text-danger">|</span>
              <span class="m-0 font-weight-bold text-danger">Pendiente(<?php echo $UserB->contarInactivos($Perfil); ?>)</span>
              <a href="modify-usuario.php"><input class="btn btn-danger" type="submit" value="Añadir Cliente"></a>
              <input class="btn btn-danger" type="submit" value="Imprimir">
              <input class="btn btn-danger" type="submit" value="PDF">
              <input class="btn btn-danger" type="submit" value="CSV">
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-xl-responsive-borderless" id="tablajson" width="100%" cellspacing="0">
                  <thead class="thead-dark">
                    <tr align="center">
                      <th>ID</th>
                      <th>Status</th>
                      <th>Nombre</th>
                      <th>Apellido</th>
                      <th>Fecha de nacimiento</th>
                      <th>Usuario</th>
                      <th>Email</th>
                      <th>Direccion</th>
                      <th>Telefono</th>
                      <th>Pedidos</th>
                      <th>Dinero Gastado</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php

                  $dato = array('tipo'=>'Cliente');
                  foreach($UserB->getEntradas($dato) as $us){ ?>
                  <?php
                  
                  $direccion = "SELECT calle,altura,piso,dpto,barrio FROM direccion
                  INNER JOIN usuario_direccion on direccion.id_direccion =usuario_direccion.id_direccion 
                  WHERE id_usuario=".$us->getIDUsuario();
                  $resul = $con->query($direccion);
                    ?>

                    <tr align="center">
                      <td><?php echo $us->getIDUsuario(); ?></td>
                      <td><?php echo $us->getStatus(); ?></td>
                      <td><?php echo $us->getNombre(); ?></td>
                      <td><?php echo $us->getApellido(); ?></td>
                      <td><?php echo $us->getFechaNac(); ?></td>
                      <td><?php echo $us->getUsuario(); ?></td>
                      <td><?php echo $us->getEmail(); ?></td>
                      <td>
                      <?php foreach ($resul as $dir) { ?>
                     
                     
                      <?php echo $dir['calle'].' '.
                                     $dir['altura'].' '.
                                     $dir['piso'].'º'.
                                     $dir['dpto'].' '.
                                     $dir['barrio']; ?>
                      <?php } ?>
                      </td>
                      <td><?php echo $us->getTelefono(); ?></td>
                      <td><?php echo $us->getPedidos(); ?></td>
                      <td><?php echo $us->getDineroGastado(); ?></td>

                      <td><center>
                      <a href="modify-usuario.php?edit=<?php echo $us->getIDUsuario();?>&user"><i class="fas fa-edit text-danger"></a></i>&nbsp;&nbsp;
                      <a href="user.php?del=<?php echo $us->getIDUsuario();?>"><i class="fas fa-trash-alt text-danger"></a></i>&nbsp;&nbsp;
                      <a href="user.php?status=<?php echo $us->getIDUsuario();?>"> <i class="
                      <?php if($us->getStatus() == 0){ echo 'fas fa-circle'; } else { echo 'fas fa-check-circle text-danger'; } ?>
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
