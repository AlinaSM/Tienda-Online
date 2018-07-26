<div class="block  col-3 my-2 mx-4 border">
    <div class="product">
        <img src=" <?php echo $registro['imagen']; ?> " >
    </div>
    
    <div class="info">
        <h4><?php echo $registro['nombre']; ?></h4>
        <h5 class="price"><?php echo $registro['precio_unitario']; ?></h5>

        <?php if(isset($_GET['op'])): ?>
            <form name="item" action="../pages/pw3DetalleArticulo.php" method="GET">
                <input type="hidden" name="i" value="<?php echo $registro['id']; ?>">
                <input type="submit" class="btn btn-success" value="Ver">
                <button type="button" class="btn btn-success">Al Carrito</button>
            </form>
        <?php else: ?>
            <form name="item" action="../php/controller/pw3ArticulosControlador.php?i='.$id" method="post">
                <input type="hidden" name="i" value="<?php echo $registro['id']; ?>">
                <a type="button" class="btn btn-success" href=<?php echo "/Tienda-Online/pages/pw3EditarArticulo.php?i=".$registro['id']; ?> name="Editar"  >Editar</a>
                <input type="submit" class="btn btn-danger" name="Eliminar" value="Eliminar">
            </form>
        <?php endif; ?>

    </div>
</div>
