<?php
include('inc/header.php'); 
include_once('functions/funcs.php');

if(isset($_GET['del'])){
  
    //obtengo el contenido del archivo
    $datos = file_get_contents('../datos/usuarios.json');
    //convierto a un array
    $datosJson = json_decode($datos,true);
    //var_dump($datosJson);
    //borro del array
    unset($datosJson[$_GET['del']]);
    //trunco el archivo
    $fp = fopen('../datos/usuarios.json','w');
    //convierto a json string
    $datosString = json_encode($datosJson);
    //guardo el archivo
    fwrite($fp,$datosString);
    fclose($fp);

    redirect('user.php');
}
//ADMIN-----------------------------------------------------------------------------------------------
if(isset($_GET['deladmin'])){
  
    //obtengo el contenido del archivo
    $datos = file_get_contents('../datos/admin.json');
    //convierto a un array
    $datosJson = json_decode($datos,true);
    //var_dump($datosJson);
    //borro del array
    unset($datosJson[$_GET['deladmin']]);
    //trunco el archivo
    $fp = fopen('../datos/admin.json','w');
    //convierto a json string
    $datosString = json_encode($datosJson);
    //guardo el archivo
    fwrite($fp,$datosString);
    fclose($fp);

    redirect('user.php');
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
              <span class="m-0 font-weight-bold text-primary">Todo()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Publicado()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Borrador()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Pendiente()</span>
              <a href="new-user.php"><input class="btn btn-danger" type="submit" value="Añadir Admin"></a>
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
                  foreach(json_decode(file_get_contents('../datos/admin.json'), true) as $ad){ ?>
                    <tr align="center">
                      <td><?php echo $ad['id']; ?></td>
                      <td><?php echo $ad['nombre'] ?></td>
                      <td><?php echo $ad['apellido'] ?></td>
                      <td><?php echo $ad['fecha']; ?></td>
                      <td><?php echo $ad['user'] ?></td>
                      <td><?php echo $ad['email']; ?></td>
                      <td><?php echo $ad['direccion']['calle'].' '.
                                     $ad['direccion']['altura'].' '.
                                     $ad['direccion']['piso'].'º'.
                                     $ad['direccion']['depto'].' '.
                                     $ad['direccion']['barrio']; ?></td>
                      <td><?php echo $ad['telefono']; ?></td>
                      <td><?php /* echo $us['pedidos']; */ ?></td>
                      <td><?php /* echo $us['dineroGastado']; */ ?></td>

                      <td><center>
                      <a href="edit-user.php?editadmin=<?php echo $ad['id'];?>"><i class="fas fa-edit"></a></i>&nbsp;&nbsp;
                      <a href="user.php?deladmin=<?php echo $ad['id'];?>"><i class="fas fa-trash-alt"></i></a></i></center>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
          </div>
<!-- CLIENTES---------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------- -->
<div class="container-fluid">
       <h1 class="h3 mb-2 text-gray-800">Gestionar Clientes</h1>
          <div class="card shadow mb-4">
            <div class="card-header py-1">
              <span class="m-0 font-weight-bold text-primary">Todo()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Publicado()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Borrador()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Pendiente()</span>
              <a href="new-user.php"><input class="btn btn-danger" type="submit" value="Añadir Cliente"></a>
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
                  foreach(json_decode(file_get_contents('../datos/usuarios.json'), true) as $us){ ?>
                    <tr align="center">
                      <td><?php echo $us['id']; ?></td>
                      <td><?php echo $us['nombre'] ?></td>
                      <td><?php echo $us['apellido'] ?></td>
                      <td><?php echo $us['fecha']; ?></td>
                      <td><?php echo $us['user'] ?></td>
                      <td><?php echo $us['email']; ?></td>
                      <td><?php echo $us['direccion']['calle'].' '.
                                     $us['direccion']['altura'].' '.
                                     $us['direccion']['piso'].'º'.
                                     $us['direccion']['depto'].' '.
                                     $us['direccion']['barrio']; ?></td>
                      <td><?php echo $us['telefono']; ?></td>
                      <td><?php /* echo $us['pedidos']; */ ?></td>
                      <td><?php /* echo $us['dineroGastado']; */ ?></td>

                      <td><center>
                      <a href="edit-user.php?edit=<?php echo $us['id'];?>"><i class="fas fa-edit"></a></i>&nbsp;&nbsp;
                      <a href="user.php?del=<?php echo $us['id'];?>"><i class="fas fa-trash-alt"></i></a></i></center>
                      </td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
           </div>
           

        </div>
        
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>&copy;Copyright 2020. Todos los derechos reservados.</span><br>
            <span>Movie Shop</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <!--<script src="vendor/jquery/jquery.min.js"></script>-->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  
  
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

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
