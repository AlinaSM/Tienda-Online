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
        $consulta = $this->db->query("SELECT * FROM compra WHERE usuario_id='$id';");
        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }
        return $this->articulos;
    }

  
    
    public function getCompras(){
        $consulta = $this->db->query("SELECT * FROM articulos;");
        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }
        return $this->articulos;
    }

    public function Alta($monto, $IdUsuario, $IdArticulo){
        $consulta = "INSERT INTO compra( monto_total, fecha, usuario_id, id_articulo) VALUES ('$monto','". 
                    date("Y-m-d H:i:s") . "','$IdUsuario', '$IdArticulo');";
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