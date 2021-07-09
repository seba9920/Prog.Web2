<?php

abstract class DAO{

    protected $con;
    protected $table;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public abstract function getOne($id);

    public abstract function getAll($where = array());
    
    public abstract function save($datos = array());

    public abstract function modify($id, $datos=array());

    public abstract function delete($id);

    public function contar(){
        $sql = "SELECT count(*) as total FROM $this->table ";
        $cont=$this->con->query($sql)->fetch();
        return $cont['total'];
    }

    public function contarActivos(){
        $sql = "SELECT count(*) as total FROM $this->table WHERE status=1";
        $cont=$this->con->query($sql)->fetch();
        return $cont['total'];
    }

    public function contarInactivos(){
        $sql = "SELECT count(*) as total FROM $this->table WHERE status=0";
        $cont=$this->con->query($sql)->fetch();
        return $cont['total'];
    }

    public function cambioStatus($id,$sta){
        $sql = "UPDATE $this->table SET status=$sta WHERE id_$this->table = $id";
        $cont=$this->con->exec($sql);
    }
    

}

?>