<?php
add_post_type_support('page', 'excerpt');

require get_template_directory() . '/assets/inc/css-functions.php';
require  get_template_directory() . '/assets/inc/js-functions.php';
require  get_template_directory() . '/assets/inc/modulos-functions.php';

//widgets//
require  get_template_directory() . '/assets/inc/widgets-functions.php';


function add_extra_post_thumbnails() {

    add_meta_box('extra_post_thumbnails', 'Imágenes destacadas adicionales', 'extra_post_thumbnail_box', 'post', 'side', 'low');
 
 }
 
 add_action('admin_init', 'add_extra_post_thumbnails');
 
 
 function extra_post_thumbnail_box($post) {
 
    $thumbnail_ids = get_post_meta($post->ID, 'extra_post_thumbnails', true);
 
    wp_nonce_field(plugin_basename(__FILE__), 'extra_post_thumbnail_box_nonce');
 
 
    echo '<p><label for="extra-post-thumbnails">Selecciona imágenes adicionales:</label></p>';
 
    echo '<div class="extra-post-thumbnail">';
 
    foreach ($thumbnail_ids as $thumbnail_id) {
 
        echo '<div class="extra-post-thumbnail-preview">';
 
        echo wp_get_attachment_image($thumbnail_id, 'thumbnail');
 
        echo '<p><a href="#" class="remove-extra-post-thumbnail">Eliminar imagen</a></p>';
 
        echo '</div>';
 
    }
 
    echo '<p><a href="#" id="add-extra-post-thumbnail">Agregar imagen</a></p>';
 
    echo '</div>';
 
    echo '<input type="hidden" id="extra-post-thumbnails" name="extra_post_thumbnails" value="' . esc_attr(json_encode($thumbnail_ids)) . '">';
 
 }
 
 
 function save_extra_post_thumbnail_data($post_id) {
 
    if (!isset($_POST['extra_post_thumbnail_box_nonce']) || !wp_verify_nonce($_POST['extra_post_thumbnail_box_nonce'], plugin_basename(__FILE__))) {
 
        return;
 
    }
 
 
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
 
        return;
 
    }
 
 
    if (!current_user_can('edit_post', $post_id)) {
 
        return;
 
    }
 
 
    if (isset($_POST['extra_post_thumbnails'])) {
 
        $extra_thumbnails = json_decode(stripslashes($_POST['extra_post_thumbnails']));
 
        if (is_array($extra_thumbnails)) {
 
            delete_post_meta($post_id, 'extra_post_thumbnails');
 
            foreach ($extra_thumbnails as $thumbnail_id) {
 
                add_post_meta($post_id, 'extra_post_thumbnails', $thumbnail_id);
 
            }
 
        }
 
    }
 
 }
 
 add_action('save_post', 'save_extra_post_thumbnail_data');
 
 
 function register_extra_image_sizes() {
 
    add_image_size('extra-small', 100, 100, true);
 
    add_image_size('extra-medium', 300, 300, true);
 
    add_image_size('extra-large', 600, 600, true);
 
 }
 
 add_action('init', 'register_extra_image_sizes');
