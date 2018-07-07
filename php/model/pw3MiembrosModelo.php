<?php


class MiembrosModelo{

    private $db;
    private $miembros;

    public function __construct(){
        require_once("pw3Conectar.php");
        $this->$db = Conectar::Conexion();
        $this->$miembros = array();
    }

    
    public function getMiembros(){
        $consulta = $this->db->query("SELECT * FROM usuarios WHERE tipo = 'admin';");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->miembros[] = $tupla;
        }

        return $this->$miembros;
    }
    

}

?>