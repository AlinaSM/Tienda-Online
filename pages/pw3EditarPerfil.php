<?php 
session_start();
include('../estructura/pw3_head.php');
include('../estructura/pw3_header.php');
require("../php/model/pw3UsuariosModelo.php");

$usuarios = new UsuarioModelo();

$datos = $usuarios->getDatosUsuarioId($_SESSION['id']);



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
    ?>
<section>
        <div class="container">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                        <div class="card-body">
                            <h5 class="card-title text-center">Editar datos</h5>
                            <form class="form-signin" id="formularioRegistro" autocomplete="off" method="POST" action="../php/controller/pw3UsuariosControlador.php">
                                <div class="form-label-group">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="Nombre" name="Nombre" class="form-control" placeholder="Nombre" value="<?php echo $datos['nombre']; ?>" required autofocus>
                                </div>

                                <div class="form-label-group">
                                    <label for="Apellidos">Apellidos</label>
                                    <input type="text" id="Apellidos" name="Apellidos" class="form-control" placeholder="Apellidos" value="<?php echo $datos['apellido']; ?>">
                                </div>

                                <div class="form-label-group">
                                    <label for="Email">Correo Electronico</label>
                                    <input type="email" id="Email" name="Email"  class="form-control" placeholder="Correo Electronico"  value="<?php echo $datos['email']; ?>">
                                </div>

                                <div class="form-label-group">
                                    <label for="Usuario">Nombre de Usuario</label>
                                    <input type="text" id="Usuario" name="Usuario" class="form-control"  onkeyup ="validarNombreUsuario(this.value)" value="<?php echo $datos['username']; ?>" placeholder="Nombre de Usuario"  >
                                    
                                        <?php if(isset($_GET['op']) && $_GET['op'] == 'fallo'): ?>
                                            <div class="alert alert-danger  text-center  my-3" role="alert">
                                                El nombre de usuario ya esta ocupado, <br> favor de intentarlo con otro
                                            </div>
                                        <?php endif;?>

                                </div>

                                <div class="form-label-group">
                                    <label for="Contrasena">Contraseña</label>
                                    <input type="password" id="Contrasena" name="Contrasena" class="form-control" placeholder="Contraseña" >
                                </div>

                                <div class="form-label-group">
                                    <label for="Direccion">Dirección</label>
                                    <input type="text" id="Direccion" name="Direccion" class="form-control" placeholder="Dirección" value="<?php echo $datos['direccion']; ?>">
                                </div>

                                <input type="hidden" name="editarPerfil">
                                
                                
                                <input class="btn btn-lg btn-primary btn-block text-uppercase  my-2"  type="submit"  value="Editar">
                                
                                <hr class="my-4">

                            </form>

                            <form action="../php/controller/pw3UsuariosControlador.php" method="post">
                            <input type="hidden" name="EliminarCuenta">
                                <input class="btn btn-lg btn-primary  btn-danger btn-block text-uppercase  my-2" value="Eliminar Cuenta" type="submit" >
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include('../estructura/pw3_footer.php'); ?>
</body>
</html>