<?php 

class ClasificacionEntity{
    
    private $id_clasificacion;
    private $status;
    private $nombre;
    private $descripcion;

    public function __construct(){
    }

    public function getID(){
        return $this->id_clasificacion;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }

    public function setID(){
        $this->id_clasificacion=$id_clasificacion;
    }
    public function setStatus(){
        $this->status=$status;
    }
    public function setNombre(){
        $this->nombre=$nombre;
    }
    public function setDescripcion(){
        $this->descripcion=$descripcion;
    }
    
    
}



?>