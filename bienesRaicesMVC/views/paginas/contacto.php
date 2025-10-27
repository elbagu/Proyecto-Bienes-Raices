<main class="contenedor seccion">
    <h1>Contacto</h1>


   <?php
         if($mensaje) { ?>
         <p class="alerta exito"><?php echo $mensaje ;?> </p> 
         <?php   } ?>

    <picture>
        <source srcset="build/img/destacada3.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen contacto">
    </picture>

    <h2>Llene el formulario de contacto</h2>

    <form action="/contacto" class="formulario" method="POST">
        <fieldset>
            <legend>Informacion Personal</legend>
            <label for="nombre">Nombre:</label>
            <input required type="text" name="contacto[nombre]" placeholder="Tu nombre" id="nombre">


            <label for="mensaje">Mensaje:</label>
            <textarea required name="contacto[mensaje]" id="mensaje"></textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion sobre la Proiedad</legend>
            <label for="opciones">Vende o Compra:</label>
            <select name="contacto[tipo]" id="opciones" required>
                <option value="" disabled selected> -- Seleccione --</option>
                <option value="Compra">Compra</option>
                <option value="Vende">Vende</option>
            </select>

            <label for="presupuesto">Precio o Presupuesto:</label>
            <input required type="number" name="contacto[precio]" placeholder="Tu Precio o Presupuesto para con la propiedad" id="presupuesto">
        </fieldset>

        <fieldset>
            <legend>Informacion sobre la Proiedad</legend>
            <p>Como desea ser Contactado:</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input required type="radio" name="contacto[contacto]" id="contactar-telefono" value="telefono">

                <label for="contactar-email">E-mail</label>
                <input required type="radio" name="contacto[contacto]" id="contactar-email" value="email">
            </div>

            <div id="contacto">

            </div>
        </fieldset>

        <input type="submit" value="enviar" class="boton-verde">
    </form>
</main>