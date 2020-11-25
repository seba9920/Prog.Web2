<?php
include('inc/header.php');
include_once('functions/funcs.php');

$datos = file_get_contents('../datos/comentarios.json');
//echo $datos['imagen']['name'];

if(isset($_GET['del'])){
  //eliminacion de archivo imagen
/*   foreach(file_get_contents('productos.json', true) as $a) {
   $files = glob('img/'.$a['imagen']['name']); //obtenemos todos los nombres de los ficheros
  } */
    $datos = file_get_contents('../datos/comentarios.json');
    $datosJson = json_decode($datos,true);
    $eliminarimg= $datos['imagen']['name'];
    imagedestroy('img/'.$eliminarimg);


  //fin eliminacion archivo imagen
  foreach($files as $file){
      if(is_file($file))
      unlink($file); //elimino el fichero
  } 
    //obtengo el contenido del archivo
    $datos = file_get_contents('../datos/comentarios.json');
    //convierto a un array
    $datosJson = json_decode($datos,true);
    //var_dump($datosJson);
    //borro del array
    unset($datosJson[$_GET['del']]);
    //trunco el archivo
    $fp = fopen('../datos/comentarios.json','w');
    //convierto a json string
    $datosString = json_encode($datosJson);
    //guardo el archivo
    fwrite($fp,$datosString);
    fclose($fp);

    redirect('comentarios.php');
}
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Comentarios</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
              <span class="m-0 font-weight-bold text-primary">Todo()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Publicado()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Borrador()</span>
              <span class="m-0 font-weight-bold text-primary">|</span>
              <span class="m-0 font-weight-bold text-primary">Pendiente()</span>
              
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
                      <th>Fecha</th>
                      <th>Usuario</th>
                      <th>Pelicula</th>
                      <th>Rating</th>
                      <th>Comentario</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                  foreach(json_decode(file_get_contents('../datos/comentarios.json'), true) as $peli){ ?>
                    <tr align="center">
                    <td><?php echo $peli['id']; ?></td>
                      <td><?php echo $peli['user']; ?></td>
                      
                      <td>
                      <?php foreach(json_decode(file_get_contents('../datos/productos.json'), true) as $pel){ 
                              if($peli['peli'] == $pel['id']) { ?>

                              <?php echo $pel['nombre']; ?>
                              <?php }
                        } ?>
                      </td>

                      <td><?php echo $peli['rating']; ?></td>
                      <td>
                      <button type='button' onclick="alert('<?php  echo $peli['comentario']; ?>')" class="btn btn-danger">Detalles</button>
                      </td>
                      <td><center>
                      <a href="edit-comentario.php?edit=<?php echo $peli['id'];?>"><i class="fas fa-edit"></a></i>&nbsp;&nbsp;
                      <a href="comentarios.php?del=<?php echo $peli['id'];?>"><i class="fas fa-trash-alt"></i></a></i></center>
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
   
   </script> 

</body>

</html>
