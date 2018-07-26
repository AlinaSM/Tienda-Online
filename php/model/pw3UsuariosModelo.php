<?php

class UsuarioModelo{

    private  $db;
    private $usuarios;
    private $datos;

    public function __construct(){
        require_once("pw3Conectar.php");
        $this->db = Conectar::Conexion();
        $datos = array();
    }

    public function getDatosUsuario($dato){
        $consulta = $this->db->query("SELECT id, nombre , apellido, email, username, direccion FROM usuario WHERE username = '".$dato."';");
        
        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            //$this->datos[] = 
            return $tupla;
        }

        //return $this->datos;
    }


    public function getDatosUsuarioId($dato){
        $consulta = $this->db->query("SELECT id, nombre , apellido, email, username, direccion FROM usuario WHERE id = '".$dato."';");
        
        while($tupla = $consulta->fetch(PDO::FETCH_ASSOC)){
            //$this->datos[] = 
            return $tupla;
        }

        //return $this->datos;
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
        $consulta = "SELECT username, contrasena FROM usuario WHERE tipo = 'user' AND username ='".$usuario."' AND `status`='Disponible';";
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


    public function Eliminar($id){
        $consulta = "UPDATE usuario SET `status`='No Disponible' WHERE id='$id';";

        try{
            $this->db->query($consulta);
        }catch(PDOException $e){
            echo "Error: al eliminar al usuario.";
        }
    }


    public function Modificar($datos, $id){
        $email = $datos['Email'];
        $nombre = $datos['Nombre'];
        $apellido = $datos['Apellidos'];
        $dir = $datos['Direccion'];
        $user = $datos['Usuario'];

        $pass = password_hash( $datos['Contrasena'],  PASSWORD_DEFAULT );
        $consulta = "UPDATE usuario SET nombre ='$nombre',apellido ='$apellido',email='$email',username='$user'".
                    ",contrasena='$pass', direccion='$dir'  WHERE id ='".$id."';";
        echo $consulta;            
        try{
            $this->db->query($consulta);
        }catch(PDOException $e){
            echo "Error: al modificar los datos del usuario.";
        }
      
    }



}


?>