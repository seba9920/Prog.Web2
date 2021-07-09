<?php

require_once('../DataAccess/SubGenerosDAO.php');

class SubGeneroBusiness {

    protected $SubGeneroDAO;

    function __construct($con){
        $this-> SubGeneroDAO = new SubGeneroDAO($con);
    }

    public function getEntrada($id){
        $entradas = $this->SubGeneroDAO->getOne($id); 

        return $entradas;
    }
    
    public function getEntradas($where = array()){
        $entradas = $this->SubGeneroDAO->getAll($where); 

        return $entradas;
    }

    public function getMod($id,$datos = array()){
        $entradas = $this->SubGeneroDAO->modify($id, $datos); 

        return $entradas;
    }
    public function getDel($id){
        $entradas = $this->SubGeneroDAO->delete($id); 

        return $entradas;
    }
    public function Add($datos=array(), $generos = array()){
        $entradas = $this->SubGeneroDAO->save($datos,$generos); 

        return $entradas;
    }

    public function Genero($id){
        $entradas = $this->SubGeneroDAO->generoSubgenero($id);

        return $entradas;
    }

    public function contar(){
        return $this->SubGeneroDAO->contar();
    }

    public function contarActivos(){
        return $this->SubGeneroDAO->contarActivos();
    }

    public function contarInactivos(){
        return $this->SubGeneroDAO->contarInactivos();
    }

    public function getEntradaIDPeli($id){
        $entradas = $this->SubGeneroDAO->getOneIDPeli($id); 

        return $entradas;
    }
    public function cambioStatus($id,$sta){
        $entradas = $this->SubGeneroDAO->cambioStatus($id,$sta); 

        return $entradas;
    }
}



?>