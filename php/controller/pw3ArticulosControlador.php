<?php
session_start();
require("../model/pw3ArticulosModelo");

$articulos = new ArticulosModelo();
//$matriz_articulos = $articulos->getArticulos();

if(isset($_POST['Articulo'])){   // Registro de articulos
    $nombreImagen = $_FILES['Imagen']['name'];
    $tipoImagen = $_FILES['Imagen']['type'];

    $carpetaDestino = "../../img/articulos/";
    $ImagenURL = $carpetaDestino. $nombreImagen;
    move_uploaded_file($_FILES['Imagen']['tmp_name'],$carpetaDestino);

    $IdUsuario = $_SESSION['id'];

    $articulos->Alta($_POST, $ImagenURL, $IdUsuario);

    
}




?>

