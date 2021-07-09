<?php

require_once('DAO.php');
require_once('../Models/ComentarioEntity.php');
require_once('../Models/UsuarioEntity.php');
require_once('../Business/UserBusiness.php');

class ComentariosDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'comentario';
    }

    public function getOne($id){
        $sql = "SELECT id_comentario,status,fecha,rating,titulo,comentario, id_pelicula,id_usuario FROM $this->table WHERE id_comentario = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ComentarioEntity')->fetch();
        return $resultado;

    }

    public function getAll($where = array()){

        $sql = "SELECT id_comentario,status,fecha,rating,titulo,comentario, id_pelicula,id_usuario FROM $this->table";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ComentarioEntity')->fetchAll();
        return $resultado;

    }

        
    public function getAllIDUser($id){

        $sql = "SELECT * FROM $this->table WHERE status=1 AND id_usuario=".$id;
        return $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ComentarioEntity')->fetchAll();   

    }

    public function getNombreUser($id){

        $sql = "SELECT nombre, apellido FROM usuario WHERE id_usuario = $id";
        return $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'UsuarioEntity')->fetch();   

    }

    public function getAllIDPeli($id){

        $sql = "SELECT * FROM $this->table WHERE  id_pelicula=".$id;
        return $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'ComentarioEntity')->fetchAll();   

    }

    public function save($datos = array()){

        $sql = "INSERT INTO $this->table (status,rating,titulo,comentario, id_pelicula,id_usuario) 
        VALUES ('0','".$datos['rating']."','".$datos['titulo']."','".$datos['comentario']."'
        ,'".$datos['id_pelicula']."','".$datos['id_usuario']."')";
        return $this->con->exec($sql);

    }

    public function modify($id, $datos = array()){
        $sql = "UPDATE $this->table SET fecha= NOW(),rating='".$datos['rating']."'
        ,titulo='".$datos['titulo']."',comentario='".$datos['comentario']."',id_pelicula='".$datos['id_pelicula']."'
        ,id_usuario='".$datos['id_usuario']."' WHERE id_comentario = ".$id;
        
        return $this->con->exec($sql);

    }

    public function delete($id){
        $sql = "DELETE FROM $this->table WHERE id_$this->table = $id";
        return $this->con->exec($sql);
    }

    public function calRating($id){
        $sql = "SELECT ROUND(AVG(rating),1) AS rating FROM $this->table WHERE status=1 AND id_pelicula =".$id;
        return $this->con->query($sql,PDO::FETCH_CLASS,'ComentarioEntity')->fetch();
    }

    public function getPreguntas(){
        $sql = "SELECT * FROM campo_dinamico_comentario";
        return $this->con->query($sql,PDO::FETCH_ASSOC)->fetchAll();
    }
    public function getPregunta($id){
        $sql = "SELECT * FROM campo_dinamico_comentario WHERE id_campo_dinamico_comentario=".$id;
        return $this->con->query($sql,PDO::FETCH_ASSOC)->fetch();
    }
    public function cambioStatusPregunta($id,$sta){
        $sql = "UPDATE campo_dinamico_comentario SET status=$sta WHERE id_campo_dinamico_comentario = $id";
        $cont=$this->con->exec($sql);
    }
    public function modifyPregunta($id, $datos = array()){
        
        $sql = "UPDATE campo_dinamico_comentario SET pregunta = '".$datos['pregunta']."',detalle = '".$datos['detalle']."',tipo = '".$datos['tipo']."'
        ,status = '".$datos['status']."',obligatorio = '".$datos['obligatorio']."'  WHERE id_campo_dinamico_comentario = ".$id;
        
        return $this->con->exec($sql);

    }
    public function savePregunta($datos = array()){

        $sql = "INSERT INTO campo_dinamico_comentario (pregunta,detalle,tipo,status,obligatorio) 
        VALUES ('".$datos['pregunta']."','".$datos['detalle']."','".$datos['tipo']."'
        ,'".$datos['status']."','".$datos['obligatorio']."')";
        $this->con->exec($sql);

    }
    public function deletePregunta($id){
        $sql = "DELETE FROM campo_dinamico_comentario WHERE id_campo_dinamico_comentario = $id";
        $this->con->exec($sql);
    }
    
}

?>