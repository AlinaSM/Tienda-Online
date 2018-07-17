<?php
require("../model/pw3UsuariosModelo.php");
$usuarios = new UsuarioModelo();

if(isset($_POST['inpRegistro'])){
    $usuarios->Registro($_POST);
}else if(isset($_POST['inpInicio'])){
    $usuarios->ValidarInicio($_POST['Usuario'],$_POST['Contrasena']);
}

?>