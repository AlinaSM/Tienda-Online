<?php 
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
require("../php/model/pw3CompraModelo.php");

session_start(); 

$compras = new ComprasModelo();
$mis_compras = array();

$mis_compras = $compras->getComprasByUsuarioId($_SESSION['id']);
 
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
    ?>

<div class="container my-5">

    <div class="row my-2">
        <h1>Mis Compras</h1>
    </div>
    <div class="table-responsive my-3">
                
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Fecha</th> <th>Monto</th> <th>Codigo Articulo</th>
                    </tr>
                </thead>
        <div class="row mx-4">
        <?php 
            foreach($mis_compras as $registro){
                include('../estructura/ListaCompras.php');
            }
        ?>
      
                
            </table>
    </div>
</div>

<?php
    include('../estructura/pw3_footer.php');
?>
    
</body>
</html>