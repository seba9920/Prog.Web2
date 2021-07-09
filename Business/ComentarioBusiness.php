<?php

require_once('../DataAccess/ComentariosDAO.php');

class ComentarioBusiness {

    protected $ComentariosDAO;

    function __construct($con){
        $this->ComentariosDAO = new ComentariosDAO($con);
    }

    public function getEntrada($id){
        $entradas = $this->ComentariosDAO->getOne($id); 

        return $entradas;
    }
    
    public function getEntradas(){
        $entradas = $this->ComentariosDAO->getAll(); 

        return $entradas;
    }    

    public function getEntradaIDPeli($id){
        $entradas = $this->ComentariosDAO->getAllIDPeli($id); 

        return $entradas;
    }
    public function getEntradaIDUser($id){
        $entradas = $this->ComentariosDAO->getAllIDUser($id); 

        return $entradas;
    }
    public function getNombre($id){
        $entradas = $this->ComentariosDAO->getNombreUser($id);
        return $entradas;
    }
    public function getMod($id,$datos = array()){
        $entradas = $this->ComentariosDAO->modify($id, $datos); 

        return $entradas;
    }
    public function getAdd($datos = array()){
        $entradas = $this->ComentariosDAO->save($datos); 

        return $entradas;
    }

    public function getRating($id){
        $entradas = $this->ComentariosDAO->calRating($id); 

        return $entradas;
    }
    public function cambioStatus($id,$sta){
        $entradas = $this->ComentariosDAO->cambioStatus($id,$sta); 

        return $entradas;
    }
    public function cambioStatusPregunta($id,$sta){
        $entradas = $this->ComentariosDAO->cambioStatusPregunta($id,$sta); 

        return $entradas;
    }
    public function getDel($id){
        $entradas = $this->ComentariosDAO->delete($id); 

        return $entradas;
    }

    public function contar(){
        return $this->ComentariosDAO->contar();
    }

    public function contarActivos(){
        return $this->ComentariosDAO->contarActivos();
    }

    public function contarInactivos(){
        return $this->ComentariosDAO->contarInactivos();
    }

    public function getPreguntas(){
        return $this->ComentariosDAO->getPreguntas();
    }
    public function getPregunta($id){
        return $this->ComentariosDAO->getPregunta($id);
    }
    public function getModPregunta($id,$datos = array()){
        $entradas = $this->ComentariosDAO->modifyPregunta($id, $datos); 

        $entradas;
    }
    public function getAddPregunta($datos = array()){
        $entradas = $this->ComentariosDAO->savePregunta($datos); 

        $entradas;
    }
    public function getDelPregunta($id){
        $entradas = $this->ComentariosDAO->deletePregunta($id); 

        $entradas;
    }
}



?>