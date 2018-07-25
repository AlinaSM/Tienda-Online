<?php 
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
session_start(); 

require("../php/model/pw3ArticulosModelo.php");
$articulos = new ArticulosModelo();

$articulo = $articulos->getArticuloById($_GET['i']);

$TituloArticulo = $articulo['nombre'];
$Descripcion    = $articulo['descripcion'];
$Precio         = $articulo['precio_unitario'];
$MaxCantidad    = $articulo['cantidad'];
$ImagenURL      = $articulo['imagen'];
$IdArticulo     = $_GET['i']; 

$idUsuarioSesion = $_SESSION['id'];
$idUsuarioArticulo      = $articulo['usuario_id'];

if($idUsuarioSesion == $idUsuarioArticulo){
    $botonEstado = "disabled='disabled'";
}else{
    $botonEstado = "";
}
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <?php
        Head("../");
    ?>
</head>
<body>
    <?php
        HeaderCompleto("../",$_SESSION);
        include('../php/view/pw3DetalleArticuloView.php');
        include('../estructura/pw3_footer.php');
    ?>
</body>
</html>