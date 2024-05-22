<?php
/*
Template Name: Articles
*/
?>

<?php get_header(); ?>

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

    <!-- Search form -->
    <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <label>
            <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search articles', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        </label>
        <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Search', 'submit button'); ?>" />
    </form>

    <div id="articles-container">
        <?php
        $articles_per_page = 6;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Check if search query exists
        $search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';

        // Define WP_Query args
        $args = array(
            'post_type' => 'new-article',
            'posts_per_page' => $articles_per_page,
            'paged' => $paged,
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
            $count = 0;
            while ($articles_query->have_posts()) : $articles_query->the_post();
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }
                ?>
                <article class="col">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        $image = get_field('article_main_image');
                        if ($image) :
                            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                        endif;
                        ?>
                        <h3><?php the_field('new_article_title'); ?></h3>
                        <p><?php the_field('meta_description_short'); ?></p>
                        <p class="article-category"><?php echo get_field('article_category'); ?></p>
                    </a>
                </article>
                <?php
                $count++;
                if ($count % 3 == 0) {
                    echo '</div>';
                }
            endwhile;

            if ($count % 3 != 0) {
                echo '</div>';
            }

            wp_reset_postdata();
        else :
            echo '<p>No articles found.</p>';
        endif;
        ?>
    </div>
</main>

</body>
<?php get_footer(); ?>
