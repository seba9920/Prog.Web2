<?php
require_once('db.php');


try {        
 $con = new PDO('mysql:host='.$hostname.';dbname='.$database, $username, $password);
 //print "Conexión exitosa!";
}
catch (PDOException $e) {
   echo $e->getMessage();
   die();

} 
?> 