<?php
function Head($direccion){
    include($direccion.'estructura/pw3_favicon.php');
    include($direccion.'estructura/pw3_archivosBootstrap.php');
    

    echo '  <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="'.$direccion.'css/estilos.css">
            <title>Aperture: Encuentra la que quieres!</title>';
    
    ArchivosDeBootstrap($direccion);
    Favicon($direccion);
}
?>