<?php
function clobotics_register_stylesheet() {
    //wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css");
    
    wp_enqueue_style("clobotics-style", get_stylesheet_directory_uri() . "/style.css");
    wp_enqueue_style("materialize-icons", "https://fonts.googleapis.com/icon?family=Material+Icons");
    wp_enqueue_script("clobotics", get_stylesheet_directory_uri() . "/javascript.js");
}
add_action("wp_enqueue_scripts", "clobotics_register_stylesheet");




function enqueue_google_fonts() {
    wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' );
    wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts' );



// Disable Gutenberg
function disable_gutenberg() {
    remove_post_type_support("page", "editor");
    remove_post_type_support("post", "editor");
}
add_action("init", "disable_gutenberg");



// Displaying menu under Appearance in WP backhand 
function demo_register_menus() {
    register_nav_menus(array(
        "main-menus" => "Main Menu Location"
    ));
}
add_action("init", "demo_register_menus");


//echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
