<?php 

class DireccionEntity{
    
    private $id_direccion;
    private $calle;
    private $altura;
    private $piso;
    private $dpto;
    private $barrio;

    public function __construct(){

    }

    public function getIDDireccion(){
        return $this->id_direccion;
    }
    public function getCalle(){
        return $this->calle;
    }
    public function getAltura(){
        return $this->altura;
    }
    public function getPiso(){
        return $this->piso;
    }
    public function getDpto(){
        return $this->dpto;
    }
    public function getBarrio(){
        return $this->barrio;
    }

    public function setIDDireccion(){
        $this->id_direccion=$id_direccion;
    }
    public function setCalle($calle){
        $this->calle=$calle;
    }
    public function setAltura($altura){
        $this->altura=$altura;
    }
    public function setPiso($piso){
        $this->piso=$piso;
    }
    public function setDpto($dpto){
        $this->dpto=$dpto;
    }
    public function setBarrio($barrio){
        $this->barrio=$barrio;
    }
    
}

?>