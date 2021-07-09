<?php

require_once('../DataAccess/DireccionDAO.php');

class DireccionBusiness {

    protected $DireccionDAO;

    function __construct($con){
        $this->DireccionDAO = new DireccionDAO($con);
    }

    public function getEntrada($id){
        $entradas = $this->DireccionDAO->getOne($id); 

        return $entradas;
    }
    
    public function getEntradas($where = array()){
        $entradas = $this->DireccionDAO->getAll($where); 

        return $entradas;
    }

    public function getMod($id,$datos = array()){
        $entradas = $this->DireccionDAO->modify($id, $datos); 

        return $entradas;
    }
    public function getDel($id){
        $entradas = $this->DireccionDAO->delete($id); 

        return $entradas;
    }
    public function Add($datos=array(), $subGen){
        $entradas = $this->DireccionDAO->save($datos,$subGen); 

        return $entradas;
    }    
    
}



?>