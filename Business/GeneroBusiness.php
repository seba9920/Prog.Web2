<?php

require_once('../DataAccess/GenerosDAO.php');

class GeneroBusiness {

    protected $GeneroDAO;

    function __construct($con){
        $this->GeneroDAO = new GeneroDAO($con);
    }

    public function getEntrada($id){
        $entradas = $this->GeneroDAO->getOne($id); 

        return $entradas;
    }
    
    public function getEntradas($where = array()){
        $entradas = $this->GeneroDAO->getAll($where); 

        return $entradas;
    }

    public function getMod($id,$datos = array()){
        $entradas = $this->GeneroDAO->modify($id, $datos); 

        return $entradas;
    }
    public function getDel($id){
        $entradas = $this->GeneroDAO->delete($id); 

        return $entradas;
    }
    public function Add($datos=array(), $subGen){
        $entradas = $this->GeneroDAO->save($datos,$subGen); 

        return $entradas;
    }

    public function Subgenero($id){
        $entradas = $this->GeneroDAO->generoSubgenero($id);

        return $entradas;
    }

    public function contar(){
        return $this->GeneroDAO->contar();
    }

    public function contarActivos(){
        return $this->GeneroDAO->contarActivos();
    }

    public function contarInactivos(){
        return $this->GeneroDAO->contarInactivos();
    }

    public function getEntradaIDPeli($id){
        $entradas = $this->GeneroDAO->getOneIDPeli($id); 

        return $entradas;
    }
    public function cambioStatus($id,$sta){
        $entradas = $this->GeneroDAO->cambioStatus($id,$sta); 

        return $entradas;
    }
    
    
}



?>