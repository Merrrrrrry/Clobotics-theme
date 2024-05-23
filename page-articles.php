<?php
/*
Template Name: New Articles
*/
?>

<?php get_header(); ?>

<?php 
    // wp_enqueue_style("owl-carousel-style", get_stylesheet_directory_uri() . "/js/plug-ins/OwlCarousel2/owl.carousel.min.css");
    // wp_enqueue_style("owl-carousel-style-theme", get_stylesheet_directory_uri() . "/js/plug-ins/OwlCarousel2/owl.theme.default.min.css");
    // wp_enqueue_style("owl-carousel-custom-styles", get_stylesheet_directory_uri() . "/css/custom.owl-carousel.css");
?>

<body class="gray-body">
    <div class="hero-section">
        <div class="hero-section-background">
            <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_articles_page.jpg" alt="Hero image">
        </div>

        <div class="hero-section-content">
            <h1 class="title hero-title">Explore Clobotics potential!</h1>
        </div>
    </div>

    <main>
        <h2>Clobotics Articles</h2>

        <!-- Search bar -->
        <div class="search-bar-container-articles">
            <form id="search-form-articles" method="get" action="<?php echo esc_url(get_permalink()); ?>" class="search-form-articles">
                <div class="search-bar-articles">
                    <input type="text" name="search_query" id="search-input-articles" placeholder="Search..." value="<?php echo isset($_GET['search_query']) ? esc_attr($_GET['search_query']) : ''; ?>">
                    <button type="submit" class="search-button-articles">
                        <span class="material-icons search-icon">search</span>
                    </button>
                </div>
            </form>
        </div>

        <div id="articles-container" style="margin: 4em;">
            <?php
            // Check if search query exists
            $search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';

            // Define WP_Query args
            $args = array(
                'post_type' => 'new-article',
                'posts_per_page' => -1,
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
                        'key' => 'new_article_title',
                        'value' => $search_query,
                        'compare' => 'LIKE'
                    )
                )
            );

            // Perform WP_Query
            $articles_query = new WP_Query($args);


            if ($articles_query->have_posts()) :
                while ($articles_query->have_posts()) : $articles_query->the_post();
                    ?>
                    <article class="col" style="margin: 1em;">
                        <a href="<?php the_permalink(); ?>">
                            <?php
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
                endwhile;

                wp_reset_postdata();
            else :
                echo '<p>No articles found.</p>';
            endif;
            ?>
        </div>
    </main>

</body>

<!-- 
<?php 
    // wp_enqueue_script("jquery", "https://code.jquery.com/jquery-1.12.1.min.js");
    // wp_enqueue_script("carousel-script", get_stylesheet_directory_uri()."/js/plug-ins/OwlCarousel2/owl.carousel.min.js");
?>
<script>
    jQuery(document).ready(function($) {
        $('#articles-container').owlCarousel({
            loop: true,
            items: 3,  // Updated to display three items per view
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            animateOut: 'fadeOut',
            lazyLoad: true
        });
    });
</script> -->

<?php get_footer(); ?>
