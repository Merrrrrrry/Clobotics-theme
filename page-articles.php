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

       
    <div id="articles-container">
        <?php
        $articles_per_page = 6;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $articles_query = new WP_Query(array(
            'post_type' => 'new-article',
            'posts_per_page' => $articles_per_page,
            'paged' => $paged
        ));

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
    </div>
</main>


</body>
<?php get_footer(); ?>

