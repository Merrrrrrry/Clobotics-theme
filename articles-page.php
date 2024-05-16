<?php
/*
Template Name: Articles
*/
?>

<?php get_header(); ?>


<!-- Hero section -->
<div class="hero-section">
    <div class="hero-section-background">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_about_us_page_1.jpg" alt="Hero_about_us_page">
    </div>

    <div class="hero-section-content">
        <h1 class="title hero-title"> Meet Clobotics - vision technology company with offices all around the world </h1>
        <p class="hero-slogan"> </p>
    </div>
</div>



<main>
    <h2>Clobotics Articles</h2>

    <?php
    $articles_per_page = 6; // 2 rows with 3 articles each

    // Get current page number
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    // Query articles
    $articles_query = new WP_Query(array(
        'post_type' => 'new-article', // Custom post type name
        'posts_per_page' => $articles_per_page,
        'paged' => $paged // Pagination
    ));

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

        // Pagination
        if ($articles_query->max_num_pages > 1) :
            ?>
            <div class="pagination">
                <?php echo paginate_links(array(
                    'total' => $articles_query->max_num_pages,
                    'current' => max(1, $paged),
                    'prev_text' => __('« Previous'),
                    'next_text' => __('Next »'),
                )); ?>
            </div>
        <?php endif;

        wp_reset_postdata();
    else :
        echo '<p>No articles found.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?>
