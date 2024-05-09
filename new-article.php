<?php
/*
Template Name: single-article
*/
?>


<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <article>
            <h2><?php the_field('new_article_headline'); ?></h2>
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
