<?php
session_start();
require("../model/pw3ArticulosModelo.php");
require("../model/pw3CompraModelo.php");
require('../../estructura/pw3NombreServidor.php');

$articulo = new ArticulosModelo();
$compras  = new ComprasModelo();

if( isset($_GET['ida']) && isset($_GET['cant']) ){
    $idArticulo = $_GET['ida'];

    $articulos = new ArticulosModelo();

    $articulo = $articulos->getArticuloById($idArticulo);
    $TituloArticulo = $articulo['nombre'];
    $Precio      = $articulo['precio_unitario'];
    $Cantidad    = $_GET['cant'];

    $compras->Alta($Cantidad * $Precio, $_SESSION['id'],$idArticulo);
    $articulos->RestarUnidades($articulo['cantidad'] - $Cantidad, $idArticulo);
    header('Location: '.$nombreServidor.'/index.php');
}

?>