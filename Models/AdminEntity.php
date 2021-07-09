<?php 

class AdminEntity{
    
    private $id_admin;
    private $status;
    private $nombre;
    private $apellido;
    private $fecha;
    private $usuario;
    private $pass;
    private $email;

    public function __construct(){
        
    }

    public function getIDAdmin(){
        return $this->id_admin;
    }
    public function getStatus(){
        return $this->status;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function getUsuario(){
        return $this->usuario;
    }
    public function getPass(){
        return $this->pass;
    }
    public function getEmail(){
        return $this->email;
    }


    public function setIDAdmin(){
        $this->id_admin=$id_admin;
    }
    public function setStatus(){
        $this->status=$status;
    }
    public function setNombre(){
        $this->nombre=$nombre;
    }
    public function setApellido(){
        $this->apellido=$apellido;
    }
    public function setFecha(){
        $this->fecha=$fecha;
    }
    public function setUsuario(){
        $this->usuario=$usuario;
    }
    public function setPass(){
        $this->pass=$pass;
    }
    public function setEmail(){
        $this->email=$email;
    }

    


}



?>