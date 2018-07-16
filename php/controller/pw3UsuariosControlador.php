<?php
require("../model/pw3UsuariosModelo.php");

$usuarios = new UsuarioModelo();

$usuarios->Registro($_POST);

?>