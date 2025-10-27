<fieldset>
            <legend>Informacion General</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" name="propiedad[titulo]" id="titulo" placeholder="Titulo Propiedad" value="<?php echo s($propiedad->titulo);?>">

                <label for="precio">Precio:</label>
                <input type="number" name="propiedad[precio]" id="precio" placeholder="Precio Propiedad" value="<?php echo s($propiedad->precio);?>">

                <label for="imagen">Imagen:</label>
                <input type="file" name="propiedad[imagen]" id="imagen" accept="image/jpeg, image.png" >

                <?php if($propiedad->imagen){?>
                <img src=" ../../imagenes/<?php echo $propiedad->imagen?>" alt="" class="imagen-small">
                <?php }?>

                <label for="descripcion">Descripcion:</label>
                <textarea name="propiedad[descripcion]" id="descripcion" > <?php echo s($propiedad->descripcion);?></textarea>
        </fieldset>

        <fieldset>
        <legend>Informacion Propiedad</legend>

        <label for="habitaciones">Habitaciones:</label>
        <input type="number" name="propiedad[habitaciones]" id="habitaciones" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->habitaciones);?>">

        <label for="wc">Baños:</label>
        <input type="number" name="propiedad[wc]" id="wc" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->wc);?>">
        
        <label for="estacionamiento">Estacionamientos:</label>
        <input type="number" name="propiedad[estacionamiento]" id="estacionamiento" placeholder="EJ: 3" min="1" max="9" value="<?php echo s($propiedad->estacionamiento);?>">
        </fieldset> 

        <fieldset>
        <legend>Vendedor</legend>   
            <label for="vendedor">Vendedor:</label>
             <select name="propiedad[vendedorId]" id="vendedor">
                  <option disabled selected value=""> - Seleccione - </option>
                  <?php foreach($vendedores as $vendedor) {?>
                  <option 
                  <?php echo $propiedad->vendedorId === $vendedor->id ? 'selected' : '';?>
              value="<?php echo s($vendedor->id);?>"> <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido);?></option>
         <?php } ?>
        </select>
</fieldset>