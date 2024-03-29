<?php

require 'includes/app.php';

    incluirTemplate('header', $start = true);
?>

<main class="container section">
    <h1>Más Sobre Nosotros</h1>
    <div class="icon-we">
        <div class="icon">
            <img src="build/img/icono1.svg" alt="segurity" loading="lazy">
            <h3>Seguridad</h3>
            <p>Pariatur laboris ipsum tempor non sunt id id ex.
                Aute quis elit in ea ad veniam velit dolore sunt nisi.
                Ut laboris duis velit excepteur eu in eu anim non tempor.
                Incididunt sit sunt eiusmod qui.</p>

        </div>

        <div class="icon">
            <img src="build/img/icono2.svg" alt="price" loading="lazy">
            <h3>Precio</h3>
            <p>Pariatur laboris ipsum tempor non sunt id id ex.
                Aute quis elit in ea ad veniam velit dolore sunt nisi.
                Ut laboris duis velit excepteur eu in eu anim non tempor.
                Incididunt sit sunt eiusmod qui.</p>

        </div>

        <div class="icon">
            <img src="build/img/icono3.svg" alt="time" loading="lazy">
            <h3>A tiempo</h3>
            <p>Pariatur laboris ipsum tempor non sunt id id ex.
                Aute quis elit in ea ad veniam velit dolore sunt nisi.
                Ut laboris duis velit excepteur eu in eu anim non tempor.
                Incididunt sit sunt eiusmod qui.</p>

        </div>

    </div>
</main>

<section class="seccion container">
    <h2>Casas y Departamentos en Ventas</h2>

    <?php
    $limite = 3;
        include 'includes/templates/anuncio.php' 
         ?>

    <div class="aling-right allbutton">
        <a href="advertisements.html" class="button-green ">Ver todas</a>
    </div>
</section>
<section class="image-contact">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Excepteur veniam consequat adipisicing adipisicing esse non nulla mollit laborum.
        Id nostrud id et nulla Lorem. Voluptate incididunt cupidatat qui ipsum pariatur.
        Consequat Lorem sint nulla dolor ex irure nisi. Consequat Lorem ea elit ipsum aliqua mollit minim cillum.
        Non enim sunt occaecat dolor pariatur officia officia minim mollit duis. Enim nostrud duis nostrud eiusmod.</p>
    <a href="contact.html" class="button-yellow contacbutton">Contáctanos</a>
</section>

<div class="container section section-lower">
    <section class="blog">
        <h3>Nuestro blog</h3>

        <article class="entry-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog1.webp" type="image/webp">
                    <source srcset="build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog1.jpg" alt="text entry blog">
                </picture>
            </div>
            <div class="text-entry">
                <a href="entry.html">
                    <h4>Terraza techo</h4>
                    <p>Escrito el: <span>20/08/2022</span> por <span>Admin</span></p>
                </a>
                <p>
                    Ad sunt exercitation mollit incididunt. Amet pariatur commodo laboris Lorem.
                    Lorem aliqua adipisicing sint consectetur nulla do sunt duis.
                </p>
            </div>
        </article>
        <article class="entry-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog2.webp" type="image/webp">
                    <source srcset="build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog2.jpg" alt="text entry blog">
                </picture>
            </div>
            <div class="text-entry">
                <a href="entry.html">
                    <h4>Terraza techo</h4>
                    <p>Escrito el: <span>18/08/2022</span> por <span>Admin</span></p>
                </a>
                <p>
                    Ad sunt exercitation mollit incididunt. Amet pariatur commodo laboris Lorem.
                    Lorem aliqua adipisicing sint consectetur nulla do sunt duis.
                </p>
            </div>
        </article>
        <article class="entry-blog">
            <div class="image">
                <picture>
                    <source srcset="build/img/blog3.webp" type="image/webp">
                    <source srcset="build/img/blog3.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/blog3.jpg" alt="text entry blog">
                </picture>
            </div>
            <div class="text-entry">
                <a href="entry.html">
                    <h4>Decora tu living</h4>
                    <p>Escrito el: <span>17/08/2022</span> por <span>Admin</span></p>
                </a>
                <p>
                    Ad sunt exercitation mollit incididunt. Amet pariatur commodo laboris Lorem.
                    Lorem aliqua adipisicing sint consectetur nulla do sunt duis.
                </p>
            </div>
        </article>
    </section>
    <section class="testimoniales">
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                Cupidatat exercitation voluptate laborum enim nulla.
                Elit et dolor adipisicing reprehenderit anim in esse.
                Reprehenderit occaecat mollit exercitation commodo. Incididunt deserunt ad mollit minim.
            </blockquote>
            <p>- Felipe Hevia</p>
        </div>
    </section>
</div>

<?php
    incluirTemplate('footer');
?>