<section class="mrg-60px100px">

    <div class="row">
        <div class="col-2"></div>
        <div class="col-9">
            <h1 class="display-1">Articulo a vender</h1>
        </div>
        <div class="col-1"></div>
    </div>

    <br>

    <form action="" method="POST" >

        <div class="container">
            
            <div class="row">
                <div class="form-group col-4">
                    <label for="nombreArticulo">Titulo: </label>
                    <input type="text" name="Articulo" class="form-inline form-control" id="">
                </div>

                <div class="form-group col-4">
                    <label for="Marca">Marca: </label>
                    <input type="text" name="Marca" class="form-inline form-control" id="">
                </div>

                <div class="form-group col-4">
                    <label for="Modelo">Modelo: </label>
                    <input type="text" name="Modelo" class="form-inline form-control" id="">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-4">
                <?php
                    include('estructura/pw3_TiposArticulos.php');
                ?>
                </div>

                <div class="form-group col-4">
                    <label for="Cantidad">Cantidad: </label>
                    <input type="text" name="Cantidad" class="form-inline form-control" id="">            
                </div>

                <div class="form-group col-4">
                    <label for="Precio">Precio: </label>
                    <input type="number" name="Precio" class="form-inline form-control" id="">
                </div>

            </div>

            <div class="form-group">
                
                <label for="Descripcion">Descripcion: </label>
                <!--<input type="text" name="Descripcion" class="form-inline form-control" id="">-->
                <textarea name="Descripcion" id="" rows="5" class="form-control" ></textarea>
            </div>

            <div class="form-group">
                <label for="Descripcion">Condicion: </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Condicion"  value="Nuevo" checked>
                    <label class="form-check-label" for="Condicion"> Nuevo </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="Condicion"  value="Usado">
                    <label class="form-check-label" for="Condicion"> Usado </label>
                </div>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Vender" class="btn btn-warning btn-block">
            </div>
        </div>
       
    </form>

</section>