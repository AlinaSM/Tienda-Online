<?php 
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
session_start(); 




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
        include('../php/view/pw3VentaArticulosView.php');
        include('../estructura/pw3_footer.php');
    ?>
</body>
</html>