<?php 

require_once('../Helpers/funcs.php');


$datos = file_get_contents('../DataAccess/ip.json');
			$datosJson = json_decode($datos,true);
			foreach($datosJson as $datos){
				if($datos['id']== 1){
					$fecha= $datos['fecha'];
					break;
				}				
			
			
			}	
         
          //echo $fecha;
			$mifecha = new DateTime();
         
         $fecha_actual = strtotime(date("Y-m-d H:i:s",time()));
         $fecha_entrada = strtotime($fecha);
         $resultFecha = $fecha_entrada;
         if(($fecha_actual-$resultFecha)>86400){
            echo 'HOLA';
         }else{
            echo 'CHAU';
         }

/*
         $fecha = new DateTime();
         echo $fecha->format('U = Y-m-d H:i:s') . "\n";

         $fecha->setTimestamp(1171502725);
         echo $fecha->format('U = Y-m-d H:i:s') . "\n";*/

         
         //1620194400
          //1620280800
         //$fechaC= DateTime::createFromFormat('d/m/Y, H:i:s',$fecha);
         //$fechaC->format('Y-m-d H:i:s');
         
         //echo $fechaC;


      /*    echo $fecha_actual.'<br>';
         echo $resultFecha;
 */
         /*$mifecha = $fecha;
         echo $mifecha;
         echo '<br>';
         $mifecha->modify('+24 hours');
         echo $mifecha;*/
         //$mifecha->set_state($fecha);
         /* echo $mifecha->format('Y-m-d H:i:s'); */
         
			/* $mifecha->modify('+24 hours');
			
         if($fecha != $mifecha->format('Y-m-d H:i:s')){
            echo "hola";
         } */
         
         
         
         /* echo $fecha;
         echo date_add($fecha, date_interval_create_from_date_string("1 day")); */

//############################################################################################################
//#########################--MODIFICACION DE TITULOS DE LA TABLA COMENTARIOS--################################
//############################################################################################################
/* 
require_once('../Helpers/config.php');
require_once('../Business/ComentarioBusiness.php');
$ComenB= new ComentarioBusiness($con);



foreach($ComenB->getEntradas() as $dat){
   $datos = array();
   if ($dat->getRating()==1){
      $titulo='Horrible';
      $dat->setTitulo($titulo);
   }else if ($dat->getRating()==2){
      $titulo='Muy mala';
      $dat->setTitulo($titulo);
   }else if ($dat->getRating()==3){
      $titulo='Safable';
      $dat->setTitulo($titulo);
   }else if ($dat->getRating()==4){
      $titulo='Muy buena';
      $dat->setTitulo($titulo);
   }else if ($dat->getRating()==5){
      $titulo='Espectacular';
      $dat->setTitulo($titulo);
   }

   $datos['status']=$dat->getStatus();
   $datos['fecha']=$dat->getFecha();
   $datos['rating']=$dat->getRating();
   $datos['titulo']=$dat->getTitulo();
   $datos['comentario']=$dat->getComentario();
   $datos['id_pelicula']=$dat->getIDPelicula();
   $datos['id_usuario']=$dat->getIDUsuario();

   $ComenB->getMod($dat->getIDComentario(),$datos);
}
 */
//############################################################################################################
//########--MODIFICACION DE NOMBRE, ACTORES,DIRECTORES Y DESCRIPCION DE LA TABLA COMENTARIOS--################
//############################################################################################################

require_once('../Helpers/config.php');
require_once('../Business/PeliculaBusiness.php');
$PeliB= new PeliculaBusiness($con);


$prod= json_decode(file_get_contents('../DataAccess/productos.json'),true);

foreach($PeliB->getEntradas() as $pel){
   
   foreach($prod as $productos){
      
         if($pel->getID() == $productos['id']){
            
            $datos = array(); 
            
            $datos['status'] = $pel->getStatus();
            $pel->setNombre($productos['nombre']);
            $datos['nombre'] = $pel->getNombre();

            $datos['precio'] = $pel->getPrecio();
            $datos['id_clasificacion'] = $pel->getIDClasificacion();
            $datos['duracion'] = $pel->getDuracion();
            $datos['anio'] = $pel->getAnio();
            
            $pel->setDirectores($productos['director']);
            $datos['directores'] = $pel->getDirectores();
            
            $pel->setActores($productos['actores']);
            $datos['actores'] = $pel->getActores();
            
            $pel->setDescripcion($productos['descripcion']);
            $datos['descripcion'] = $pel->getDescripcion();
            
            $PeliB->getMod($pel->getID(),$datos);
         }
         
      }
      
      
}


?>