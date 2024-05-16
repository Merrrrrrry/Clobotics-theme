<?php
/*
Template Name: single-new-article
*/
?>


<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>

<!-- Hero section -->
        <div class="hero-section">
            <div class="hero-section-background">
                <img class="image-hero" id="article_main_img" src="<?php $image = get_field('article_main_image');  echo esc_url($image["url"]); ?>" alt="Main image of article" /> 
            </div>

            <div class="hero-section-content">
                <h1 class="title hero-title"><?php the_field('new_article_title'); ?></h1>
            </div>
        </div>


    
        <article>
            <h2><?php the_field('meta_description_short'); ?></h2>
            <h3><?php the_field('new_article_subtitle_1'); ?></h3>
            <p><?php the_field('new_article_paragraph_1'); ?></p>
            <h3><?php the_field('new_article_subtitle_2'); ?></h3>
            <p><?php the_field('new_article_paragraph_2'); ?></p>
            <?php
            $image = get_field('new_article_image');
            if ($image) :
                echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
            endif;
            ?>
            <h3><?php the_field('new_article_subtitle_3'); ?></h3>
            <p><?php the_field('new_article_paragraph_3'); ?></p>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
