<?php

function comercio_script() {
    if (!is_admin()){
     
    wp_register_script('boostrap-js',' https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js', false, false);
    //wp_register_scipt('MI-ARCHIVO', get_bloginfo('template_directory'). '/assets/linrerias/js/MIARCHIVO.js,' false, false):

     wp_enqueue_script('boostrap-js');
     
     //wp_enqueue_scipt('MI-ARCHIVO-JS', array('jquery'), true);

    }
    
    


}
add_action("wp_enqueue_script", "comercio_script", 1);