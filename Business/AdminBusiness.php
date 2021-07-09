<?php

require_once('../DataAccess/AdminDAO.php');

class AdminBusiness {

    protected $AdminDAO;

    function __construct($con){
        $this->AdminDAO = new AdminDAO($con);
    }
    
    public function getEntrada(){
        $entrada = $this->AdminDAO->getOne(); 

        return $entrada;
    }

    public function getEntradas($dato){
        $entradas = $this->AdminDAO->getAll($dato); 

        return $entradas;
    }

    public function contar(){
        return $this->AdminDAO->contarUsuarios();
    }

    public function contarActivos(){
        return $this->AdminDAO->contarUsuariosActivos();
    }

    public function contarInactivos(){
        return $this->AdminDAO->contarUsuariosInactivos();
    }
    public function cambioStatus($id,$sta){
        $entradas = $this->AdminDAO->cambioStatus($id,$sta); 

        return $entradas;
    }

}



?>