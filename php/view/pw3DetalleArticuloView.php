<div class="container">

    <div class="row">
        <div class="col-6  my-5">
            <img src="<?php echo "..\img\articulos\Screenshot_3.jpg"; ?>" width ="450">
        </div>
        <div class="col-6  my-5  ">
            <div class="row  my-2">
                <h2>
                    <?php
                        echo "Titulo";
                    ?>
                </h2>
            </div>
            <div class="row">
                <p>
                    <?php
                        echo "Descripcion";
                    ?>
                </p>
            </div>
            <div class="row  my-2 ">
                <h4>$ 
                    <?php
                        echo "Precio";
                    ?>
                </h4>
            </div>
        
            <div class="row">
                <div class="col-3">
                    <label for="">Cantidad: </label>
                    <input type="number" class="form-control" min="1" max="<?php echo 9; ?>" name="" id="">
                </div>              
            </div>

            <div class="row">
                    <button type="button" id="" class="btn btn-success my-5">Comprar</button>
                    <button type="button" id="" class="btn btn-primary my-5 mx-3">Agregar a carrito</button>
                </div>
        </div>
    </div>

</div>