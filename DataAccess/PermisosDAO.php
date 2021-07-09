<?php

require_once('DAO.php'); 
require_once('../Models/PermisosEntity.php');

class PermisosDAO extends DAO{

    
    public function __construct($con){
        $this->table = 'permiso';
        parent::__construct($con);
    }

    public function getOne($id){
        $sql = "SELECT id_permiso, nombre, code, module FROM $this->table WHERE id_permiso = ".$id;
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PermisosEntity')->fetch();
        
        return $resultado;
    }
   

    public function getAll($where = array()){
        $sql = "SELECT id_permiso, nombre, code, module FROM ".$this->table;
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PermisosEntity')->fetchAll();
        return $resultado;

    }

    public function getAllByPerfil($perfilId){
        $sql = "SELECT id_permiso, nombre, code, module  
                FROM permiso
                INNER JOIN perfil_permiso ON perfil_permiso.id_permiso = permiso.id_permiso
                WHERE id_perfil = ".$perfilId ;   
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PermisosEntity');
       
        return $resultado->fetchAll();

    }
    public function save($datos = array()){
        
        $sql = "INSERT INTO $this->table(nombre, code, module) VALUES ('".$datos['nombre']."','".$datos['code']."','".$datos['module']."')";
        $this->con->exec($sql);

    }

    public function modify($id, $datos=array()){
        
        $sql = "UPDATE $this->table SET nombre= ?,code=?,module=? WHERE id_permiso=?";
        $send = $this->con->prepare($sql);
        $send ->execute([$datos['nombre'],$datos['code'],$datos['module'],$id]);
        
    }

    public function delete($id){
        $sql = "DELETE FROM permiso WHERE id_permiso = $id";
        $this->con->exec($sql);
      
    }

}
?>