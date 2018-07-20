<?php 
    include('../estructura/pw3_head.php');
    include('../estructura/pw3_header.php');
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
        HeaderCompleto("../");
        include('../php/view/pw3PerfilPrincipalView.php');        
        include('../estructura/pw3_footer.php');
    ?>
</body>
</html>