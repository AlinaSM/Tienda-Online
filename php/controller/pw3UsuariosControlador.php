<?php

require('../../estructura/pw3NombreServidor.php');
require("../model/pw3UsuariosModelo.php");
$usuarios = new UsuarioModelo();

if(isset($_POST['inpRegistro']))
{
    if($usuarios->UsuarioDisponible($_POST['Usuario'])){
        header('Location: '.$nombreServidor.'/registro.php?op=fallo');
    }else{
        $usuarios->Registro($_POST);
        session_start();
        $_SESSION['usuario'] = $_POST['Usuario'];
        $nom = $_SESSION['usuario'];
        $datos = $usuarios->getDatosUsuario($nom);
        DatosSesion($_POST['Usuario'], $datos);
        header('Location: '.$nombreServidor.'/index.php');
        
    }
    
}else if(isset($_POST['EliminarCuenta'])){
    $usuarios->Eliminar($_SESSION['id']);
    session_destroy();
    header('Location: '.$nombreServidor.'/index.php');
}else if(isset($_POST['editarPerfil'])){
        $usuarios->Modificar($_POST, $_SESSION['id']);
        session_start();
        $_SESSION['usuario'] = $_POST['Usuario'];
        $nom = $_SESSION['usuario'];
        $datos = $usuarios->getDatosUsuario($nom);
        DatosSesion($_POST['Usuario'], $datos);
        header('Location: '.$nombreServidor.'/index.php');
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
        DatosSesion($_POST['Usuario'], $datos);

        header('Location: '.$nombreServidor.'/index.php');
    }else{
        
        header('Location: '.$nombreServidor.'/acceder.php?op=fallo');
        echo "Fallo en el inicio";
    }
}
else if(isset($_GET['q']))
{
    $q = $_REQUEST['q'];

    if($q !== "" &&  !($usuarios->UsuarioDisponible($q))){
        //buscar si la cadena se parece
        echo "Nombre valido";
    }else{
        echo "Ya existe el nombre";
    }
    
}



function DatosSesion($nom, $datos){
    
       
        $_SESSION['id']         = $datos['id'];
        $_SESSION['nombre']     = $datos['nombre'];
        $_SESSION['apellido']   = $datos['apellido'];
        $_SESSION['email']      = $datos['email'];
        $_SESSION['direccion']  = $datos['direccion'];
}

?>