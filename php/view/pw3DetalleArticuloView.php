<div class="container">

    <div class="row">
        <div class="col-6  my-5">
            <img src="<?php echo $ImagenURL ?>" width ="450">
        </div>
        <div class="col-6  my-5  ">
            <div class="row  my-2">
                <h2>
                    <?php
                        echo $TituloArticulo;
                    ?>
                </h2>
            </div>
            <div class="row">
                <p>
                    <?php
                        echo $Descripcion;
                    ?>
                </p>
            </div>
            <div class="row  my-2 ">
                <h4>$ 
                    <?php
                        echo $Precio;
                    ?>
                </h4>
            </div>
        
            <div class="row  border-left-0">
                <div class="col-3">
                    <label for="">Cantidad: </label>
                    <input type="number" class="form-control" min="1" max="<?php echo $MaxCantidad; ?>" value="1" name="" id="">
                </div>              
            </div>

            <input type="hidden" name="id" value="<?php echo $IdArticulo; ?>">

            <div class="row">
                    <button type="button" id="" class="btn btn-success my-5"  <?php echo $botonEstado; ?>  >Comprar</button>
                    <button type="button" id="" class="btn btn-primary my-5 mx-3"  <?php echo $botonEstado; ?> >Agregar a carrito</button>
                </div>
        </div>
    </div>

</div>