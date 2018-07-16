<?php 
include('../estructura/pw3_head.php');
?>

<!DOCTYPE html>
<html lang="es-MX">
  <head>
      <?php
        Head("../");
      ?>
      <title>Aperture: Encuentra la que quieres!</title>
  </head>
  <body>
  
  <header>

  </header>
    <section class = "text-center">
      <form class= "form-signin" action="" method="POST" >
          <img class = "mb-4" src="../img/icons/logo.png" height = "72">
          <h1>Inicio de Sesión</h1>
          <label for="">Nombre de Usuario</label>
          <input type="text" name="txtUsuario" id="txtUsuario">
          <label for="">Contraseña</label>
          <input type="password" name="txtContrasena" id="txtContrasena">
      </form>
    </section>

  </body>
</html>