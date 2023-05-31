<?php  /*  videos */

function videos_register()
{

    $labels = array(
        'name' => _x('videos', 'post type general name'),
        'singular_name' => _x('videos', 'post type singular name'),
        'add_new' => _x('Agregar video', 'slideshow_two item'),
        'add_new_item' => __('Agregar video'),
        'edit_item' => __('Editar video'),
        'new_item' => __('Nueva video'),
        'view_item' => __('Ver el video'),
        'search_items' => __('Buscar video'),
        'not_found' =>  __('No se encontraron'),
        'not_found_in_trash' => __('No se encontraron en la basura'),
        'parent_item_colon' => ''
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable'    => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'exclude_from_search'   => false,
        'capability_type' => 'post',
        'menu_icon'  => 'dashicons-format-video',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
        'rewrite' => array('slug' => 'videos', 'with_front' => false)
    );

    register_post_type('videos', $args);
}

add_action('init', 'videos_register');

/*categorias personalizadas para videos*/
function categoria_videos()
{

    register_taxonomy(
        'categoria-videos',
        'videos',
        array(
            'label' => __('Categoria videos'),
            'rewrite' => array('slug' => 'categoria-videos'),
            'hierarchical' => true,
            // Allow videomatic creation of taxonomy columns on associated post-types table?
            'show_admin_column'   => true,
            // Show in quick edit panel?
            'show_in_quick_edit'  => true,
        )
    );
}
add_action('init', 'categoria_videos');

function genero_videos()
{

    register_taxonomy(
        'genero-videos',
        'videos',
        array(
            'label' => __('genero videos'),
            'rewrite' => array('slug' => 'genero_videos'),
            'hierarchical' => true,
            // Allow videomatic creation of taxonomy columns on associated post-types table?
            'show_admin_column'   => true,
            // Show in quick edit panel?
            'show_in_quick_edit'  => true,
        )
    );
}
add_action('init', 'genero_videos');


function etiqueta_videos()
{

    register_taxonomy(
        'etiqueta-videos',
        'videos',
        array(
            'hierarchical' => false,
            'label' => __('Etiqueta videos'),
            // Allow videomatic creation of taxonomy columns on associated post-types table?
            'show_admin_column'   => true,
            // Show in quick edit panel?
            'show_in_quick_edit'  => true,
            'update_count_callback' => '_update_post_term_count',
            'videosquery_var' => true,
            'rewrite' => array('slug' => 'etiqueta-videos'),
        )
    );
}
add_action('init', 'etiqueta_videos');
