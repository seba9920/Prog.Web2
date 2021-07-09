<?php 
include_once('../Helpers/funcs.php');

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// PREPARO LA CONECCION CON LA BASE DE DATOS
$hostname = 'localhost';
$database = 'prueba';
$username = 'root';
$password = '';
$port = '3306';

    try {        
        $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
        //print "Conexión exitosa!";
    }
    catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage();
        die();
    }

 // PREPARO LA BASE DE DATOS JSON

    $datosJson = json_decode(file_get_contents('../DataAccess/productos.json'),true);

foreach($datosJson as $d){
    $status=1;
    $nombre=$d['nombre'];
    $precio=$d['precio'];
    $dur=$d['duracion'];
    $anio=$d['anio'];
    $direct=$d['director'];
    $actor=$d['actores'];
    $descripcion=$d['descripcion'];
       
 //MODIFICO LA CLASIFICACION
    if($d['clasificacion']== '+18'){ $clasif=4; } else
    if($d['clasificacion']== '+16'){ $clasif=3; } else
    if($d['clasificacion']== '+13'){ $clasif=2; } else
                                   { $clasif=1; }
 //INSERTO LA PELICULA
    $sql = "INSERT INTO pelicula(status,nombre, precio, id_clasificacion, duracion, anio, directores, actores, descripcion) 
    VALUES ('$status','$nombre', '$precio', '$clasif', '$dur', '$anio', '$direct', '$actor', '$descripcion');";
    $count = $con->exec($sql);
  
  }  
 
 //AGARRO EL ID DE LA PELICULA INSERTADA
    $idPelicula = $con->lastInsertId();    
 //MODIFICO EL GENERO
 
    foreach($d['genero'] as $gen ){
      if($gen==12){ $gen2=1; }else
      if($gen==13){ $gen2=2; }else
      if($gen==14){ $gen2=3; }else
      if($gen==15){ $gen2=4; }else
      if($gen==16){ $gen2=5; }else
      if($gen==17){ $gen2=6; }else
      if($gen==18){ $gen2=7; }else
      if($gen==19){ $gen2=8; }else
      if($gen==20){ $gen2=9; }else
      if($gen==21){ $gen2=10;}else
      if($gen==22){ $gen2=11;}else
      if($gen==23){ $gen2=12;}else
      if($gen==24){ $gen2=13;}

     //iNSERTO EL GENERO
      $sql2 = "INSERT INTO pelicula_genero(id_pelicula, id_genero_subgenero)
      VALUES ($idPelicula, $gen2);";
      $count2 = $con->exec($sql2);

    }  



// ADMINS

$AdminJson = json_decode(file_get_contents('../datos/admin.json'),true);

foreach($AdminJson as $a){
  $status= 1;
  $nombre=    $a['nombre']; // OK
  $apellido=  $a['apellido']; // OK
  $fecha=     $a['fecha']; // OK
  $usuario=   $a['user']; // OK
  $pass=      $a['pass']; // OK
  $email=     $a['email']; // OK
  

    //INSERTO LA ADMIN - SIN ID_DOMICILIO
    $sql4 = "INSERT INTO admin(status, nombre, apellido, fecha,usuario,pass,email) 
    VALUES ('$status', '$nombre', '$apellido', '$fecha', '$usuario', '$pass', '$email');";
    $count = $con->exec($sql4);
  
} 

// --##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##--##

// USUARIOS

$UsuariosJson = json_decode(file_get_contents('../datos/usuarios.json'),true);

foreach($UsuariosJson as $u){
  $status= 1;
  $nombre=    $u['nombre']; // OK
  $apellido=  $u['apellido']; // OK
  $fechaC= DateTime::createFromFormat('d/m/Y, H:i:s',$u['id']);  // OK
  
  $fecha_nac= $u['fecha']; // OK
  $usuario=   $u['user']; // OK
  $pass=      $u['pass']; // OK
  $email=     $u['email']; // OK
  $telefono=  $u['telefono']; // OK

  
    $calle2=   $u['direccion']['calle'];
    $altura2=  $u['direccion']['altura'];
    $piso2=    $u['direccion']['piso'];
    $dpto2=    $u['direccion']['depto'];
    $barrio2=  $u['direccion']['barrio'];

 //INSERTO LA DIRECCION
  if($calle2!=''&&$piso2!=''&&$dpto2!=''&&$barrio2!=''){

    $sql5 = "INSERT INTO direccion(calle, altura, piso, dpto,barrio) 
    VALUES ('$calle2', '$altura2', '$piso2', '$dpto2', '$barrio2');";
    $count = $con->exec($sql5);

    $id_direccion2= $con->lastInsertId();  

    //INSERTO LA USUARIOS

    $sql6 = "INSERT INTO usuario(status, nombre, apellido, fecha, fecha_nac,usuario,pass,email,telefono) 
    VALUES ('$status', '$nombre', '$apellido', '".$fechaC->format('Y-m-d H:i:s')."', '$fecha_nac', '$usuario', '$pass', '$email', '$telefono');";
    $count = $con->exec($sql6);

    $idusuario= $con->lastInsertId();  

    $sql6 = "INSERT INTO usuario_direccion(id_usuario, id_direccion) 
    VALUES ('$idusuario','$id_direccion2');";
    $count = $con->exec($sql6);

  }else{
   //INSERTO LA ADMIN - SIN ID_DOMICILIO 
    $sql6 = "INSERT INTO usuario(status, nombre, apellido, fecha, fecha_nac,usuario,pass,email,telefono) 
    VALUES ('$status', '$nombre', '$apellido', '".$fechaC->format('Y-m-d H:i:s')."', '$fecha_nac', '$usuario', '$pass', '$email', '$telefono');";
    $count = $con->exec($sql6);
  }
   
} 

 
 

