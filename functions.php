<?php
function clobotics_register_stylesheet() {
    //wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css");
    
    wp_enqueue_style("sitesecurity-style", get_stylesheet_directory_uri() . "/style.css");
    wp_enqueue_style("materialize-icons", "https://fonts.googleapis.com/icon?family=Material+Icons");
    wp_enqueue_style("din_condensed_font", "https://use.typekit.net/piy2rgn.css");
    wp_enqueue_script("clobotics", get_stylesheet_directory_uri() . "/javaskript.js");
}
add_action("wp_enqueue_scripts", "clobotics_register_stylesheet");


// Disable Gutenberg
function disable_gutenberg() {
    remove_post_type_support("page", "editor");
    remove_post_type_support("post", "editor");
}
add_action("init", "disable_gutenberg");


//echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
