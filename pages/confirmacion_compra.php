<?php 

error_reporting(E_ERROR | E_WARNING | E_PARSE);

include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
require("../php/model/pw3ArticulosModelo.php");


session_start();
$IdUsuario = $_SESSION['id'];

$articulos = new ArticulosModelo();

$Cantidad   = $_GET['Cantidad'];
$idArticulo = $_GET['id'];

$registro = $articulos->getArticuloById($idArticulo);

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
            <h1>Lista de Compras</h1>
        </div>

        <div class="table-responsive my-3">
                
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Imagen</th> <th>Articulo</th> <th>Cantidad</th> <th>Precio</th><th>Subtotal</th>
                    </tr>
                </thead>

                <div class="row mx-4">
                    <?php
                        include('../estructura/elementoLista.php');
                    ?>
                <tr>
                     <th></th> <th></th> <th></th> <th></th><th><?php echo "Total: $ $total";?></th>
                </tr>
                
            </table>
            <a  class="btn btn-primary btn-lg " href="../php/controller/pw3CompraControlador.php?ida=<?php echo "$idArticulo" ?>&cant=<?php echo "$Cantidad" ?>">Comprar Ahora</a>
        </div>
    </div>
</div>

<?php
    include('../estructura/pw3_footer.php');
?>

</body>
</html>
