<?php
require("../model/pw3UsuariosModelo.php");
$usuarios = new UsuarioModelo();

if(isset($_POST['inpRegistro']))
{
    $usuarios->Registro($_POST);
    header('Location: ../../index.php');
}
else if(isset($_POST['inpInicio']))
{
    $existe = $usuarios->ValidarInicio($_POST['Usuario'],$_POST['Contrasena']);

    if($existe){
        //Se inicia la sesion 
        session_start();
        $_SESSION['usuario'] = $_POST['Usuario'];
        $nom = $_SESSION['usuario'];

        $datos = $usuarios->getDatosUsuario($nom);
       
        $_SESSION['id']         = $datos['id'];
        $_SESSION['nombre']     = $datos['nombre'];
        $_SESSION['apellido']   = $datos['apellido'];
        $_SESSION['email']      = $datos['email'];
        $_SESSION['direccion']  = $datos['direccion'];

        //echo "".$_SESSION['id'] ."".$_SESSION['nombre'] ."".$_SESSION['apellido'] ."".$_SESSION['email'] ."".$_SESSION['direccion'] ."";

        //Inicio exitoso
        header('Location: ../../index.php');
    }else{
        echo "Fallo en el inicio";
    }
}
else if(isset($_GET['q']))
{
    $q = $_REQUEST['q'];

    if($q !== "" &&  !($usuarios->UsuarioDisponible($q))){
        //buscar si la cadena se parece
        echo "true";
    }else{
        echo "false";
    }
    
}

?>