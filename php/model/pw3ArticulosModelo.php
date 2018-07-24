<?php

class ArticulosModelo{

    private $db;
    private $articulos;

    public function __construct(){
        require_once("pw3Conectar.php");
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

    public function Alta($datos,$ImagenURL){
        $consulta = "INSERT INTO articulos (nombre, descripcion, precio_unitario, cantidad, estado, condicion,".
                    " fecha_publicacion, tipo_articulo, marca, modelo, imagen, usuario_id ) VALUES (':Articulo',".
                    " ':Descripcion', ':Precio', ':Cantidad', ':Estado', ':Condicion', ':Fecha', ':Tipo', ':Marca',".
                    " ':Modelo', ':ImagenURL', ':IdUsuario');";

        try{
            $resultado = $this->db->prepare($consulta);
            $resultado->execute(array(  ":Articulo"     => $datos['Articulo'],
                                        ":Descripcion"  => $datos['Descripcion'],
                                        ":Precio"       => $datos['Precio'],
                                        ":Cantidad"     => $datos['Cantidad'],
                                        ":Estado"       => "Disponible",
                                        ":Condicion"    => $datos['Condicion'],
                                        ":Fecha"        => date("Y-m-d H:i:s"),
                                        ":Tipo"         => $datos['Tipo'],
                                        ":Marca"        => $datos['Marca'],
                                        ":Modelo"       => $datos['Modelo'],
                                        ":ImagenURL"    => $ImagenURL,
                                        ":IdUsuario"    => $IdUsuario,
                                    ));

        }catch(PDOException $e){
            echo "Error: No se puedo dar de alta el articulo";
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