<?php

require_once('../DataAccess/IPDAO.php');

class IPBusiness {

    protected $IPDAO;

    function __construct($con){
        $this->IPDAO = new IPDAO($con);
    }
    
    public function getEntradas(){
        $entradas = $this->IPDAO->getAll(); 

        return $entradas;
    }

    public function save($datos = array()){
        $entradas = $this->IPDAO->save($datos); 

        return $entradas;
    }

    
}



?>