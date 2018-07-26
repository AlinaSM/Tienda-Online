<?php
    class CarritoModelo{

        private $db;
        private $compras;
    
        public function __construct(){
            require_once("pw3Conectar.php");
            $this->db = Conectar::Conexion();
            $this->articulos = array();
        }
    
        
        public function getCarritoByUsuario($id){
            $consulta = $this->db->query("SELECT id, total_estimado, usuario_id FROM carrito WHERE usuario_id='$id';");
    
            while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
                $this->articulos[] = $tupla;
            }
    
            if(!$tupla){
                return $this->articulos;
            } 
        }


        public function UsuarioTieneCarrito($IdUsuario){
            $consulta = $this->db->query("SELECT * FROM carrito WHERE usuario_id='$IdUsuario';");
            
            while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
                return true;
            }
    
            if(!$tupla){
                return false;
            } 
        }
    

        public function Generar($IdUsuario){ //C
            $consulta = "INSERT INTO carrito ( usuario_id ) VALUES ('$IdUsuario');";
            
            try{
                    
                $this->db->query($consulta);
            }catch(PDOException $e){
                echo "Error: No se pudo generar el carrito, ERROR:". $e->getMessage();
            }
        }
        

        public function Eliminar($IdUsuario){  //D    
            $consulta = "DELETE FROM carrito WHERE usuario_id = '$IdUsuario'";
    
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


        public function AgregarArticuloCarrito($Usuario, $Carrito, $Cantidad, $Subtotal){ 
            $consulta = "INSERT INTO articulos_has_carrito (articulos_id, carrito_id, cantidad, subtotal)  VALUES ('$Usuario', '$Carrito', '$Cantidad', '$Subtotal');";
            
            try{
                $this->db->query($consulta);
            }catch(PDOException $e){
                echo "Error: al agregar el articulo.";
            }

        }

        public function ArticulosEnCarrito($IdCarrito){
            $consulta = "SELECT articulos_id, carrito_id, cantidad, subtotal FROM articulos_has_carrito WHERE carrito_id = '$IdCarrito';";
            $resultado = $this->db->query($consulta);

            while($tupla = $resultado->fetch(PDO::FETCH_ASSOC)){
                $this->articulos[] = $tupla;
            }

            return $this->articulos;
           
        }//

    
    }
?>