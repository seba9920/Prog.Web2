<?php
include('header.php');
include_once('../Helpers/funcs.php');

//obtengo el contenido del archivo
$datos = file_get_contents('../../DataAccess/usuarios.json');
//convierto a un array
$datosJson = json_decode($datos,true);
if(isset($_POST['tTipo'])){
  if($_POST['tTipo'] == "Cliente"){
    if(isset($_POST['add'])){
        
    
        if(isset($_GET['edit'])){
            //modificando
            $id = $_GET['edit'];
        }else{
            //agrego 
            $id = date('j/n/Y, H:i:s');
        }

        $datosJson[$id] = array('id'=>$id,'tipo'=>$_POST['tTipo'], 'nombre'=>$_POST['tName'], 'apellido'=>$_POST['tApellido'],
         'fecha'=>$_POST['tFecha'], 'user'=>$_POST['tUser'], 'email'=>$_POST['tEmail'], 'pass'=>$_POST['tPass'], 'direccion'=>$_POST['tDireccion'],
         'telefono'=>$_POST['tTel'], 'pedidos'=>$_POST[''], 'gasto'=>$_POST['']);
    
        //trunco el archivo
        $fp = fopen('../../DataAccess/usuarios.json','w');
        //convierto a json string
        $datosString = json_encode($datosJson);
        //guardo el archivo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('user.php');
    }
   }
  }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }

?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Nuevo Usuario</h1>
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
                          <td align="right"><label for="txtStatus">Status:</label</td>
                          <td>
                          <select name="status" id="#tipo" class="bg-danger text-white px-2">
                          <option class="bg-danger text-white" value="0"> Pendiente </option>
                          <option class="bg-danger text-white" value="1"> Activo </option>
                          
                          
                          </select>
                          </td>
                        </tr>
                       <tr>
                          <td align="right"><label for="txtName">Nombre:</label</td>
                          <td><input type="text" id="txtName" name="tName"  size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtApellido">Apellido:</label</td>
                          <td><input type="text" id="txtApellido" name="tApellido"  size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtFecha">Fecha de nacimiento:</label</td>
                          <td><input type="date" id="txtFecha" name="tFecha"  size="10" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtUser">User:</label</td>
                          <td><input type="text" id="txtUser" name="tUser" size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtEmail">Email:</label</td>
                          <td><input type="text" id="txtEmail" name="tEmail"  size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtPass">Password:</label</td>
                          <td><input type="password" id="txtPass" name="tPass"  size="50" class="bg-danger text-white"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtDireccion">Direccion:</label></td>
                          <td>
                          <input type="text" id="txtDireccion" placeholder="Calle" name="tDireccion[calle]"  size="15" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Altura" name="tDireccion[altura]"  size="5" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Piso" name="tDireccion[piso]"  size="5" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Depto" name="tDireccion[depto]" size="5" class="bg-danger text-white mi-input">
                          <input type="text" id="txtDireccion" placeholder="Barrio" name="tDireccion[barrio]"  size="15" class="bg-danger text-white mi-input"></td>
                        </tr>

                        <tr>
                          <td align="right"><label for="txtTelefono">Telefono:</label</td>
                          <td><input type="text" id="txtTelefono" name="tTel"  size="20" class="bg-danger text-white"></td>
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
