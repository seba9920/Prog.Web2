<?php

require_once('DAO.php');
require_once('../Models/PeliculaEntity.php');
require_once('../DataAccess/GenerosDAO.php');
require_once('../DataAccess/SubGenerosDAO.php');
require_once('../DataAccess/ComentariosDAO.php');

class PeliculasDAO extends DAO{


    function __construct($con)
    {
        parent::__construct($con);
        $this->table = 'pelicula';
    }

    public function getOne($id){
        
        
        $sql = "SELECT * FROM $this->table WHERE id_pelicula=".$id;
        $resultadopeli = $this->con->query($sql,PDO::FETCH_CLASS,'PeliculaEntity')->fetch();

        $sql = "SELECT nombre, detalle FROM campo_dinamico_pelicula WHERE id_pelicula = $id";
        $resultado = $this->con->query($sql,PDO::FETCH_ASSOC)->fetchAll();
        
        $sql = "SELECT PP.id_campo_dinamico_comentario, CDC.pregunta, CDC.detalle, CDC.tipo, CDC.status, CDC.obligatorio FROM pelicula_pregunta PP
        INNER JOIN campo_dinamico_comentario CDC ON PP.id_campo_dinamico_comentario = CDC.id_campo_dinamico_comentario
        WHERE PP.id_pelicula=".$id;
        $preg= $this->con->query($sql,PDO::FETCH_ASSOC)->fetchAll();

        $contenido= array('id' => $resultadopeli->getID(),
                          'status' => $resultadopeli->getStatus(),
                          'nombre' => $resultadopeli->getNombre(),
                          'precio' => $resultadopeli->getPrecio(),
                          'clasificacion' => $resultadopeli->getIDClasificacion(),
                          'duracion' => $resultadopeli->getDuracion(),
                          'anio' => $resultadopeli->getAnio(),
                          'directores' => $resultadopeli->getDirectores(),
                          'actores' => $resultadopeli->getActores(),
                          'descripcion' => $resultadopeli->getDescripcion(),
                          'campoDinamico' => $resultado,
                          'preguntas'=> $preg
                         );

        return $contenido;
    }

    public function getAll($where = array()){
        if(!empty($where)){

            $sWhere = array();
            $ord='';
            if(!empty($_GET['genero']) && !empty($_GET['subgenero']) ){
                $sWhere[]=' AND (GSG.id_genero ='.$where['genero'].' AND GSG.id_subgenero ='.$where['subgenero'].')'; 
            }else
            if(!empty($_GET['genero']) && empty($_GET['subgenero']) ){
                $sWhere[]=' AND GSG.id_genero ='.$where['genero'];
            }else
            if(!empty($_GET['subgenero']) && empty($_GET['genero'])){
                $sWhere[]=' AND GSG.id_subgenero ='.$where['subgenero'];
            }
            if(!empty($_GET['clasificacion'])){
                $sWhere[]=' AND P.id_clasificacion ='.$where['clasificacion'];
            }
            if(!empty($_GET['orden'])){
                if($_GET['orden']==1){
                    $ord=' ORDER BY P.nombre';
                }else if($_GET['orden']==2){
                    $ord=' ORDER BY P.nombre DESC';
                }else if($_GET['orden']==3){
                    $ord=' ORDER BY P.anio';
                }else if($_GET['orden']==4){
                    $ord=' ORDER BY P.anio DESC';
                }else if($_GET['orden']==5){
                    $ord=' ORDER BY rating DESC, P.nombre';
                }else if($_GET['orden']==6){
                    $ord=' ORDER BY rating, P.nombre';
                }
            }
            $sWhereStr='';
            if(!empty($sWhere)) { $sWhereStr=' '. implode(' ',$sWhere);
            }
                        
            $sql = "SELECT  P.id_pelicula,
                            P.status,
                            P.nombre,
                            P.precio,
                            P.id_clasificacion,
                            P.duracion,
                            P.anio,
                            P.directores,
                            P.actores,
                            P.descripcion,
                            AVG(C.rating) AS rating  
                            
                    FROM pelicula P
                    INNER JOIN pelicula_genero GP ON P.id_pelicula=GP.id_pelicula
                    INNER JOIN genero_subgenero GSG ON GP.id_genero_subgenero=GSG.id_genero_subgenero
                    INNER JOIN comentario C ON P.id_pelicula = C.id_pelicula 
                    WHERE 1+1 ".$sWhereStr.' GROUP BY  P.id_pelicula '.$ord;

            $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PeliculaEntity')->fetchAll();
        
            return $resultado;
        }else {
            $sql = "SELECT DISTINCT  P.id_pelicula,
                        P.status,
                        P.nombre,
                        P.precio,
                        P.id_clasificacion,
                        P.duracion,
                        P.anio,
                        P.directores,
                        P.actores,
                        P.descripcion                        
                        
                FROM pelicula P
                INNER JOIN pelicula_genero GP ON P.id_pelicula=GP.id_pelicula
                INNER JOIN genero_subgenero GSG ON GP.id_genero_subgenero=GSG.id_genero_subgenero";

        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PeliculaEntity')->fetchAll();
     
        return $resultado;
        }

    }

