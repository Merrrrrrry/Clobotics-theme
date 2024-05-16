<?php
/*
Template Name: single-wind-service
*/
?>

<?php get_header(); ?>

<main>

    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h1 class="service-title"><?php the_field('service_title'); ?></h1>

            <div class="service-keypoints">
                <div class="keypoint">
                    <h3><?php the_field('1st_keypoint'); ?></h3>
                    <?php
                    $icon1 = get_field('icon_of_the_keypoint_1');
                    if ($icon1) : ?>
                        <img src="<?php echo esc_url($icon1['url']); ?>" alt="<?php echo esc_attr($icon1['alt']); ?>">
                    <?php endif; ?>
                    <p><?php the_field('1st_keypoint_subtitle_meta_description'); ?></p>
                </div>
                <div class="keypoint">
                    <h3><?php the_field('2nd_keypoint'); ?></h3>
                    <?php
                    $icon2 = get_field('icon_of_the_keypoint_2');
                    if ($icon2) : ?>
                        <img src="<?php echo esc_url($icon2['url']); ?>" alt="<?php echo esc_attr($icon2['alt']); ?>">
                    <?php endif; ?>
                    <p><?php the_field('2nd_keypoint_subtitle_meta_description'); ?></p>
                </div>
                <div class="keypoint">
                    <h3><?php the_field('3rd_keypoint'); ?></h3>
                    <?php
                    $icon3 = get_field('icon_of_the_keypoint_3');
                    if ($icon3) : ?>
                        <img src="<?php echo esc_url($icon3['url']); ?>" alt="<?php echo esc_attr($icon3['alt']); ?>">
                    <?php endif; ?>
                    <p><?php the_field('3rd_keypoint_subtitle_meta_description'); ?></p>
                </div>
            </div>

            <h2><?php the_field('short_article_title'); ?></h2>
            <p><?php the_field('short_article_text'); ?></p>
        </article>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>

