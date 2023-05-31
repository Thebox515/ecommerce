<?php
function css_wordpress()
{

    wp_register_style('estilos.css', get_bloginfo('template_directory') . '/assets/librerias/css/estilos.css');
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css', 'all');




    wp_enqueue_style('bootstrap');
    wp_enqueue_style('estilos.css');
}

add_action('wp_enqueue_scripts', "css_wordpress");


//*wp_register_style('estilos.css', get_template_directory() . '/assets.php/librerias/css/estilos.css');*//