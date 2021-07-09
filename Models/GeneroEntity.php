<?php 

class GeneroEntity{
    
    private $id_genero;
    protected $status;
    protected $nombre;
    
    public function __construct(){
    
    }

    public function getID(){
        return $this->id_genero;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setID(){
        $this->id_genero=$id_genero;
    }
    public function setStatus(){
        $this->status=$status;
    }
    public function setNombre(){
        $this->nombre=$nombre;
    }
    
}



?>