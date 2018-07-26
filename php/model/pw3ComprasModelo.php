<?php

class ComprasModelo{

    private $db;
    private $compras;

    public function __construct(){
        require_once("pw3Conectar.php");
        $this->db = Conectar::Conexion();
        $this->articulos = array();
    }

    
    public function getComprasByUsuarioId($id){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE usuario_id='$id';");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            return $tupla;
        }

        if(!$tupla){
            return false;
        } 
    }

    
    public function getArticulos(){
        $consulta = $this->db->query("SELECT * FROM articulos;");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }

        return $this->articulos;
    }


    public function Alta($datos, $IdUsuario){
        $consulta = "INSERT INTO compra( monto_total, fecha, usuario_id) VALUES ('". $datos[''] ."','". 
                    date("Y-m-d H:i:s") . "','$IdUsuario');";
        try{
            $this->db->query($consulta);
            echo "Articulo dado de alta";

        }catch(PDOException $e){
            echo "Error: No se puedo dar de alta la compra, ERROR:". $e->getMessage();
        }
    }


    public function Eliminar($id){      
        $consulta = "DELETE FROM compra WHERE id = '$id'";

        try{
            $this->db->query($consulta);

        }catch(PDOException $e){
            echo "Error: al eliminar el articulo.";
        }
    }
    

    public function Modificar($datos){
        $consulta = "";
        
        try{
            $this->db->query($consulta);
        }catch(PDOException $e){
            echo "Error: al modificar el articulo.";
        }
    }


}


?>