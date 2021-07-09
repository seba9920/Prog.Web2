<?php
include('../Helpers/header.php');
include_once('../Helpers/funcs.php');

//obtengo el contenido del archivo
$datos = file_get_contents('../../DataAccess/comentarios.json');
//convierto a un array
$datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){
        
    
        if(isset($_GET['edit'])){
            //modificando
            $id = $_GET['edit'];
        }else{
            //agrego 
            $id = date('Y-n-j, H:i:s');
        }



        $datosJson[$id] = array('id'=>$id,'user'=>$_POST['tUser'], 'rating'=>$_POST['tRating'], 'comentario'=>$_POST['tComentario']);
    
        //trunco el archivo
        $fp = fopen('../datos/comentarios.json','w');
        //convierto a json string
        $datosString = json_encode($datosJson);
        //guardo el archivo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('../Views/comentarios.php');
    }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Nuevo Comentario</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-0">
              <!--<input class="btn btn-danger" type="submit" value="Añadir Nuevo">-->
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <form method="POST" action="" name="com" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                       <tr>
                          <td align="right"><label for="txUser">Usuario:</label</td>
                          <td><input type="text" id="txtUser" name="tUser"  size="50" class="bg-danger text-white"></td>
                        </tr>
                        
                        <tr>
                          <td align="right"><label for="txtRating">ID Pelicula:</label</td>
                          <td><input type="text" id="txtRating" name="tRating"  size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtRating">Rating:</label</td>
                          <td><input type="text" id="txtRating" name="tRating"  size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtComentario">Comentario</label</td>
                          <td align="left"><textarea id="txtComentario" name="tComentario" cols="80" rows="5" class="bg-danger text-white"></textarea></td>
                        </tr>   

                        <tr>
                          <td align="right"><input type="submit" name="add" value="Guardar" class="btn btn-danger"></td>
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
