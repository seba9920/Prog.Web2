<?php

require_once('../Models/IPEntity.php');

class IPDAO{
    private $con;
    private $table;

    function __construct($con)
    {
        $this->con = $con;
        $this->table = 'ip';
    }

    public function getAll(){

        $sql = "SELECT id_ip,id_usuario,nombre_usuario,ip,fecha,id_pelicula FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'IPEntity')->fetchAll();
        return $resultado;

    }

    public function save($datos = array()){

        $sql = "INSERT INTO $this->table (id_usuario,nombre_usuario,ip,fecha,id_pelicula)
                VALUES ('".$datos['id_usuario']."','".$datos['nombre_usuario']."','".$datos['ip']."',NOW(),'".$datos['id_pelicula']."')";
        $this->con->exec($sql);

    }
        
}

?>