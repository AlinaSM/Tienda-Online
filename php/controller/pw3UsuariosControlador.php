<?php
require("../model/pw3UsuariosModelo.php");
$usuarios = new UsuarioModelo();

if(isset($_POST['inpRegistro'])){
    $usuarios->Registro($_POST);
}
else if(isset($_POST['inpInicio'])){
    $existe = $usuarios->ValidarInicio($_POST['Usuario'],$_POST['Contrasena']);

    if($existe){
        echo "Inicio exitoso";
    }else{
        echo "Fallo en el inicio";
    }
}else if(isset($_GET['q'])){
    $q = $_REQUEST['q'];

    if($q !== "" &&  !($usuarios->UsuarioDisponible($q))){
        //buscar si la cadena se parece
        echo "true";
    }else{
        echo "false";
    }
    
}

?>