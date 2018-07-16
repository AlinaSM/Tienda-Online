<?php
function CodificarJSON($cadenaJSON){
    $cadena = json_encode($cadenaJSON);
    $cadenaNueva = substr($cadenaJSON, 0, strlen($cadena));
    return $cadenaNueva; 
}
?>