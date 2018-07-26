<?php

class ArticulosModelo{

    private $db;
    private $articulos;
    private $articulosByTipo;
    private $articulosByNombre;

    public function __construct(){
        require_once("pw3Conectar.php");
        $this->db = Conectar::Conexion();
        $this->articulos = array();
        //$this->articulosByTipo = array();
        //$this->articulosByNombre = array();
    }

    
    public function getArticuloByNombre($nombre){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE nombre='$nombre';");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            return $tupla;
        }

        if(!$tupla){
            return false;
        } 
    }

    public function getArticuloById($id){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE id='$id';");

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

    public function getArticulosByTipo($tipo){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE tipo_articulo = '$tipo';");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }

        return $this->articulos;
    }

    public function getArticulosByNombre($nom){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE nombre like '$nom';");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }

        return $this->$articulos;
    }

    public function getArticulosByUsuario($IdUsuario){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE usuario_id = '$IdUsuario';");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }

        return $this->articulos;
    }
    

    public function Alta($datos, $ImagenURL, $IdUsuario){
        $consulta = "INSERT INTO articulos (`nombre`, `descripcion`, `precio_unitario`, `cantidad`, `estado`,".
        " `condicion`, `fecha_publicacion`, `tipo_articulo`, `marca`, `modelo`, `imagen`, `usuario_id`)".
        " VALUES ('".$datos['Articulo']."', '".$datos['Descripcion']."', '".$datos['Precio']."', '".$datos['Cantidad'].
        "', 'Disponible', '".$datos['Condicion']."', '".date("Y-m-d H:i:s")."', '".$datos['Tipo']."', '".$datos['Marca'].
        "', '".$datos['Modelo']."', '".$ImagenURL."', '".$IdUsuario."');";
       
        try{
            $this->db->query($consulta);
            echo "Articulo dado de alta";

        }catch(PDOException $e){
            echo "Error: No se puedo dar de alta el articulo, ERROR:". $e->getMessage();
        }
    }


    public function Eliminar($id){      
        $consulta = "DELETE FROM articulos WHERE id = '$id'";

        try{
            $this->db->query($consulta);

        }catch(PDOException $e){
            echo "Error: al eliminar el articulo.";
        }
    }
    
    public function Modificar($datos,$ImagenURL){
        if($ImagenURL != null){

            $consulta = " UPDATE articulos SET nombre = '".$datos['Articulo']."',  descripcion = '". $datos['Descripcion']."', ".
                        " precio_unitario = '".$datos['Precio']."', cantidad = '".$datos['Cantidad']."', estado = ':estado',".
                        " condicion = '".$datos['Condicion']."', tipo_articulo = '".$datos['Tipo']."', marca = '".$datos['Marca']."',".
                        " modelo = '".$datos['Modelo']."', imagen = '".$ImagenURL."'  WHERE id = '".$datos['idArticulo']."';";
                        
        }else{
            $consulta = " UPDATE articulos SET nombre = '".$datos['Articulo']."',  descripcion = '". $datos['Descripcion']."', ".
                    " precio_unitario = '".$datos['Precio']."', cantidad = '".$datos['Cantidad']."', estado = ':estado',".
                    " condicion = '".$datos['Condicion']."', tipo_articulo = '".$datos['Tipo']."', marca = '".$datos['Marca']."',".
                    " modelo = '".$datos['Modelo']."' WHERE id = '".$datos['idArticulo']."';";
        }

        
        try{
            $this->db->query($consulta);
        }catch(PDOException $e){
            echo "Error: al modificar el articulo.";
        }
    }

}


?>