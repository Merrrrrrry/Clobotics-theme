<?php
function clobotics_register_stylesheet() {
    wp_enqueue_style("clobotics-style", get_stylesheet_directory_uri() . "/css/style.css?v=" . mktime());
    wp_enqueue_script("clobotics", get_stylesheet_directory_uri() . "/js/javascript.js?v=" . mktime(), array(), false, true);
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
    wp_enqueue_script('clobotics-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), null, true);

    // Localize script to use AJAX URL in JavaScript
    wp_localize_script('clobotics-custom', 'clobotics_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'clobotics_enqueue_scripts');

// Handle AJAX search and filters for career positions
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

// Handle AJAX search for wind services
function clobotics_ajax_search_wind_services() {
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';

    // Construct meta query arguments
    $meta_query = array(
        'relation' => 'OR',
        array(
            'key' => 'service_title',
            'value' => $search_query,
            'compare' => 'LIKE'
        ),
        array(
            'key' => '1st_keypoint',
            'value' => $search_query,
            'compare' => 'LIKE'
        ),
        array(
            'key' => '2nd_keypoint',
            'value' => $search_query,
            'compare' => 'LIKE'
        ),
        array(
            'key' => '3rd_keypoint',
            'value' => $search_query,
            'compare' => 'LIKE'
        )
    );

    // Construct WP_Query arguments
    $args = array(
        'post_type' => 'wind-service',
        'posts_per_page' => -1,
        'meta_query' => $meta_query
    );

    // Perform query
    $all_services = new WP_Query($args);

    if ($all_services->have_posts()) :
        while ($all_services->have_posts()) : $all_services->the_post(); ?>
            <li class="service-item">
                <h3 class="service-title"><?php the_field('service_title'); ?></h3>
                <div class="service-main-image">
                    <?php
                    $image = get_field('service_main_image');
                    if (!empty($image)) : ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                </div>
                <div class="service-keypoints">
                    <div class="keypoint">
                        <p><?php the_field('1st_keypoint'); ?></p>
                        <?php
                        $icon1 = get_field('icon_of_the_keypoint_1');
                        if ($icon1) : ?>
                            <img src="<?php echo esc_url($icon1['url']); ?>" alt="<?php echo esc_attr($icon1['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="keypoint">
                        <p><?php the_field('2nd_keypoint'); ?></p>
                        <?php
                        $icon2 = get_field('icon_of_the_keypoint_2');
                        if ($icon2) : ?>
                            <img src="<?php echo esc_url($icon2['url']); ?>" alt="<?php echo esc_attr($icon2['alt']); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="keypoint">
                        <p><?php the_field('3rd_keypoint'); ?></p>
                        <?php
                        $icon3 = get_field('icon_of_the_keypoint_3');
                        if ($icon3) : ?>
                            <img src="<?php echo esc_url($icon3['url']); ?>" alt="<?php echo esc_attr($icon3['alt']); ?>">
                        <?php endif; ?>
                    </div>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn">Read more</a>
            </li>
        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p class="service-subtitle">No wind services available.</p>
    <?php endif;

    wp_die();
}
add_action('wp_ajax_clobotics_search_wind_services', 'clobotics_ajax_search_wind_services');
add_action('wp_ajax_nopriv_clobotics_search_wind_services', 'clobotics_ajax_search_wind_services');

// Handle AJAX search and filters for articles
function clobotics_ajax_search_articles() {
    $search_query = isset($_POST['search_query']) ? sanitize_text_field($_POST['search_query']) : '';
    $filter = isset($_POST['filter']) ? sanitize_text_field($_POST['filter']) : '';

    // Construct meta query arguments
    $meta_query = array('relation' => 'AND');
    if ($search_query) {
        $meta_query[] = array(
            'relation' => 'OR',
            array(
                'key' => 'new_article_title',
                'value' => $search_query,
                'compare' => 'LIKE'
            ),
            array(
                'key' => 'meta_description_short',
                'value' => $search_query,
                'compare' => 'LIKE'
            )
        );
    }
    if ($filter) {
        $meta_query[] = array(
            'key' => 'article_category', // Assuming you have a custom field for article category
            'value' => $filter,
            'compare' => 'LIKE'
        );
    }

    // Construct WP_Query arguments
    $args = array(
        'post_type' => 'new-article',
        'posts_per_page' => -1,
        'meta_query' => $meta_query
    );

    // Perform query
    $articles_query = new WP_Query($args);

    if ($articles_query->have_posts()) :
        $count = 0;
        while ($articles_query->have_posts()) : $articles_query->the_post();
            if ($count % 3 == 0) {
                // Start a new row after every third article
                echo '<div class="row">';
            }
            ?>
            <article class="col">
                <a href="<?php the_permalink(); ?>">
                    <?php 
                    // Retrieve and display the main article image/thumbnail
                    $image = get_field('article_main_image');
                    if ($image) :
                        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                    endif;
                    ?>
                    <h3><?php the_field('new_article_title'); ?></h3>
                    <p><?php the_field('meta_description_short'); ?></p>
                </a>
            </article>
            <?php
            $count++;
            if ($count % 3 == 0) {
                // Close the row after every third article
                echo '</div>';
            }
        endwhile;

        // Close the row if the last row contains less than 3 articles
        if ($count % 3 != 0) {
            echo '</div>';
        }
        wp_reset_postdata();
    else :
        echo '<p>No articles found.</p>';
    endif;

    wp_die();
}
add_action('wp_ajax_clobotics_search_articles', 'clobotics_ajax_search_articles');
add_action('wp_ajax_nopriv_clobotics_search_articles', 'clobotics_ajax_search_articles');
?>
