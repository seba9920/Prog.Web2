<?php 

class IPEntity{
    
    private $id_ip;
    private $id_usuario;
    private $nombre_usuario;
    private $ip;
    private $fecha;
    private $id_pelicula;
    

    public function __construct(){
        
    }

    public function getIDIP(){
        return $this->id_ip;
    }
    public function getIDUsuario(){
        return $this->id_usuario;
    }
    public function getNombreUsuario(){
        return $this->nombre_usuario;
    }
    public function getIP(){
        return $this->ip;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getIDPelicula(){
        return $this->id_pelicula;
    }

    public function setIDIP(){
        $this->id_ip=$id_ip;
    }
    public function setIDUsuario(){
        $this->id_usuario=$id_usuario;
    }
    public function setNombreUsuario(){
        $this->nombre_usuario=$nombre_usuario;
    }
    public function setIP(){
        $this->ip=$ip;
    }
    public function setFecha(){
        $this->fecha=$fecha;
    }
    public function setIDPelicula(){
        $this->id_pelicula=$id_pelicula;
    }

}

?>