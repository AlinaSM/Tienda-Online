<?php

class UsuarioModelo{

    private  $db;
    private $usuarios;

    public function __construct(){
        require_once("pw3Conectar.php");
        $this->db = Conectar::Conexion();
        $datos = array();
    }

    public function getDatosUsuario($dato){
        $consulta = $this->db->query("SELECT * FROM articulos WHERE username = '".$dato['']."';");
        
        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            $this->datos[] = $tupla;
        }

        return $this->$datos;
    }


    public function Registro($datos){
        $consulta = "INSERT INTO usuario(tipo,nombre,apellido,email,username,contrasena,direccion) 
                     VALUES(:tipo, :nombre, :apellido, :email, :usuario, :contrasena,:direccion)";
        
        try{
            $resultado = $this->db->prepare($consulta);

            $resultado->execute(array(  ":tipo" => "user", 
                                        ":nombre"     => $datos['Nombre'],
                                        ":apellido"   => $datos['Apellidos'],
                                        ":email"      => $datos['Email'],
                                        ":usuario"    => $datos['Usuario'],
                                        ":contrasena" => password_hash( $datos['Contrasena'],  PASSWORD_DEFAULT ),
                                        ":direccion"  => $datos['Direccion']
                                    ));
        }catch(PDOException $e){
            echo "Error: El nombre de usuario ya esta ocupado";
        }
      
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


    public function Eliminar($nombreUsuario){
        $consulta = "DELETE FROM usuario WHERE username = ':username'";

        try{
            $resultado = $this->db->prepare($consulta);
            $resultado->execute(array(  ":username" => $nombreUsuario ));

        }catch(PDOException $e){
            echo "Error: al eliminar al usuario.";
        }
    }

    


}


?>