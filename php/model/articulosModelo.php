<?php

class ArticulosModelo{

    private $db;
    private $articulos;

    public function __construct(){
        require_once("conectar.php");
        $this->$db = Conectar::Conexion();
        $this->$articulos = array();
    }

    
    public function getArticulos(){
        $consulta = $this->db->query("SELECT * FROM articulos;");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }

        return $this->$articulos;
    }
    

}


?>