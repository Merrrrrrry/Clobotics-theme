<?php
function clobotics_register_stylesheet() {
    //wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css");
    
    wp_enqueue_style("clobotics-style", get_stylesheet_directory_uri() . "/style.css");
    wp_enqueue_style("materialize-icons", "https://fonts.googleapis.com/icon?family=Material+Icons");
    wp_enqueue_script("clobotics", get_stylesheet_directory_uri() . "/javascript.js");
}
add_action("wp_enqueue_scripts", "clobotics_register_stylesheet");


// Disable Gutenberg



// Displaying menu under Appearance in WP backhand 
function demo_register_menus() {
    register_nav_menus(array(
        "main-menus" => "Main Menu Location"
    ));
}
add_action("init", "demo_register_menus");


//echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
