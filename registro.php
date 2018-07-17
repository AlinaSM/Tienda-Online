<?php 
    include('estructura/pw3_head.php');
    include('estructura/pw3_header.php');
?>

<!DOCTYPE html>
<html lang="es-MX">
<head>
    <?php    Head("");    ?>
    
</head>
<body>
    <?php HeaderLogin(""); ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Registro</h5>
                            <form class="form-signin" id="formularioRegistro" method="POST" action="php/controller/pw3UsuariosControlador.php">
                                <div class="form-label-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Nombre" required autofocus>
                                </div>

                                <div class="form-label-group">
                                    <label for="Apellidos">Apellidos</label>
                                    <input type="text" id="Apellidos" name="Apellidos" class="form-control" placeholder="Apellidos" >
                                </div>

                                <div class="form-label-group">
                                    <label for="Email">Correo Electronico</label>
                                    <input type="email" id="Email" name="Email"  class="form-control" placeholder="Correo Electronico"  >
                                </div>

                                <div class="form-label-group">
                                    <label for="Usuario">Nombre de Usuario</label>
                                    <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Dirección" >
                                </div>

                                <div class="form-label-group">
                                    <label for="Contrasena">Contraseña</label>
                                    <input type="password" id="Contrasena" name="Contrasena" class="form-control" placeholder="Contraseña" >
                                </div>

                                <div class="form-label-group">
                                    <label for="Direccion">Dirección</label>
                                    <input type="text" id="Direccion" name="Direccion" class="form-control" placeholder="Dirección" >
                                </div>

                                <input type="hidden" name="inpRegistro">

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="idBotonRegistro">Registrarse</button>
                                <hr class="my-4">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('estructura/pw3_footer.php'); ?>

    <!--<script src="js/acceso.js"></script>-->
</body>

</html>