//########################################################################################################################################

//INSERTAR COMENTARIOS
$ComentariosJson = json_decode(file_get_contents('../datos/comentarios.json'),true);
    
    $peliculas = "SELECT *
                  FROM usuario";
    $resultado = $con->query($peliculas);     
    
foreach($resultado as $res){
 
  foreach($ComentariosJson as $c){


      //$fechaC=new DateTime(str_replace(',','',$c['id']));  // OK
      $status=1;
      $fechaC= DateTime::createFromFormat('d/m/Y, H:i:s',$c['id']);  // OK
      $titulo="lalala";
      $comentarioC=  $c['comentario']; // OK
      $ratingC=      $c['rating']; // OK
      $id_peliculaC= $c['peli']; // OK
      
      
   
      if($c['user'] == $res['nombre']." ".$res['apellido']){
    
          $idus=  $res['id_usuario'];
          //INSERTO EL COMENTARIO
    
          $sql7 = "INSERT INTO comentario(status,fecha, rating,titulo, comentario, id_pelicula, id_usuario) 
          VALUES ('$status','".$fechaC->format('Y-m-d H:i:s')."', '$ratingC','$titulo', '$comentarioC', '$id_peliculaC', '$idus');";
          
          $count = $con->exec($sql7);

      }
     
  }
  
}
 
//###################################################################################################################################

//INTENTO DE MODIFICAR LAS IMAGENES

   /*  $tamanhos = array(0 => array('nombre'=>'big','ancho'=>'5000','alto'=>'10000'),
              1 => array('nombre'=>'small','ancho'=>'500','alto'=>'1000'),
              2 => array('nombre'=>'thumb','ancho'=>'50','alto'=>'70'));
                         
                        
                        $ruta = 'img/'.$idPelicula.'/';
                        
                        if(!is_dir($ruta))
                          mkdir($ruta);
      $nomImg= $nombre.'.jpg';
      $ubicacionImg= 'C:\xampp\htdocs\Produccion-Web-Local\images\''.$nomImg;
      
    redimensionar($ruta,$nomImg,$ubicacionImg,$idPelicula,$tamanhos); */

//###################################################################################################################################

/* 

// ADD PELICULA, GENERO 
if(isset($_POST['add'])){   
  

   
    
    
    //Inserta datos en pelicula
    $sql = "INSERT INTO pelicula(nombre, precio, id_clasificacion, duracion, anio, directores, actores, descripcion) 
    VALUES ('$nombre', '$precio', '$clasif', '$dur', '$anio', '$direct', '$actor', '$descripcion');";
    $count = $con->exec($sql);
    
    //Guarda el ultimo id_pelicula al insertar pelicula.
    $idPelicula = $con->lastInsertId();    

    $generos=$_POST['tGene'];
    //echo var_dump($generos);

    //Insertar generos en pelicula_genero
    foreach($generos as $gen){
      $sql2 = "INSERT INTO pelicula_genero(id_pelicula, id_genero)
      VALUES ($idPelicula, $gen);";
      $count2 = $con->exec($sql2);
      
    }        

    //redirect('pelicula.php');
    if($count > 0 ){
      print($count." Filas afectadas");
    }else{
      printf("ERROR");
    }



//  INGRESO DE IMAGEN

    if(isset($_FILES['tImg'])){

      $tamanhos = array(0 => array('nombre'=>'big','ancho'=>'5000','alto'=>'10000'),
                        1 => array('nombre'=>'small','ancho'=>'500','alto'=>'1000'),
                        2 => array('nombre'=>'thumb','ancho'=>'50','alto'=>'70'));
                         
                        
                        $ruta = 'img/'.$idPelicula.'/';
                        
                        if(!is_dir($ruta))
                          mkdir($ruta);
      
      
          redimensionar($ruta,$_FILES['tImg']['name'],$_FILES['tImg']['tmp_name'],$idPelicula,$tamanhos);
    }
}  
 */
//###################################################################################################################################

 

?>