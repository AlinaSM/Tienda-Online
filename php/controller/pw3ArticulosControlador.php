<?php
session_start();

require("../model/pw3ArticulosModelo.php");
require('../../estructura/pw3NombreServidor.php');


$articulos = new ArticulosModelo();

//Venta del articulo
if(isset($_POST['Articulo']) && !isset($_POST['btnCambios'])){   // Registro de articulos
    
    if( $ext = ValidarTipoImagen( $_FILES['Imagen']['type'] ) ){

        $RutaImagen = Imagen($_FILES, $ext, $nombreServidor);
        $IdUsuario = $_SESSION['id'];

        $articulos->Alta($_POST, $RutaImagen, $IdUsuario);
        //$registro = $articulos->getArticuloByNombre($_POST['Articulo']);
    foreach($articulos->getArticuloByNombre($_POST['Articulo']) as $registro){
        header('Location: '.$nombreServidor.'/pages/pw3DetalleArticulo.php?t='.$registro['nombre'].'&p='.$registro['precio_unitario'].'&c='.$registro['cantidad'].'&i='.$registro['id']);
    }

        
    }else{
        echo "Error: el tipo de archivo que trata de mandar no es valido. >:c";
    }

    
}
else if(isset($_POST['btnCambios'])) //Editar Articulo
{

    if($_FILES['Imagen']['name'] != null){
        
        if( $ext = ValidarTipoImagen( $_FILES['Imagen']['type'] ) ){

            $RutaImagen = Imagen($_FILES, $ext);
            $articulos->Modificar($_POST,$RutaImagen);
            
        }else{
           echo "Tipo de imagen no valida";
        }

    }else{
        $articulos->Modificar($_POST,null);
        
    }
    header("Location: $nombreServidor/pages/pw3EditarArticulo.php?i=".$_POST['idArticulo']);

}
else if(isset($_GET['btnBuscador']))
{
    $resultado = $articulos->Buscador($_GET['ky']);
}
else if(isset($_POST['Eliminar']))
{

    $articulos->Eliminar($_POST['i']);
    header('Location: '.$nombreServidor.'/pages/pw3MisVentas.php');

}


function Imagen( $ArchivoImagen, $ext, $nombreServidor ){
    $nombreImagen   = $ArchivoImagen['Imagen']['name'];
    $tipoImagen     = $ArchivoImagen['Imagen']['type'];

    $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/Tienda-Online/img/articulos/";
    $imagenGenerarNombre = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,10);
        
    $ImagenURL = $carpetaDestino . $imagenGenerarNombre . $ext;
    move_uploaded_file($ArchivoImagen['Imagen']['tmp_name'],$ImagenURL);

    $ImagenURL = "$nombreServidor/img/articulos/" . $imagenGenerarNombre . $ext;
    return $ImagenURL;
}


function ValidarTipoImagen($tipo){

    if($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
        return false;
    }else{

        switch($tipo){

            case 'image/jpg':
                $extencion = '.jpg';
            break;

            case 'image/jpeg':
                $extencion = '.jpeg';
            break;

            case 'image/png':
                $extencion = '.png';
            break;

            case 'image/gif':
                $extencion = '.gif';
            break;
        }
        return $extencion;
    }

}


?>

