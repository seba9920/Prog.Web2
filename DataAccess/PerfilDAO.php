<?php

require_once('DAO.php');
require_once('PermisosDAO.php');
require_once('../Models/PerfilEntity.php');
require_once('../Models/PermisosEntity.php');

class PerfilDAO extends DAO{

    protected $permisoDAO;

    public function __construct($con){
        $this->table = 'perfil';
        parent::__construct($con);
        $this->permisoDAO = new PermisosDAO($con);
    }


    public function getAll($where = array()){
        $sql = "SELECT id_perfil, status, nombre FROM $this->table "; 
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PerfilEntity')->fetchAll();
        return $resultado;

    }

    public function getAllByUser($userId){
        $sql = "SELECT P.id_perfil, P.nombre, status  
                FROM perfil P
                INNER JOIN usuario_perfil UP ON UP.id_perfil = P.id_perfil
                WHERE UP.id_usuario = ".$userId ;  
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PerfilEntity')->fetchAll();
        return $resultado;

    }

    public function PerfilPermisos($id){
        $sql = "SELECT permiso.id_permiso, permiso.nombre, permiso.code, permiso.module  
                FROM permiso
                INNER JOIN perfil_permiso ON perfil_permiso.id_permiso = permiso.id_permiso
                INNER JOIN perfil on perfil_permiso.id_perfil = perfil.id_perfil
                WHERE perfil.id_perfil = ".$id;  
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PermisosEntity')->fetchAll();
        return $resultado;

    }
    
    public function getOne($id){
            $sql = "SELECT id_perfil, nombre, status FROM $this->table WHERE id_perfil = ".$id;
            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PerfilEntity')->fetch();
            return $resultado;
    }

    public function save($datos = array(), $permisos = array()){
        
        $sql = "INSERT INTO $this->table (nombre, status) VALUES ('".$datos['nombre']."',1)";
        $this->con->exec($sql);

        $perfilID = $this->con->lastInsertId();

        if(!empty($permisos)){
            foreach($permisos as $per) {
                $sql2 = "INSERT INTO perfil_permiso(id_perfil, id_permiso) VALUES ('".$perfilID."','".$per."')";
                $this->con->exec($sql2);
            }
        }

    }

    public function modify($id, $datos=array()){
       
        $sql1 = "DELETE FROM perfil_permiso WHERE id_perfil = $id";
        $this->con->exec($sql1);

        foreach($datos as $permiso){
            $sql2 = "INSERT INTO perfil_permiso(id_perfil, id_permiso) VALUES ('".$id."','".$permiso."')";
                    $this->con->exec($sql2);
        }    
    }

    public function delete($id){

        $sql1 = "DELETE FROM perfil_permiso WHERE id_perfil = $id";
        $this->con->exec($sql1);
        
        $sql2 = "UPDATE usuario_perfil SET id_perfil = 1 WHERE id_perfil= $id";
        $this->con->exec($sql2);
        
        $sql3 =  "DELETE FROM $this->table WHERE id_perfil = $id";
        $this->con->exec($sql3);
      
    }
} 


?>