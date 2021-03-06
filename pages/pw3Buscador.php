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