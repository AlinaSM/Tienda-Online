<?php

function HeaderLogin($direccion){
    echo '  <header class="navbar  navbar-expand-lg  navbar-light " >
                <!-- Aqui va el logo de nuestra pagina -->
                <a class="navbar-brand " href="'.$direccion.'index.php">
                    <img class="logo-principal" src="'.$direccion.'img/icons/logo.png">
                </a>
            </header>
        ';
}


function HeaderCompleto($direccion, $sesion){
    
    echo '
    <header class="navbar  navbar-expand-lg  navbar-light" >

        <!-- Aqui va el logo de nuestra pagina -->
        <a class="navbar-brand" href="'.$direccion.'">
            <img class="logo-principal" src="'.$direccion.'img/icons/logo.png">
        </a>

        <!-- Esto es el recuadro del menu que sale al minimizar la pagina  -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Boton dropeable donde aparecen los diferentes tipos de articulos -->
        <div class="collapse  navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav  mr-auto  mt-2  mt-lg-0">
            
            <li class="nav-item  dropdown">
                <a class="nav-link  dropdown-toggle " href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>Departamentos</small>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="'.$direccion.'">Tecnologia</a>
                    <a class="dropdown-item" href="'.$direccion.'">Libros</a>
                    <a class="dropdown-item" href="'.$direccion.'">Instrumentos Musicales</a>
                </div>
            </li>
            
            <!-- Formulario del buscador del sitio web -->
            <li class="nav-item">
            <form class="form-inline  my-2  my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Articulo que desea...">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            </li>
            
            <!-- Boton dropeable de la informacion de los miembros -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <small>Conocenos</small>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="'.$direccion.'#nosotros">Nosotros</a>
                    <a class="dropdown-item" href="'.$direccion.'#mision">Mision</a>
                    <a class="dropdown-item" href="'.$direccion.'#vision">Vision</a>
                </div>
            </li>';
        
    //Evalua se hay una sesion iniciada, y muestra los botonos en cualquiera de los dos casos
    //<a type="button" class="btn btn-success btn-mrg-left" >Vender</a> 
     if(isset($_SESSION['usuario'])){
        echo '
            <li class="nav-item">
                
                <a class="nav-link" href="'.$direccion.'pages/pw3Perfil.php"><small>'.$_SESSION['nombre'].'</small></a>
            </li> 
            
            <li class="nav-item">
                <a class="nav-link" href="'.$direccion.'pages/pw3Venta.php"><small>Vender</small></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="'.$direccion.'cerrar_sesion.php"><small>Cerrar Sesion</small></a>
            </li>


            <!-- Boton del carrito de compras -->
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img class="hg-30px" src="'.$direccion.'img/icons/cart-shop.png">
                </a>
            </li>';
        
     }else{
        echo '
        <!-- Botones de inicio de sesion y de registro -->
        <li class="nav-item">
            <a class="nav-link" href="acceder.php">Iniciar Sesión</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="registro.php">Registrarse</a>
        </li>

        ';
     }


        echo '
            </ul>
        </div>
    </header>
    ';
}
?>

