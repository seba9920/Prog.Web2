<?php
include('header.php');
include_once('../Helpers/funcs.php');

include_once('../Business/ComentarioBusiness.php');
$ComentarioB = NEW ComentarioBusiness($con);

    if(isset($_GET['edit'])){
        $Edit = true;
        $Comentario = $ComentarioB->getPregunta($_GET['edit']);
    }
    
    if(isset($_POST['add'])){
     
      $datos=array('pregunta'=>$_POST['tPregunta'],
                   'detalle'=> isset($_POST['tDetalle'])?$_POST['tDetalle']:'NULL',  
                   'tipo'=>$_POST['tTipo'],
                   'status'=>$_POST['tStatus'],
                   'obligatorio'=>$_POST['tObligatorio']);

      $ComentarioB->getAddPregunta($datos);

      
      redirect('preguntas.php');
    
    }

    //FALTA HACER EL MODD DE PELICULA
    if(isset($_POST['mod'])) {
      $id= $_GET['edit'];
      $datos=array('pregunta'=>$_POST['tPregunta'],
                   'detalle'=>$_POST['tDetalle'],  
                   'tipo'=>$_POST['tTipo'],
                   'status'=>$_POST['tStatus'],
                   'obligatorio'=>$_POST['tObligatorio']);
      
     $ComentarioB->getModPregunta($id,$datos);

     redirect('preguntas.php');
    }
    
    
    

    
?>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


        <?php if (isset($_GET['edit'])) {
            
            ?>
            
            <h1 class="h3 mb-2 text-gray-800">Editar Pregunta</h1>
          
          <?php } else { ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Nueva Pregunta</h1>
          <!--<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>-->
          
            <?php } ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-1">
            
            </div>
            <div class="card-body">
              <div class="table-responsive">
                    <form method="POST" action="" name="com" enctype="multipart/form-data">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                          <td align="right"><label for="txtPregunta">Pregunta:</label></td>
                          <td><input type="text" id="txtPregunta" name="tPregunta" value="<?php echo isset($Edit)?$Comentario['pregunta']:''?>" size="50" class="bg-danger text-white" required></td>                        
                     
                        <tr>
                          <td align="right"><label for="txtTipo">Tipo:</label></td>
                          <td>
                          <select id="txtTipo" name="tTipo" onchange="tipo()">
                            <option value="1" >Text</option>
                            <option value="2" >Checkbox</option>
                            <option value="3" >Select</option>
                            <option value="4" >Radio</option>
                          </select>
                        
                          </td>
                        </tr>
                        <?php if(isset($Edit)&&$Comentario['detalle']!='NULL'&&$Comentario['detalle']!=null){ ?>
                        
                        <tr>
                          <td align="right"><label for="txtDetalle">Detalle:</label></td>
                          <td><input type="text" id="txtDetalle" name="tDetalle" value="<?php echo $Comentario['detalle']; ?>" size="50" class="bg-danger text-white"></td>
                        </tr>

                        <?php } ?>
                        
                        <tr>
                          <td align="right"><label for="txtStatus">Status:</label></td>
                          <td><input type="text" id="txtStatus" name="tStatus" value="<?php echo isset($Edit)?$Comentario['status']:''?>" size="50" class="bg-danger text-white" required></td>
                        </tr>

                        <tr>
                          <td align="right"><label class='mt-4' for="txtObligatiorio">Obligatorio:</label></td>
                          <td><style> .radio {width: 25px;height: 25px;}</style>
                              <p  class="mx-4"> <input class="radio mr-2" type="radio" id="txtObligatiorio" name="tObligatorio" value="1" <?php if(isset($Edit)) { echo ($Comentario['obligatorio']==1)?'checked':''; }?> >Si</p>
                              <p  class="mx-4"> <input class="radio mr-2" type="radio" id="txtObligatiorio" name="tObligatorio" value="0" <?php if(isset($Edit)) { echo ($Comentario['obligatorio']==0)?'checked':''; }?>>No</p>
                          </td>
                        </tr>                          
                        <tr>

                        <tr>
                          <td align="right"><input type="submit" name="<?php echo isset($Edit)?'mod':'add' ?>" value="Guardar" class="btn btn-danger"></td>
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
  <script>
        
      var count = 0;
      function tipo(){

          let posicion = 2;
          let tipo = document.getElementById("txtTipo").value;
          
          if(tipo == 2 || tipo == 3|| tipo==4){
            count++;
            let tabla = document.getElementById('dataTable');
            let row = tabla.insertRow(posicion);
            if( count<=1){
              let cellNombre = row.insertCell(0);
              let cellDetalle = row.insertCell(1);
            
              cellNombre.setAttribute('align','right');
              cellNombre.innerHTML = "<label for='txtDetalle'>Detalle:</label>";
              cellDetalle.innerHTML = "<style>::placeholder{color: white;}</style><input placeholder='Separar los valores con coma (,)' type='text' id='txtDetalle' name='tDetalle' size='50' class='text-white bg-danger'>";
            }
          } else {
            
            if(count => 1){
              count = 0;
              
              let tabla = document.getElementById('dataTable');
              var nombre = document.getElementById('txtDetalle');
              var index = nombre.parentNode.parentNode.rowIndex;
              tabla.deleteRow(index);
             
            }
          }
      }
             
  </script>

</body>

</html>
