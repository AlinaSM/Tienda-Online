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
                            <h5 class="card-title text-center">Inicio de Sesión</h5>
                            <form class="form-signin">

                                <div class="form-label-group">
                                    <label for="Usuario">Nombre de Usuario</label>
                                    <input type="text" id="Usuario" name="Usuario" class="form-control" placeholder="Nombre de Usuario" required>
                                </div>

                                <div class="form-label-group">
                                    <label for="Contrasena">Contraseña</label>
                                    <input type="password" id="Contrasena" name="Contrasena" class="form-control" placeholder="Contraseña" required>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" id="idBotonRegistro">Ingresar</button>
                                <hr class="my-4">

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('estructura/pw3_footer.php'); ?>
</body>

</html>