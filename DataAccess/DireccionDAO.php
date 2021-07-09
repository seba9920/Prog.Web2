<?php

require_once('DAO.php');
require_once('../Models/DireccionEntity.php');

class DireccionDAO extends DAO{
    

    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'direccion';
    }

    public function getOne($id){
        $sql = "SELECT D.id_direccion,D.calle,D.altura,D.piso,D.dpto,D.barrio FROM $this->table D
        INNER JOIN usuario_direccion UD ON D.id_direccion = UD.id_direccion
        INNER JOIN usuario U ON UD.id_usuario=U.id_usuario
        WHERE U.id_usuario = $id";
        return $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'DireccionEntity')->fetch();
         
        
    }
    public function getAll($where = array()){
        return "no sirvo para nada";
    }
    
    public function save($datos = array()){

        $sql = "INSERT INTO $this->table(calle, altura, piso, dpto, barrio)
        VALUES ('".$datos['calle']."','".$datos['altura']."','".$datos['piso']."','".$datos['dpto']."','".$datos['barrio']."') ";
        $this->con->exec($sql);

    }

    public function modify($id, $datos=array()){
        
        $sql = "UPDATE $this->table SET status= ?,nombre=? WHERE id_genero=?";
        $send = $this->con->prepare($sql);
        $send ->execute([$datos['status'],$datos['nombre'],$id]);
        
    }

    public function delete($id){
        $sql1 = "DELETE FROM genero_subgenero WHERE id_genero = $id";
        $this->con->exec($sql1);
        $sql2 = "DELETE FROM $this->table WHERE id_$this->table = $id";
        $this->con->exec($sql2);
    }

    
    
}

?>