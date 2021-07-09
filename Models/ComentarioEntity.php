<?php 

class ComentarioEntity{
    
    private $id_comentario;
    private $status;
    private $fecha;
    private $rating;
    private $titulo;
    private $comentario;
    private $id_pelicula;
    private $id_usuario;

    public function __construct(){

    }

    public function getIDComentario(){
        return $this->id_comentario;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getRating(){
        return $this->rating;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getComentario(){
        return $this->comentario;
    }
    public function getIDPelicula(){
        return $this->id_pelicula;
    }
    public function getIDUsuario(){
        return $this->id_usuario;
    }

    public function setIDComentario(){
        $this->id_comentario=$id_comentario;
    }
    public function setStatus(){
        $this->status=$status;
    }
    public function setFecha(){
        $this->fecha=$fecha;
    }
    public function setRating(){
        $this->rating=$rating;
    }
    public function setTitulo($titulo){
        $this->titulo=$titulo;
    }
    public function setComentario(){
        $this->comentario=$comentario;
    }
    public function setIDPelicula(){
        $this->id_pelicula=$id_pelicula;
    }
    public function setIDUsuario(){
        $this->id_usuario=$id_usuario;
    }

    


}



?>