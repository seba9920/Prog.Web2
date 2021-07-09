<?php 

class UsuarioEntity{
    
    private $id_usuario;
    private $status;
    private $nombre;
    private $apellido;
    private $fecha;
    private $fecha_nac;
    private $usuario;
    private $pass;
    private $email;
    private $telefono;
    private $pedidos;
    private $dinero_gastado;
 

    public function __construct(){

    }

    public function getIDUsuario(){
        return $this->id_usuario;
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
    public function getFechaNac(){
        return $this->fecha_nac;
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
    public function getTelefono(){
        return $this->telefono;
    }
    public function getPedidos(){
        return $this->pedidos;
    }
    public function getDineroGastado(){
        return $this->dinero_gastado;
    }
    
    public function setIDUsuario($id_usuario){
        $this->id_usuario=$id_usuario;
    }
    public function setStatus($status){
        $this->status=$status;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }
    public function setFechaNac($fecha_nac){
        $this->fecha_nac=$fecha_nac;
    }
    public function setUsuario($usuario){
        $this->usuario=$usuario;
    }
    public function setPass($pass){
        $this->pass=$pass;
    }
    public function setEmail($email){
        $this->email=$email;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function setPedidos($pedidos){
        $this->pedidos=$pedidos;
    }
    public function setDineroGastado($dinero_gastado){
        $this->dinero_gastado=$dinero_gastado;
    }
    

    
    


}



?>