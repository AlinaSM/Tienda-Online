<?php 
    session_start();
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
        HeaderCompleto("../",$_SESSION);
       
        include('../php/view/pw3PerfilPrincipalView.php');        
        include('../estructura/pw3_footer.php');
    ?>

    <h1><?php echo "$nombre $apellido"; ?></h1>
</body>
</html>