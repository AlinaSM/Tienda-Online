<?php 
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
require("../php/model/pw3ArticulosModelo.php");

session_start(); 

$articulos = new ArticulosModelo();

$ArregloArticulos = array();

if(isset($_GET['op'])){
    $opcion = $_GET['op'];
    switch($opcion){
        case 'art':
            //$ArregloArticulos = $articulos->getArticulosByNombre($_GET['b']);
        break;
    
        case 'tip':
            $ArregloArticulos = $articulos->getArticulosByTipo($_GET['b']);
        break;
    
    }
}


/*
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
}*/
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
        include('../php/view/pw3ArticulosEnVentaView.php');
        
    ?>




<div class="container my-5">

    <div class="row my-2">
        <h1>Departamento de <?php echo $_GET['b']; ?></h1>
    </div>

    <div class="row mx-4">
        <?php 
            foreach($ArregloArticulos as $registro){
                include('../estructura/item.php');
            }
        ?>
    </div>
</div>

<?php
    include('../estructura/pw3_footer.php');
?>
    
</body>
</html>