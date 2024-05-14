<?php
function clobotics_register_stylesheet() {
     //wp_enqueue_style("bootstrap", "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css");
    wp_enqueue_style("clobotics-style", get_stylesheet_directory_uri() . "/style.css?v=" . mktime());
    wp_enqueue_script("clobotics", get_stylesheet_directory_uri() . "/javascript.js?v=" . mktime(), array(), false, true);
    wp_enqueue_style("materialize-icons", "https://fonts.googleapis.com/icon?family=Material+Icons");
}
add_action("wp_enqueue_scripts", "clobotics_register_stylesheet");

function enqueue_google_fonts() {
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    wp_enqueue_style('roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap');
}
add_action('wp_enqueue_scripts', 'enqueue_google_fonts');

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




// Function for search bar to include custom fields

function include_custom_fields_in_search($query) {
    if (!is_admin() && $query->is_main_query() && $query->is_search()) {
        $search_query = $query->get('s');

        // Normalize search query to handle spaces and hyphens
        $normalized_search_query = str_replace(array(' ', '-'), '_', $search_query);

        $meta_query = array(
            'relation' => 'OR',
            array(
                'key' => 'job_title',
                'value' => $search_query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'job_location',
                'value' => $search_query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'job_type',
                'value' => $search_query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'job_type',
                'value' => $normalized_search_query,
                'compare' => 'LIKE'
            ),
        );

        $query->set('meta_query', $meta_query);
    }
}
add_action('pre_get_posts', 'include_custom_fields_in_search');




