<tbody>
    <tr>
      <td><img src="<?php echo $registro['imagen']; ?>"  height="100"></td>  
      <td> <?php echo $registro['nombre']; ?> </td> 
      <td> <?php echo $Cantidad; ?> </td> 
      <td> <?php echo "$ ".$registro['precio_unitario']; ?> </td> 
      <?php
          $Subtotal = $registro['precio_unitario'] * $Cantidad;
      ?>
      <td> <?php echo "$ $Subtotal"; ?>  </td>
    </tr>
</tbody>

<?php 
  $total += $Subtotal; 
?>