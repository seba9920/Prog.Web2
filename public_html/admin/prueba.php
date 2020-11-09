<?php

/* 
$file = 'datos.json';
//fwrite($file, 'Hola clase, ya se durmieron');

$contenido = 'Hola clase, ya se durmieron';


$mostrar=file_put_contents ($file,$contenido);

echo ($mostrar);

 */

/* 
$fichero = 'datos.json';

$persona = "Hola clase, ya se durmieron".'<br/>'."Todo bien?".'<br/>';

file_put_contents($fichero, $persona, FILE_APPEND | LOCK_EX);
$contenido= file_get_contents($fichero);

 */




?>

<?php


/********************* GENERAR JSON *****************/


  if ( isset($_POST["tName"]) && isset($_POST["tPrecio"]) && isset($_POST["tClasi"]) &&
      isset($_POST["tGene"]) &&
      isset($_POST["tAnio"]) && isset($_POST["tDirect"]) && isset($_POST["tActor"]) 
      && isset($_POST["tDescripcion"]))
  {
 
 $datos = array(); //creamos un array

$dato1=$_POST['tName'];
$dato2=$_POST['tPrecio'];
$dato3=$_POST['tClasi'];
$dato4=$_POST['tGene'];
$dato5=$_POST['tAnio'];
$dato6=$_POST['tDirect'];
$dato7=$_POST['tActor'];
$dato8=$_POST['tDescripcion'];


$datos[] = array('tName'=> $dato1, 'tPrecio'=> $dato2, 'tClasi'=> $dato3,'tGene'=> $dato4,
                'tAnio'=> $dato5, 'tDirect'=> $dato6, 'tActor'=> $dato7, 'tDescripcion'=> $dato8);

 //Creamos el JSON
$json_string = json_encode($datos);


$file = fopen('datos.json','a') ;

foreach($datos as $d){
    fputcsv($file, $d); 
}
fclose($file);

 /* $data = array(
    array(1,2,3,4,5,6),
    array('ho,"la','que','tal')
);

$fp = fopen('datosCSV2.txt','a');

foreach($data as $d){
    fputcsv($fp,$d);
}

fclose($fp); */

 
 /* $contenido= file_get_contents($file);
 echo ($contenido);  */
 /* 
 $fichero = 'datos.json';

 $persona = "Hola clase, ya se durmieron".'<br/>'."Todo bien?".'<br/>';
 
 file_put_contents($fichero, $persona, FILE_APPEND | LOCK_EX);
 $contenido= file_get_contents($fichero);
 echo ($contenido); */




}
else
{
 echo "<span style='color: red;'>Por favor, ingrese algún dato. </span></br></br>";
} 









?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Formulario para Generar y mostrar JSON - EjemploCodigo</title>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" ></script> 

	
	
</head>

<form method="POST" action="<?php $_PHP_SELF ?>" name="prod">
                      <table class="table bg-gradient-dark text-white" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                          <td align="right"><label for="txtName">Nombre</label</td>
                          <td><input type="text" id="txtName" name="tName" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtPrecio">Precio</label</td>
                          <td><input type="text" id="txtPrecio" name="tPrecio" size="10" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtClasi">Clasificación</label</td>
                          <td><input type="text" id="txtClasi" name="tClasi" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtGene">Genero</label</td>
                          <td><input type="text" id="txtGene" name="tGene" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtAnio">Año</label</td>
                          <td><input type="text" id="txtAnio" name="tAnio" size="5" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtDirect">Directores</label</td>
                          <td><input type="text" id="txtDirect" name="tDirect" size="50" class="bg-danger text-white"></td>
                        </tr>
                        <tr>
                        <td align="right"><label for="txtActor">Actores</label</td>
                          <td><input type="text" id="txtActor" name="tActor" size="50" class="bg-danger text-white"></td>
                        </tr>                                                
                        
                          <td align="right"><label for="txtDescripcion">Descripcion</label</td>
                          <td align="left"><input type="text" id="txtDescripcion" name="tDescripcion" size="50" class="bg-danger text-white"></td>
                        </tr>                           
                        </tr>
                          <td align="right"><input type="submit" value="Guardar" id="btnSavePeli" class="btn btn-danger"></td>
                          <td align="left"><input type="reset" value="Reset" class="btn btn-danger"></td>
                        </tr>                         
                      </table>
                    </form>

                    
                <table class="table table-bordered" id="tablajson" width="100%" cellspacing="0">
                  <thead>
                    <tr align="center">
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Clasificacion</th>
                      <th>Genero</th>
                      <th>Año</th>
                      <th>Directores</th>
                      <th>Actores</th>
                      <th>Descripcion</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                  <tr>
                  <td><?php echo $datos['tName'] ?></td>
                  </tr>
                  </tbody>
                <!--  <tbody>
                    <tr align="center">
                      <td>Proyecto Power</td>
                      <td><img src="../generos/images/proyecto_power.jpg" width="150px" height=200px></td>
                      <td>Accion, Ciencia Ficcion</td>
                      <td>$150.00</td>
                      <td>+16</td>
                      <td>2020</td>
                      <td>Henry Joost, Ariel Schulman</td>
                      <td>Jamie Foxx, Joseph Gordon-Levitt, Dominique Fishback</td>
                      <td>Un exsoldado se une a un policía para encontrar la fuente detrás de una píldora peligrosa que proporciona superpoderes temporales.</td>
                      <td><center>
                      <a href="edit-pelicula.php"><i class="fas fa-edit"></a></i>&nbsp;&nbsp;
                      <a href="#"><i class="fas fa-trash-alt"></i></a></i></center>
                      </td>
                    </tr>
                  </tbody>-->
                </table><!-- 
                <script type="text/javascript">
                $(document).ready(function(){
                  var url="datos.json";
                    $("#tablajson tbody").html("");
                      $.getJSON(url,function(datos){
                      $.each(datos, function(i,dato){
                      var newRow =
                      "<tr>"
                      +"<td>"+dato.dato1+"</td>"
                      +"<td>"+dato.dato2+"</td>"
                      +"<td>"+dato.dato3+"</td>"
                      +"<td>"+dato.dato4+"</td>"
                      +"<td>"+dato.dato5+"</td>"
                      +"<td>"+dato.dato6+"</td>"
                      +"<td>"+dato.dato7+"</td>"
                      +"<td>"+dato.dato8+"</td>"
                      +"</tr>";
                      $(newRow).appendTo("#tablajson tbody");
                      });
                      });
                      });
                </script> -->
              



                    </html>