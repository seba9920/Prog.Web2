<?php

require_once('DAO.php');
require_once('../Models/AdminEntity.php');

class AdminDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'admin';
    }

    public function getOne($id){
        $sql = "SELECT id_admin,status,nombre,apellido,fecha, usuario, pass, email FROM $this->table WHERE id_admin = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'AdminEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){

        $sql = "SELECT id_admin,status,nombre,apellido,fecha, usuario, pass, email FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'AdminEntity')->fetchAll();
        return $resultado;

    }

    public function save($datos = array()){

        $sql = "INSERT INTO $this->table (status,nombre,apellido,fecha, usuario, pass, email)
                VALUES ('0','".$datos['nombre']."','".$datos['apellido']."','".$datos['fecha']."','".$datos['usuario']."','".$datos['pass']."','".$datos['email']."')";
        return $this->con->exec($sql);

    }

    public function modify($id, $datos = array()){
        $sql = "UPDATE $this->table SET status = '".$datos['status']."',nombre = '".$datos['nombre']."',apellido = '".$datos['apellido']."', fecha = NOW(), usuario = '".$datos['usuario']."',pass = '".$datos['pass']."',email = '".$datos['email']."' WHERE id_admin = ".$id;
        echo $sql;
        return $this->con->exec($sql);

    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id_$this->table = $id";
        return $this->con->exec($sql);
    }

    
}

?>