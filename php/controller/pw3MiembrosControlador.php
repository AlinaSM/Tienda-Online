<?php
require_once("../model/pw3MiembrosModelo");
require_once("../view/pw3MiembrosVista");

$miembros = new MiembrosModelo(); 
$matriz_miembros = $miembros->getMiembros();



?>
