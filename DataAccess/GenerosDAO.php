<?php

require_once('DAO.php');
require_once('../Models/GeneroEntity.php');
require_once('../Models/SubGeneroEntity.php');

class GeneroDAO extends DAO{
    

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'genero';
    }

    public function getOne($id){
        $sql = "SELECT id_genero,status,nombre FROM $this->table WHERE id_genero = $id";
        return $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'GeneroEntity')->fetch();
         
        
    }
    public function getOneIDPeli($id){
        $sql = "SELECT DISTINCT G.id_genero, G.nombre FROM genero G
        INNER JOIN genero_subgenero GS ON G.id_genero = GS.id_genero
        INNER JOIN pelicula_genero PG ON GS.id_genero_subgenero = PG.id_genero_subgenero
        WHERE G.status=1 AND PG.id_pelicula=".$id;
        return $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'GeneroEntity')->fetchAll();


    }

    public function getAll($where = array()){
        $gen= array();
        
        if(isset($_GET['genero']) && !empty($_GET['genero'])){
            $gen[]=' AND GS.id_genero = '.$_GET['genero'].' 
                     AND GS.id_genero != '.$_GET['genero'];
        }
        if(isset($_GET['subgenero']) && !empty($_GET['subgenero'])){
            $gen[]=' AND GS.id_subgenero = '.$_GET['subgenero'];
        }
        
        $sWhereStr='';
        if(!empty($gen)) { $sWhereStr=' '. implode(' ',$gen);
        }

        $sql = "SELECT DISTINCT G.id_genero,G.status,G.nombre FROM $this->table G
        INNER JOIN genero_subgenero GS ON G.id_genero = GS.id_genero
        WHERE 1+1 ".$sWhereStr." ORDER BY nombre ";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'GeneroEntity')->fetchAll();
        return $resultado;

    }

    public function generoSubgenero($id){
        
        $sql = "SELECT DISTINCT sg.id_subgenero, sg.nombre FROM subgenero sg INNER JOIN genero_subgenero gs ON sg.id_subgenero = gs.id_subgenero 
        WHERE gs.id_genero = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'SubGeneroEntity')->fetchAll();
        return $resultado;
    }

    public function save($datos = array(), $subGen = array()){

        $sql1 = "INSERT INTO $this->table(status,nombre) VALUES ('".$datos['status']."','".$datos['nombre']."')";
        $this->con->exec($sql1);
        $genID = $this->con->lastInsertId();

        $sql2 = "INSERT INTO genero_subgenero(id_genero, id_subgenero) VALUES (".$genID.", NULL)";
        $this->con->exec($sql2);
        
        if(!empty($subGen)){
            foreach($subGen as $gen) {
                $sql2 = "INSERT INTO genero_subgenero(id_genero, id_subgenero) VALUES ('".$genID."','".$gen."')";
                $this->con->exec($sql2);
            }
        }

    }

    public function modify($id, $datos=array()){
        
        $sql = "UPDATE $this->table SET nombre=? WHERE id_genero=?";
        $send = $this->con->prepare($sql);
        $send ->execute([$datos['nombre'],$id]);

        
        //***************************************************************************************************** */
        //***************************************************************************************************** */
        //***************************************************************************************************** */

        $sql = "SELECT id_subgenero FROM genero_subgenero WHERE id_genero = $id AND id_subgenero IS NOT NULL";
        $result=$this->con->query($sql,PDO::FETCH_ASSOC)->fetchAll(); 
        
        if(isset($datos['subgenero'])){
            foreach($datos['subgenero'] as $subgen){ //accion

                if(!in_array($subgen, array_column($result, 'id_subgenero')) ){
                    
                    $sql = "INSERT INTO genero_subgenero(id_genero, id_subgenero) VALUES ('".$id."','".$subgen."')";
                    $this->con->exec($sql); 
                    
                }  
            }

            $sql = "SELECT id_subgenero FROM genero_subgenero WHERE id_genero = $id AND id_subgenero IS NOT NULL";
            $result = $this->con->query($sql,PDO::FETCH_ASSOC)->fetchAll(); 
            
             foreach(array_column($result, 'id_subgenero') as $res){
             
                if(!in_array($res,$datos['subgenero'])){
                    
                        $sql = "SELECT id_genero_subgenero FROM genero_subgenero WHERE id_subgenero=".$res." AND id_genero = $id";
                        $result=$this->con->query($sql)->fetch();
                           
                        $sql = "DELETE FROM pelicula_genero WHERE id_genero_subgenero= ".$result['id_genero_subgenero'];
                        $this->con->exec($sql);
                        
                        $sql = "DELETE FROM genero_subgenero WHERE id_genero_subgenero=".$result['id_genero_subgenero'];
                        $this->con->exec($sql);
                    } 
             }
            
        } else{

            foreach(array_column($result, 'id_subgenero') as $res){ 
        
                $sql = "SELECT id_genero_subgenero FROM genero_subgenero WHERE id_subgenero=".$res." AND id_genero = $id";
                $result=$this->con->query($sql)->fetch();
                
                $sql = "DELETE FROM pelicula_genero WHERE id_genero_subgenero= ".$result['id_genero_subgenero'];
                $this->con->exec($sql);
                
                $sql = "DELETE FROM genero_subgenero WHERE id_genero_subgenero=".$result['id_genero_subgenero'];
                $this->con->exec($sql);
                
            }
        }   
     
        //***************************************************************************************************** */
        //***************************************************************************************************** */
        //***************************************************************************************************** */
        
    }

    public function delete($id){
        $sql1 = "DELETE FROM genero_subgenero WHERE id_genero = $id";
        $this->con->exec($sql1);
        $sql2 = "DELETE FROM $this->table WHERE id_$this->table = $id";
        $this->con->exec($sql2);
    }

    
    
}

?>