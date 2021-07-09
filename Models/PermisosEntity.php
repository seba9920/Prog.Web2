<?php

class PermisosEntity {

    private $id_permiso;
    private $nombre;
    private $code;
    private $module;

     
    public function getID(){
        return $this->id_permiso;
    } 

    public function setID($id_permiso){
        $this->id_permiso = $id_permiso;
    }
 
    
    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

  public function getCode(){
        return $this->code;
    }

    public function setCode($code){
        $this->code = $code;
    }

    public function getModule(){
        return $this->module;
    }

    public function setModule($module){
        $this->module = $module;
    }
}


?>