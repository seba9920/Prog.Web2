<?php

require_once('DAO.php');
require_once('../Models/ClasificacionEntity.php');

class ClasificacionDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'clasificacion';
    }

    public function getOne($id){
        $sql = "SELECT id_clasificacion,status,nombre,descripcion FROM $this->table WHERE id_clasificacion = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ClasificacionEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){
        $cate='';
        if(isset($_GET['clasificacion']) && !empty($_GET['clasificacion'])){
            $cate=' AND id_clasificacion != '.$_GET['clasificacion'].'';
        }

        $sql = "SELECT id_clasificacion,status,nombre,descripcion FROM $this->table WHERE 1+1 ".$cate;
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ClasificacionEntity')->fetchAll();
        return $resultado;

    }

    public function save($datos = array()){

        $sql = "INSERT INTO $this->table(status,nombre,descripcion)
                VALUES (0,'".$datos['nombre']."','".$datos['descripcion']."')";
        return $this->con->exec($sql);

    }

    public function modify($id, $datos = array()){
        $sql = "UPDATE $this->table SET nombre = '".$datos['nombre']."',descripcion = '".$datos['descripcion']."' WHERE id_clasificacion = ".$id;
        return $this->con->exec($sql);

    }
    
    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id_$this->table = $id";
        return $this->con->exec($sql);
    }

    
}

?>