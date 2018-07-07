<?php

require_once("../model/pw3ArticulosModelo");
require_once("../view/pw3ArticulosVista");

$articulos = new ArticulosModelo();

$matriz_articulos = $articulos->getArticulos();

?>

