<main class="contenedor seccion">
    <h1>Mas Sobre nosotros</h1>

    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Quaerat explicabo quia veniam quos, quas nam nostrum,
                culpa pariatur aliquam a perspiciatis, nobis nemo sequi
                Officiis eveniet doloribus ut facere.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Quaerat explicabo quia veniam quos, quas nam nostrum,
                culpa pariatur aliquam a perspiciatis, nobis nemo sequi
                Officiis eveniet doloribus ut facere.</p>
        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="Icono Tiempo" loading="lazy">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Quaerat explicabo quia veniam quos, quas nam nostrum,
                culpa pariatur aliquam a perspiciatis, nobis nemo sequi
                Officiis eveniet doloribus ut facere.</p>
        </div>
    </div>
</main>

<section class="seccion contenedor">
    <h2>Casas y Apartamentos en Venta</h2>

    <?php
    include 'listado.php';
    ?>
    <div class="alinear-derecha">
        <a href="/propiedades?id=<?php echo $propiedad['id']; ?>" class="boton-verde">Ver Todas</a>
    </div>
</section>

<section class="imagen-contacto">
    <h2>Encuentra la casa de tus Sueños</h2>
    <p>Llena el formulario de contacto y uno de nuestros asesores se contactara contigo</p>
    <a href="contacto.php" class="boton-amarillo">Contactanos</a>
</section>

<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>

        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="Imagen blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el:<span>20/3/2021</span> por:<span>Admin</span> </p>
                    <p>
                        Consejos para contruir una terraza en tu casa con buenos materiales y ahorrando dinero.
                    </p>

                </a>
            </div>
        </article>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="Imagen blog">
                </picture>
            </div>

            <div class="texto-entrada">
                <a href="entrada.php">
                    <h4>Guia para la decoracion de tu Hogar</h4>
                    <p class="informacion-meta">Escrito el:<span>20/3/2021</span> por:<span>Admin</span> </p>
                    <p>
                        Maximiza el espacio de tu hogar con estilo en esta guia, aprende a combinar muebles y colores para darle vida a tu hogar.
                    </p>

                </a>
            </div>
        </article>
    </section>

    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comporto de una exelente manera, muy buena atencion y la casa que me ofrecieron cummlpe con todas mis necesidades y
                espectativas.
            </blockquote>
            <p>- Ismael Bazzino -</p>
        </div>

    </section>
</div>