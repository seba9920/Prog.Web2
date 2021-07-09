<?php

require_once('../DataAccess/ClasificacionDAO.php');

class ClasificacionBusiness {

    protected $ClasificacionDAO;

    function __construct($con){
        $this->ClasificacionDAO = new ClasificacionDAO($con);
    }
    public function getEntrada($id){
        $entradas = $this->ClasificacionDAO->getOne($id); 

        return $entradas;
    }

    public function getEntradas($where = array()){
        $entradas = $this->ClasificacionDAO->getAll($where); 

        return $entradas;
    }
    public function getMod($id, $datos){
        $entradas = $this->ClasificacionDAO->modify($id, $datos); 

        return $entradas;
    }
    public function getDel(){
        $entradas = $this->ClasificacionDAO->delete($_GET["del"]); 

        return $entradas;
    }
    public function contar(){
        return $this->ClasificacionDAO->contar();
    }

    public function contarActivos(){
        return $this->ClasificacionDAO->contarActivos();
    }

    public function contarInactivos(){
        return $this->ClasificacionDAO->contarInactivos();
    }

    public function Add($datos = array()) {
        return $this->ClasificacionDAO->save($datos);
    }
    public function cambioStatus($id,$sta){
        $entradas = $this->ClasificacionDAO->cambioStatus($id,$sta); 

        return $entradas;
    }

}



?>