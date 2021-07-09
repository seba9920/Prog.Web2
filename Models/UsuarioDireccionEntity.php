
<?php 

require_once('DireccionEntity.php');
require_once('UsuarioEntity.php');

class UsuarioDireccionEntity {

    private $id_usuario_direccion;
    private $id_usuario;
    private $id_direccion;
    
    
    public function __construct(){
        
    }

    public function getIDUsuarioDireccion(){
        return $this->id_usuario_direccion;
    }
    public function getIDUsuario(){
        return $this->id_usuario;
    }
    public function getIDDireccion(){
        return $this->id_direccion;
    }
    

    public function setIDUsuarioDireccion(){
        $this->id_usuario_direccion=$id_usuario_direccion;
    }
    public function setIDUsuario(){
        $this->id_usuario=$id_usuario;
    }
    public function setIDDireccion(){
        $this->id_direccion=$id_direccion;
    }
    
}



?>