<?php

class UsuarioModelo{

    private  $db;
    private $usuarios;

    public function __construct(){
        require_once("pw3Conectar.php");
        require_once("../controller/pw3FormatoControlador.php");
        $this->db = Conectar::Conexion();
        //$usuarios = array();
    }


    public function Registro($datos){
        
        $consulta = "INSERT INTO usuario(tipo,nombre,apellido,email,username,contrasena,direccion) 
        VALUES(:tipo, :nombre, :apellido, :email, :usuario, :contrasena,:direccion)";
        $resultado = $this->db->prepare($consulta);

        $resultado->execute(array(  ":tipo" => "user", 
                                    ":nombre"     => CodificarJSON($datos['Nombre']),
                                    ":apellido"   => CodificarJSON($datos['Apellidos']),
                                    ":email"      => CodificarJSON($datos['Email']),
                                    ":usuario"    => CodificarJSON($datos['Usuario']),
                                    ":contrasena" => password_hash( CodificarJSON( $datos['Contrasena']), PASSWORD_DEFAULT ),
                                    ":direccion"  => CodificarJSON($datos['Direccion'])
                                ));
      
    }


    public function ValidarInicio($datos){
        
    }

/*
    public function NombreUsuarioDisponible($nombreUsuario){
        
        $consulta = "SELECT username FROM usuario WHERE username =  '$nombreUsuario'";
        $resultado = $this->db->prepare($consulta);
        $resultado->execute();

        while($registros = $resultado->fetch(PDO::FETCH_ASSOC)){

        }
      
    }
*/


}


?>