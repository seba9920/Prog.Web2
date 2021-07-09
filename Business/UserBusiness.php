<?php

require_once('../DataAccess/UserDAO.php');

class UserBusiness {

    protected $UserDAO;

    function __construct($con){
        $this->UserDAO = new UserDAO($con);
    }
    
    public function getEntrada($id){
        $entradas = $this->UserDAO->getOne($id); 

        return $entradas;
    }

    public function getEntradas($where=array()){
        $entradas = $this->UserDAO->getAll($where); 

        return $entradas;
    }
    public function contar($dato){
        return $this->UserDAO->contarUsuarios($dato);
    }

    public function contarActivos($dato){
        return $this->UserDAO->contarUsuariosActivos($dato);
    }

    public function contarInactivos($dato){
        return $this->UserDAO->contarUsuariosInactivos($dato);
    }
    public function SessionUser($datos = array()){
        $entradas = $this->UserDAO->sessionUser($datos);
        return $entradas;
    }
    
    public function cambioStatus($id,$sta){
        $entradas = $this->UserDAO->cambioStatus($id,$sta); 

        return $entradas;
    }
    public function delete($id) {
        $entradas = $this->UserDAO->delete($id);

        $entradas;
    }
    public function Add($datos) {
        $entradas = $this->UserDAO->save($datos);

        $entradas;
    }
    public function getMod($id,$datos) {
        $entradas = $this->UserDAO->modify($id,$datos);

        $entradas;
    }
    

}



?>