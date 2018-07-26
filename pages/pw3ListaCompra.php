<?php 

error_reporting(E_ERROR | E_WARNING | E_PARSE);
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
require("../php/model/pw3ArticulosModelo.php");
require("../php/model/pw3CarritoModelo.php");

session_start();

$IdUsuario = $_SESSION['id'];
$ArregloArticulos = array();

$articulos = new ArticulosModelo();
$carrito = new CarritoModelo();

$Cantidad   = $_GET['Cantidad'];
$idArticulo = $_GET['id'];
$idCarrito = null;
$carritoUsuario = array();
$precio = 0.0;

if(isset($_GET['btnComprarArticulo'])){
    $ArregloArticulos = $articulos->getArticuloById($idArticulo);
}
else if(isset($_GET['btnAgregarCarrito']))
{
    
    $ArregloArticulos = $articulos->getArticuloById($idArticulo);

    if(!$carrito->UsuarioTieneCarrito($IdUsuario)){
        $carrito->Generar($IdUsuario);
    }

    $carritoUsuario = $carrito->getCarritoByUsuario($IdUsuario);

    foreach($carritoUsuario as $registro){
        $idCarrito = $registro['id'];
    }

    foreach($ArregloArticulos as $r){
        $precio = $r['precio_unitario'];
    }

    
}
$Subtotal = $Cantidad * $precio;
$carrito->AgregarArticuloCarrito($idArticulo, $idCarrito, $Cantidad, $Subtotal);
$total = 0;
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
                    

                    foreach($carrito->ArticulosEnCarrito($idCarrito) as $registroArticulos){
                       foreach($articulos->getArticuloById($registroArticulos['articulos_id']) as $registro){
                           include('../estructura/elementoLista.php');
                       }
                        
                        
                    }
                ?>
                <tr>
                        <th></th> <th></th> <th></th> <th></th><th><?php echo "Total: $ $total";?></th>
                    </tr>

            </table>
        </div>
    </div>
</div>

<?php
    include('../estructura/pw3_footer.php');
?>

</body>
</html>