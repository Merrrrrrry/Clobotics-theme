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
            <div class="hero-section-background white_svg">
                <img class="image-hero" id="article_main_img" src="<?php $image = get_field('article_main_image'); echo esc_url($image["url"]); ?>" alt="Main image of article" /> 
            </div>

            <div class="hero-section-content">
                <h1 class="title hero-title"><?php the_field('new_article_title'); ?></h1>
            </div>
        </div>

        <article>
            <h2><?php the_field('meta_description_short'); ?></h2>

            <?php for ($i = 1; $i <= 6; $i++): ?>
                <?php if (get_field("new_article_subtitle_$i")): ?>
                    <h3><?php the_field("new_article_subtitle_$i"); ?></h3>
                <?php endif; ?>

                <?php if (get_field("new_article_paragraph_$i")): ?>
                    <p><?php the_field("new_article_paragraph_$i"); ?></p>
                <?php endif; ?>

                <?php for ($j = 1; $j <= 2; $j++): ?>
                    <?php $image = get_field("new_article_image_" . (($i - 1) * 2 + $j)); ?>
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endfor; ?>
        </article>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
