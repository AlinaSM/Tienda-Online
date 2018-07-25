<?php
session_start();

require("../model/pw3ArticulosModelo.php");

$articulos = new ArticulosModelo();

if(isset($_POST['Articulo'])){   // Registro de articulos
    
    if( $ext = ValidarTipoImagen( $_FILES['Imagen']['type'] ) ){

        $nombreImagen = $_FILES['Imagen']['name'];
        $tipoImagen = $_FILES['Imagen']['type'];

        $carpetaDestino = $_SERVER['DOCUMENT_ROOT']."/Tienda-Online/img/articulos/";
        $imagenGenerarNombre = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0,10);
        
        $ImagenURL = $carpetaDestino . $imagenGenerarNombre . $ext;
        move_uploaded_file($_FILES['Imagen']['tmp_name'],$ImagenURL);

        $ImagenURL = "/Tienda-Online/img/articulos/" . $imagenGenerarNombre . $ext;
        
        $IdUsuario = $_SESSION['id'];

        $articulos->Alta($_POST, $ImagenURL, $IdUsuario);
        $registro = $articulos->getArticuloByNombre($_POST['Articulo']);
        header('Location: ../../pages/pw3DetalleArticulo.php?t='.$registro['nombre'].'&p='.$registro['precio_unitario'].'&c='.$registro['cantidad'].'&i='.$registro['id']);
        
    }else{
        echo "Error: el tipo de archivo que trata de mandar no es valido. >:c";
    }

    
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

