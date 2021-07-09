<?php 

require_once('GeneroEntity.php');

class SubGeneroEntity{
    
    private $id_subgenero;
    private $status;
    private $nombre;
    
    
    public function __construct(){

    }

    public function getID(){
        return $this->id_subgenero;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getNombre(){
        return $this->nombre;
    }

    public function setID(){
        $this->id_subgenero=$id_subgenero;
    }
    public function setStatus(){
        $this->status=$status;
    }
    public function setNombre(){
        $this->nombre=$nombre;
    }
    
    
}



?>