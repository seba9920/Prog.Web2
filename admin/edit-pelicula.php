<?php
include('header.php');
include_once('../Helpers/funcs.php');



if(isset($_FILES['tImg']))
  move_uploaded_file($_FILES['tImg']['tmp_name'],'img/'.$_FILES['tImg']['name']);

//Fin Funcion Carga Imagen

//obtengo el contenido del archivo
$datos = file_get_contents('../DataAccess/productos.json');
//convierto a un array
$datosJson = json_decode($datos,true);

    if(isset($_POST['add'])){
       

    
        if(isset($_GET['edit'])){
            //modificando
            $id = $_GET['edit'];
        }else{
            //agrego 
            $id = date('Ymdhis');
        }
        if($_POST['tGene']==""){
          $gene=$datosJson[$id]['genero'];
        }else{
          $gene=$_POST['tGene'];
        }        
        
      if($_FILES['tImg']['name']==""){
        $img=$datosJson[$id]['imagen'];
      }else{
        $img=$_FILES['tImg'];
      }        

        $datosJson[$id] = array('id'=>$id, 'nombre'=>$_POST['tName'], 'genero'=>$gene,
         'anio'=>$_POST['tAnio'], 'director'=>$_POST['tDirect'], 'actores'=>$_POST['tActor'],
         'duracion'=>$_POST['tDur'], 'clasificacion'=>$_POST['tClasi'], 'descripcion'=>$_POST['tDescripcion'],        
         'imagen'=>$img,'precio'=>$_POST['tPrecio']);
         
        //echo '<pre>';
        // var_dump($datosJson);
        // echo '</pre>';
        //trunco el archivo
        $fp = fopen('../../DataAccess/productos.json','w');
        //convierto a json string
        $datosString = json_encode($datosJson);
        //guardo el archivo
        fwrite($fp,$datosString);
        fclose($fp);
        redirect('peliculas.php');
    }

    if(isset($_GET['edit'])){
        $dato = $datosJson[$_GET['edit']];
    }
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Editar Pelicula</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            <a href="new-pelicula.php"><input class="btn btn-danger" type="submit" value="Añadir Nuevo" style="float: right;"></a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="prod" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                      <tr>
                          <td align="right"><label for="txtName">Nombre:</label</td>
                          <td><input type="text" id="txtName" name="tName" value="<?php echo isset($dato)?$dato['nombre']:''?>" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtPrecio">Precio:</label</td>
                          <td><input type="text" id="txtPrecio" name="tPrecio" value="<?php echo isset($dato)?$dato['precio']:''?>" size="10" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtClasi">Clasificación:</label</td>
                          <td>
                          <select name="tClasi" id="#clasi" class="bg-danger text-white">
                          <?php



                          $clasi=json_decode(file_get_contents('../DataAccess/clasificacion.json'),true);
                           
                          
                          /* '<pre>';
                          $mostrar = var_dump($clasi);
                          echo $mostrar;
                          echo '</pre>'; */

                          foreach($clasi as $clas){ ?>
                            <option class="bg-danger text-white" value="<?php echo $clas['nombre'] ?>" 
                            <?php if($dato['clasificacion']==$clas['nombre'] ){
                              echo 'selected="selected"';
                            }?>
                            > <?php echo $clas['nombre'] ?> </option>
                          <?php } ?>
                          
                          </select>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtGene">Género:</label</td>
                          <td>
                          <?php 
                          
                          $categorias = json_decode(file_get_contents('../DataAccess/categorias.json'),true);
                          
                          $cont=0;
                          foreach($categorias as $cat){ ?>
                          
                          <!-- marque automaticamente los generos que ya tiene por defecto la pelicula, agregando un ckecked -->
                          <input 

                          <?php
                          foreach($dato['genero'] as $dat) {
                           if ($dat == $cat['id']) {
                              echo 'checked';
                          } 
                        }
                          ?> type="checkbox" id="generos" name="tGene[]" value="<?php echo $cat['id'] ?>" size="5" class="bg-danger text-white">
                          <label class="bg-danger text-white" for="generos"><?php echo $cat['nombre'] ?></label>
                          
                          
                          
                            
                            <?php $cont++; 
                            if($cont==3){
                              $cont=0;
                              echo "<br/>";
                            }?>
                          
                          <?php  } ?>
                          </td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtAnio">Año:</label</td>
                          <td><input type="text" id="txtAnio" name="tAnio" value="<?php echo isset($dato)?$dato['anio']:''?>" size="5" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtDirect">Directores:</label</td>
                          <td><input type="text" id="txtDirect" name="tDirect" value="<?php echo isset($dato)?$dato['director']:''?>" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtActor">Actores:</label</td>
                          <td><input type="text" id="txtActor" name="tActor" value="<?php echo isset($dato)?$dato['actores']:''?>" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtDur">Duración:</label</td>
                          <td><input type="text" id="txtDur" name="tDur" value="<?php echo isset($dato)?$dato['duracion']:''?>" size="8" class="bg-danger text-white"></td>
                        </tr>                                                  
                        <tr>
                          <td align="right"><label for="txtImg">Imagen:</label</td>
                          <td>
                          <?php if (is_array($dato['imagen'])) {
                                           echo isset($dato)?$dato['imagen']['name']:'';
                                        } else {
                                        echo isset($dato)?$dato['imagen']:'';
                                        };?>
                          <br>
                          <input type="file" id="txtImg" name="tImg" accept="image/*" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                          <td align="right"><label for="txtDescripcion">Descripción:</label</td>
                          <td align="left"><textarea id="txtDescripcion" name="tDescripcion" cols="80" rows="5" class="bg-danger text-white"><?php echo isset($dato)?$dato['descripcion']:''?></textarea></td>
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
