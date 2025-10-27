<main class="contenedor seccion">
        <h1>Registrar Nuevo Vendedor</h1>

        <a href="../index.php" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
        <?php echo $error;?>
        </div>
        <?php endforeach;?>

        <form action="/vendedores/crear" class="formulario" method="POST">
        
        <?php  include 'formulario.php'?>
   
         <input type="submit" value="Registrar Vendedor" class="boton boton-verde">
        </form>    
    </main>