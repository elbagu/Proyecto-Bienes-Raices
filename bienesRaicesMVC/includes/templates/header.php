<?php

if (!isset($_SESSION)) {
    session_start();
}

$auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
    <title>Bienes Raices</title>
</head>
<body>
    <header class="header <?php echo $inicio ? 'inicio' : '';?>">
        <div class="contenedor contenido-header"> 
            <div class="barra">
                <a href="/bienesraices/index.php">
                    <img src="http://localhost:8080/bienesraices/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>

                <div class="mobile-menu">
                    <img src="http://localhost:8080/bienesraices/build/img/barras.svg" alt="menu responsive">
                </div>
                <div class="derecha">
                    <img src="http://localhost:8080/bienesraices/build/img/dark-mode.svg" alt="" class="dark-mode-boton">
                    <nav class="navegacion">
                        <a href=" ./nosotros.php">Nosotros</a>
                        <a href="  ./anuncios.php">Anuncios</a>
                        <a href="./blog.php">Blog</a>
                        <a href=" ./contacto.php">Contacto</a>
                        <?php if($auth) :?>
                        <a href=" ./cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif;?>
                    </nav>
                </div>
            </div>

            <?php 
            
            if($inicio){
                echo "<h1>Venta de Casas y Departamentos Exlusivos de Lujo</h1>";
            }
            ?>
        </div>
    </header>