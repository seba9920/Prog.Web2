<?php 

class PeliculaEntity{
    
    private $id_pelicula;
    private $status;
    private $nombre;
    private $precio;
    private $id_clasificacion;
    private $duracion;
    private $anio;
    private $directores;
    private $actores;
    private $descripcion;
        
    private $genero;
    private $subgenero;
    private $comentarios; //array
    private $rating;
    
    public function __construct(){
        $this->genero=array();
        $this->subgenero=array();
        $this->comentarios=array();
 
    }

    
    public function getID(){
        return $this->id_pelicula;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getIDClasificacion(){
        return $this->id_clasificacion;
    }
    public function getDuracion(){
        return $this->duracion;
    }
    public function getAnio(){
        return $this->anio;
    }
    public function getDirectores(){
        return $this->directores;
    }
    public function getActores(){
        return $this->actores;
    }
    public function getDescripcion(){
        return $this->descripcion;
    }
    public function getGenero(){
        return $this->genero;
    }
    public function getSubGenero(){
        return $this->$subgenero;
    }
    public function getComentarios(){
        return $this->$comentarios;
    }
    public function getRating(){
        return $this->$rating;
    }


    public function setID($id_pelicula){
        $this->id_pelicula=$id_pelicula;
    }
    public function setStatus($status){
        $this->status=$status;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }
    public function setIDClasificacion($id_clasificacion){
        $this->id_clasificacion=$id_clasificacion;
    }
    public function setDuracion($duracion){
        $this->duracion=$duracion;
    }
    public function setAnio($anio){
        $this->anio=$anio;
    }
    public function setDirectores($directores){
        $this->directores=$directores;
    }
    public function setActores($actores){
        $this->actores=$actores;
    }
    public function setDescripcion($descripcion){
        $this->descripcion=$descripcion;
    }
    public function setGenero($genero){
        $this->genero=$genero;
    }
    public function setSubGenero($subgenero){
        $this->$subgenero=$subgenero;
    }
    public function setComentarios($comentarios){
        $this->$comentarios=$comentarios;
    }
    public function setRating($rating){
        $this->$rating=$rating;
    }


}

?>