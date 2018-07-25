<label for="Tipo">Tipo: </label>
<select name = "Tipo" class="custom-select form-control">
    <?php if($Tipo != ""):?>
        <option value="$Tipo" ><?php echo $Tipo;?></option>
    <?php endif;?>
    <option value="Electronica">Electronica</option>
    <option value="Muebles">Muebles</option>
    <option value="Tecnologia">Tecnología</option>
    <option value="Herramientas">Herramientas</option>
    <option value="Ropa">Ropa</option>
    <option value="Deportes">Deportes</option>
    <option value="Vehiculos">Vehiculos</option>
</select>