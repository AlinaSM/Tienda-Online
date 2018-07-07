<?php

require_once("../model/articulosModelo");
require_once("../view/articulosVista");

$articulos = new ArticulosModelo();

$matriz_articulos = $articulos->getArticulos();

?>