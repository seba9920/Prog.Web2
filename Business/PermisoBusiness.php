<?php

require_once('../DataAccess/PermisosDAO.php');

class PermisoBusiness{

    protected $PermisoDAO;

    function __construct($con){
        $this->PermisoDAO = new PermisosDAO($con);
    }

    public function getPermisos(){
        $permiso = $this->PermisoDAO->getAll(); 

        return $permiso;
    }

    public function getPermiso($id){
        $permiso = $this->PermisoDAO->getOne($id); 

        return $permiso;
    }

    public function getMod($id,$datos=array()){
        $permiso = $this->PermisoDAO->modify($id,$datos); 

        return $permiso;
    }
    public function getDel($id){
        $permiso = $this->PermisoDAO->delete($id); 

        return $permiso;
    }
    public function Add($datos=array()){
        $permiso = $this->PermisoDAO->save($datos); 

        return $permiso;
    }
    public function contar(){
        return $this->PermisoDAO->contar();
    }

    public function contarActivos(){
        return $this->PermisoDAO->contarActivos();
    }

    public function contarInactivos(){
        return $this->PermisoDAO->contarInactivos();
    }

    

    

}