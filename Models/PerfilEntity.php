<?php


class PerfilEntity {
    private $id_perfil;
    private $nombre;
    private $status;

 
    public function __construct(){
      
    }

    public function getID(){
        return $this->id_perfil;
    }

    public function setID($id_perfil){
        $this->id_perfil = $id_perfil;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getStatus(){
        return $this->status;
    }

    public function setStatus($status){
        $this->status = $status;
    }


  

}


?>