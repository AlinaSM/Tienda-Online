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
                                    ":nombre"     => $datos['Nombre'],
                                    ":apellido"   => $datos['Apellidos'],
                                    ":email"      => $datos['Email'],
                                    ":usuario"    => $datos['Usuario'],
                                    ":contrasena" => password_hash( $datos['Contrasena'], 
                                                                    PASSWORD_DEFAULT ),
                                    ":direccion"  => $datos['Direccion']
                                ));
      
    }


    public function ValidarInicio($usuario, $contrasena){
        $encontrado = false;
        $consulta = "SELECT id, username, contrasena FROM usuario WHERE tipo = 'user' AND username ='".$usuario."';";
        $resultado = $this->db->prepare($consulta);
        $resultado->execute();

        while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
            if(password_verify($contrasena, $registro['contrasena'])){
                $encontrado = true;
            }
        }

        return $encontrado;
    }


    public function UsuarioDisponible($nombreUsuario){
        $existe = false;
        $consulta = "SELECT username FROM usuario WHERE username =  '$nombreUsuario'";
        $resultado = $this->db->prepare($consulta);
        $resultado->execute();

        while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){
            if($registro['username'] == $nombreUsuario){
                $existe = true;
            }
        }
      return $existe;
    }



}


?>