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

    public function Alta($datos){
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
                                        ":ImagenURL"    => $datos['Articulo'], // <--- 
                                        ":IdUsuario"    => $datos['IdUsuario'],
                                    ));

        }catch(PDOException $e){
            echo "Error: No se puedo dar de alta el articulo";
        }


    }
    

}


?>