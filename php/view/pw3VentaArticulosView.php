<script src="../js/validacion.js"></script>
<section class="mrg-60px100px">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-9">
            <h1 class="display-1">Articulo a vender</h1>
        </div>
        <div class="col-1"></div>
    </div>

    <br>

    <!--  -->
    <form action="../php/controller/pw3ArticulosControlador.php" name="frmVenta" id="frmVenta" method="POST" enctype="multipart/form-data"  >

        <div class="container">
            
            <div class="row">
                <div class="form-group col-4">
                    <label for="nombreArticulo">Titulo: </label>
                    <input type="text" name="Articulo" class="form-inline form-control" id="" required>
                </div>

                <div class="form-group col-4">
                    <label for="Marca">Marca: </label>
                    <input type="text" name="Marca" class="form-inline form-control" id="" required>
                </div>

                <div class="form-group col-4">
                    <label for="Modelo">Modelo: </label>
                    <input type="text" name="Modelo" class="form-inline form-control" id="" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-4">
                <?php
                    include('../estructura/pw3_TiposArticulos.php');
                ?>
                </div>

                <div class="form-group col-4">
                    <label for="Cantidad">Cantidad: </label>
                    <input type="number" name="Cantidad" class="form-inline form-control" id="">            
                </div>

                <div class="form-group col-4">
                    <label for="Precio">Precio: </label>
                    <input type="number" name="Precio" class="form-inline form-control" id="" required>
                </div>

            </div>

            <div class="row">

                <div class="form-group col-12">
                    <label for="Descripcion">Descripcion: </label>
                    <textarea name="Descripcion" id="" rows="5"  class="form-control" required></textarea>
                </div>

            </div>

            <div class="row">

                <div class="form-group col-6">
                    <label for="Condicion">Condicion: </label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Condicion"  value="Nuevo" checked required>
                        <label class="form-check-label" for="Condicion"> Nuevo </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="Condicion"  value="Usado"  required>
                        <label class="form-check-label" for="Condicion"> Usado </label>
                    </div>
                    
                </div>

            </div>

            <div class="row">
            
                <div class=" col-12">
                    <label for="Imagen">Imagen:</label>
                    <input type="file" name="Imagen" id="Imagen" lang="es"  required>
                    <div id="respuesta"></div>
                </div>
                
            </div>

            <!--<input type="hidden" name="IdUsuario" value="">-->

            
            <div class="form-group my-4">
                <input type="submit" value="Vender" class="btn btn-warning btn-block">
            </div>
        </div>
       
    </form>


   
</section>