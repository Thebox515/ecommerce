<?php

function example_theme_support()
{
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'example_theme_support');

/*widget assets*/

function zona_widget()
{

    /*sidebar 1*/
    register_sidebar(
        array(
            'name' => 'Footer columna 1', 'id' => 'widget_uno',
            'before_widget' => '<div id="%1$s" class="col-12 col-md-4">',
            'after_widget' => '</div>', //cerramos los conectores 
            'before_title' => '<h5 class="titulo-menu-footer">',
            'after_title' => '<h5>' //cerramos los conectores 
        )
    );
    /*sidebar 1*/
    /*sidebar 2*/
    register_sidebar(
        array(
            'name' => 'Footer columna 2', 'id' => 'widget_dos',
            'before_widget' => '<div id="%1$s" class="col-12 col-md-4">',
            'after_widget' => '</div>', //cerramos los conectores 
            'before_title' => '<h5 class="titulo-menu-footer">',
            'after_title' => '<h5>' //cerramos los conectores 
        )
    );
    /*sidebar 2*/

    /*sidebar 3*/
    register_sidebar(
        array(
            'name' => 'Footer columna 3', 'id' => 'widget_tres',
            'before_widget' => '<div id="%1$s" class="col-12 col-md-4">',
            'after_widget' => '</div>', //cerramos los conectores 
            'before_title' => '<h5 class="titulo-menu-footer">',
            'after_title' => '<h5>' //cerramos los conectores 
        )
    );
    /*sidebar 3*/
}

add_action('widgets_init', 'zona_widget');
/*widget assets*/