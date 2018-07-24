<?php 
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
session_start(); 

$TituloArticulo = $_GET['t'];
$Precio = $_GET['p'];
$MaxCantidad = $_GET['c'];
$IdArticulo = $_GET['i'];



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