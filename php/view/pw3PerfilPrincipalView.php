<?php

$id = $_SESSION['id'];
$nombre = $_SESSION['nombre'];
$apellido = $_SESSION['apellido'];
$email = $_SESSION['email'];
$direccion = $_SESSION['direccion'];

?>

<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Mi Perfil</h1>
    <p class="lead">Hola <?php echo " $nombre $apellido "; ?>!</p>
  </div>
</div>

<div class="container">
   <div class="row">

       <!-- Card para editar la configuracion del usuario -->
        <div class="col-sm-4 col-md-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Configuracion del Perfil</h5>
                <p class="card-text">Edita la configuración de tu perfil.</p>
                <a href="pw3EditarPerfil.php" class="btn btn-primary">Editar Perfil</a>
            </div>
            </div>
        </div>
        
        <!-- Card de las compras de un usuario -->
        <div class="col-sm-4 col-md-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mis Compras</h5>
                <p class="card-text">Registro de tus anteriores compras.</p>
                <a href="pw3MisCompras.php" class="btn btn-primary">Ver compras</a>
            </div>
            </div>
        </div>

        <!-- Card de las ventas del usuario  -->
        <div class="col-sm-4 col-md-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Mis Ventas</h5>
                <p class="card-text">Mira la informacion de todas tus ventas.</p>
                <a href="pw3MisVentas.php" class="btn btn-primary">Ver ventas</a>
            </div>
            </div>
        </div>

    </div>
</div>


</div>

<br>
<br>    