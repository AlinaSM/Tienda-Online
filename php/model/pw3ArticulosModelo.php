<?php

class ArticulosModelo{

    private $db;
    private $articulos;

    public function __construct(){
        require_once("pw3Conectar.php");
        $this->db = Conectar::Conexion();
        $this->articulos = array();
    }

    
    public function getArticulos(){
        $consulta = $this->db->query("SELECT * FROM articulos;");

        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->articulos[] = $tupla;
        }

        return $this->$articulos;
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
        $consulta = "DELETE FROM articulos WHERE id = ':id'";

        try{
            $resultado = $this->db->prepare($consulta);
            $resultado->execute(array(  ":id" => $id ));

        }catch(PDOException $e){
            echo "Error: al eliminar al usuario.";
        }
    }
    
    public function Modificar($id, $datos){
        $consulta = "UPDATE articulos SET id =':id', nombre = ':nombre', descripcion = <{descripcion: No tiene Descripcion}>,
        `precio_unitario` = <{precio_unitario: }>,
        `cantidad` = <{cantidad: }>,
        `estado` = <{estado: Disponible}>,
        `condicion` = <{condicion: Nuevo}>,
        `fecha_publicacion` = <{fecha_publicacion: }>,
        `tipo_articulo` = <{tipo_articulo: }>,
        `marca` = <{marca: }>,
        `modelo` = <{modelo: }>,
        `imagen` = <{imagen: }>,
        `usuario_id` = <{usuario_id: }>
        WHERE `id` = <{expr}>;";
    }

}


?>