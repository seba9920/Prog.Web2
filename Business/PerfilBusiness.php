<?php

require_once('../DataAccess/PerfilDAO.php');

class PerfilBusiness{

    protected $PerfilDAO;

    function __construct($con){
        $this->PerfilDAO = new PerfilDAO($con);
    }

    public function getPerfiles(){
        $perfil = $this->PerfilDAO->getAll(); 

        return $perfil;
    }

    public function getPerfil($id){
        $perfil = $this->PerfilDAO->getOne($id); 

        return $perfil;
    }

    public function getMod($id,$datos=array()){
        $perfil = $this->PerfilDAO->modify($id,$datos); 

        return $perfil;
    }
    public function getDel($id){
        $perfil = $this->PerfilDAO->delete($id); 

        return $perfil;
    }
    public function Add($datos=array(), $permisos = array()){
        $perfil = $this->PerfilDAO->save($datos,$permisos); 

        return $perfil;
    }
    public function contar(){
        return $this->PerfilDAO->contar();
    }

    public function contarActivos(){
        return $this->PerfilDAO->contarActivos();
    }

    public function contarInactivos(){
        return $this->PerfilDAO->contarInactivos();
    }

    public function PerfilPermisos($id){
        $perfil = $this->PerfilDAO->PerfilPermisos($id); 

        return $perfil;
    }
    public function getPerfilUsuario($id){
        $perfil = $this->PerfilDAO->getAllByUser($id); 

        return $perfil;
    }
    public function cambioStatus($id,$sta){
        $entradas = $this->PerfilDAO->cambioStatus($id,$sta); 

        return $entradas;
    }

    

}