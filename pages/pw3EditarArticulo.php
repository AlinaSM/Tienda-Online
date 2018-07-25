<?php 
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
session_start(); 

require("../php/model/pw3ArticulosModelo.php");
$articulos = new ArticulosModelo();

$idUsuarioSesion = $_SESSION['id'];
$op = "Editar";

if(isset($_GET['i'])){
    $articulo       = $articulos->getArticuloById($_GET['i']);
    $TituloArticulo = $articulo['nombre'];
    $Marca          = $articulo['marca'];
    $Modelo         = $articulo['modelo'];
    $Tipo           = $articulo['tipo_articulo'];
    $Descripcion    = $articulo['descripcion'];
    $Precio         = $articulo['precio_unitario'];
    $MaxCantidad    = $articulo['cantidad'];
    $ImagenURL      = $articulo['imagen'];
    $Condicion      = $articulo['condicion'];
    $IdArticulo     = $_GET['i'];   
    $nuevo = "checked";
    $usado = "";
    
    if($Condicion == 'Usado'){
        $usado = 'checked';
        $nuevo = "";
    }else{
        $nuevo = "checked";
    $usado = "";
    }
    
}else{
    
    $TituloArticulo = "";
    $Marca          = "";
    $Modelo         = "";
    $Tipo           = "";
    $Descripcion    = "";
    $Precio         = "";
    $MaxCantidad    = "";
    $ImagenURL      = "";

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
        //include('../php/view/pw3DetalleArticuloView.php');
        include('../php/view/pw3VentaArticulosView.php');
        include('../estructura/pw3_footer.php');
    ?>
</body>
</html>