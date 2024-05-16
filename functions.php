<?php
function clobotics_register_stylesheet() {
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

// Displaying menu under Appearance in WP backend

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

// Enqueue custom JavaScript
function clobotics_enqueue_scripts() {
    wp_enqueue_script('clobotics-custom', get_template_directory_uri() . '/custom.js', array('jquery'), null, true);

    // Localize script to use AJAX URL in JavaScript
    wp_localize_script('clobotics-custom', 'clobotics_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'clobotics_enqueue_scripts');

// Handle AJAX search and filters
function clobotics_ajax_search() {
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
    $sector = isset($_POST['sector']) ? sanitize_text_field($_POST['sector']) : '';
    $region = isset($_POST['region']) ? sanitize_text_field($_POST['region']) : '';
    $job_type = isset($_POST['job_type']) ? sanitize_text_field($_POST['job_type']) : '';

    // Construct meta query arguments
    $meta_query = array('relation' => 'AND');
    if ($search_query) {
        $meta_query[] = array(
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
                'value' => str_replace(array(' ', '-'), '_', $search_query),
                'compare' => 'LIKE'
            )
        );
    }
    if ($sector) {
        $meta_query[] = array(
            'key' => 'sector',
            'value' => $sector,
            'compare' => 'LIKE'
        );
    }
    if ($region) {
        $meta_query[] = array(
            'key' => 'region',
            'value' => $region,
            'compare' => 'LIKE'
        );
    }
    if ($job_type) {
        $meta_query[] = array(
            'key' => 'job_type',
            'value' => str_replace(array(' ', '-'), '_', $job_type),
            'compare' => 'LIKE'
        );
    }

    // Construct WP_Query arguments
    $args = array(
        'post_type' => 'open-position',
        'posts_per_page' => -1,
        'meta_query' => $meta_query
    );

    // Perform query
    $related_positions = new WP_Query($args);

    if ($related_positions->have_posts()) :
        while ($related_positions->have_posts()) : $related_positions->the_post(); ?>
            <li class="position-item">
                <h3 class="job-title"><?php the_field('job_title'); ?></h3>
                <p class="job-subtitle">
                    <?php
                    $job_location = get_field('job_location');
                    $job_type = get_field('job_type');
                    echo esc_html($job_location) . ' <span class="job-type">' . esc_html($job_type) . '</span>';
                    ?>
                    <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                </p>
            </li>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p class="job-subtitle">No open positions found for your criteria.</p>
    <?php endif;

    wp_die();
}
add_action('wp_ajax_clobotics_search', 'clobotics_ajax_search');
add_action('wp_ajax_nopriv_clobotics_search', 'clobotics_ajax_search');