    public function save($datos = array()){

        $sql = "INSERT INTO $this->table(status,nombre,precio,id_clasificacion,duracion,anio,directores,actores,descripcion)
                 VALUES ('0','".$datos['nombre']."','".$datos['precio']."','".$datos['id_clasificacion']."','".$datos['duracion']."','".$datos['anio']."','".$datos['directores']."','".$datos['actores']."','".$datos['descripcion']."')";
        $this->con->exec($sql);
        $id = $this->con->lastInsertId();
       
        foreach($datos['generos'] as $gen){
            foreach($datos['subgeneros'] as $subgen){
                $sql = "SELECT id_genero_subgenero FROM genero_subgenero
                        WHERE (id_genero = ".$gen." AND id_subgenero = ".$subgen.") OR (id_genero = ".$gen." AND id_subgenero IS NULL)";
                $result=$this->con->query($sql)->fetch();
        
                $sql = "INSERT INTO pelicula_genero(id_pelicula,id_genero_subgenero) 
                        VALUES ('".$id."','".$result['id_genero_subgenero']."')";
                $this->con->exec($sql);
            }
        }
        return $id ;
    }
    public function camposDinamicos($id,$datos=array()){
       
        foreach($datos as $index=>$dat){
       
            if(isset($datos[$index])){
                
                $sql = "INSERT INTO campo_dinamico_pelicula(id_pelicula,nombre,detalle)
                VALUES ('".$id."','".$datos[$index]['nombre']."','".$datos[$index]['detalle']."')";
                $this->con->exec($sql);
            }
        }
    }

    public function modify($id, $datos = array()){
        $sql = "UPDATE $this->table SET 
                
                nombre ='".$datos['nombre']."',
                precio = '".$datos['precio']."',
                id_clasificacion = '".$datos['id_clasificacion']."',
                duracion = '".$datos['duracion']."',
                anio = '".$datos['anio']."',
                directores = '".$datos['directores']."',
                actores = '".$datos['actores']."',
                descripcion ='".$datos['descripcion']."' 
                    WHERE id_pelicula = ".$id;
        $this->con->exec($sql);

        $sql = 'DELETE FROM pelicula_genero WHERE id_pelicula='.$id;
        $this->con->exec($sql);
        
        foreach($datos['generos'] as $gen){
            foreach($datos['subgeneros'] as $subgen){
                $sql = "SELECT id_genero_subgenero FROM genero_subgenero
                        WHERE id_genero = ".$gen." AND id_subgenero = $subgen";
                $result=$this->con->query($sql)->fetch();
        
                $sql = "INSERT INTO pelicula_genero(id_pelicula,id_genero_subgenero) 
                        VALUES ('".$id."','".$result['id_genero_subgenero']."')";
                $this->con->exec($sql);

                $sql = "SELECT id_genero_subgenero FROM genero_subgenero
                WHERE id_genero = ".$gen." AND id_subgenero IS NULL";
                $result=$this->con->query($sql)->fetch();

                $sql = "INSERT INTO pelicula_genero(id_pelicula,id_genero_subgenero) 
                        VALUES ('".$id."','".$result['id_genero_subgenero']."')";
                $this->con->exec($sql);
            }
        }
        
        $sql = 'DELETE FROM campo_dinamico_pelicula WHERE id_pelicula='.$id;
        $this->con->exec($sql);


    }

    public function delete($id){
        $sql = "DELETE FROM comentario WHERE id_pelicula= $id";
        $this->con->exec($sql);

        $sql = "DELETE FROM pelicula_genero WHERE id_pelicula = $id";
        $this->con->exec($sql);

        $sql = "DELETE FROM pelicula WHERE id_pelicula = $id";
        return $this->con->exec($sql);
    }
    public function destacados(){
        $sql = "SELECT AVG(C.rating) AS rating,
                       P.id_pelicula,
                       P.status,
                       P.nombre,
                       P.precio,
                       P.id_clasificacion,
                       P.duracion,
                       P.anio,
                       P.directores,
                       P.actores,
                       P.descripcion
        FROM pelicula P
        INNER JOIN comentario C ON P.id_pelicula = C.id_pelicula
        WHERE  P.status = 1 
        GROUP BY P.id_pelicula
        ORDER BY 1 DESC, P.nombre
        LIMIT 10";
        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PeliculaEntity')->fetchAll();
        
        return $resultado;
      

    }

    public function getAllAnio($condicion){
        $sql = "SELECT  P.id_pelicula,
                        P.status,
                        P.nombre,
                        P.precio,
                        P.id_clasificacion,
                        P.duracion,
                        P.anio,
                        P.directores,
                        P.actores,
                        P.descripcion
                FROM pelicula P
                WHERE P.status = 1 AND P.anio =".$condicion;

        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PeliculaEntity')->fetchAll();
        
        return $resultado;
    }
    public function getUltimos(){
        $sql = "SELECT  P.id_pelicula,
                        P.status,
                        P.nombre,
                        P.precio,
                        P.id_clasificacion,
                        P.duracion,
                        P.anio,
                        P.directores,
                        P.actores,
                        P.descripcion
                FROM pelicula P
                ORDER BY 1 DESC
                LIMIT 10";

        $resultado = $this->con->query($sql,PDO::FETCH_CLASS,'PeliculaEntity')->fetchAll();
        
        return $resultado;


    }
    public function AddPreguntas($id,$datos=array()){
            $sql = "DELETE FROM pelicula_pregunta
                    WHERE id_pelicula=".$id;
            $this->con->exec($sql);
        
        foreach($datos as $dat){
            $sql = "INSERT INTO pelicula_pregunta(id_pelicula,id_campo_dinamico_comentario) 
                    VALUES ('".$id."','".$dat."')";
            $this->con->exec($sql);
        }
    }

    

    
    
}

?>