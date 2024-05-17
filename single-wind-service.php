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





    <!-- Other wind services linking  Section    Wind service -->

 <section class="wind_services_linking">
    <h3 class="title">Discover Clobotics with our articles!</h3>

    <div class="news_articles_linking_container"> 
        <?php $loop = new WP_Query( array( 'post_type' => 'wind-service', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="service_single_conteiner owl-carousel">
                <img class="service_image_in_loop" src="<?php $image = get_field('service_main_image');  echo esc_url($image["url"]); ?>" alt="Article image" /> 
                <h4 class="title"><?php the_field('service_title'); ?></h4>

                <div class="keypoints_container">
                    <img class="icon" src="<?php $image = get_field('icon_of_the_keypoint_1');  echo esc_url($image["url"]); ?>" alt="Service keypoint icon 1" /> 
                    <p class="subtitle"><?php the_field('meta_description_short'); ?></p>  
                    <img class="icon" src="<?php $image = get_field('icon_of_the_keypoint_2');  echo esc_url($image["url"]); ?>" alt="Service keypoint icon 2" /> 
                    <p class="subtitle"><?php the_field('meta_description_short'); ?></p> 
                    <img class="icon" src="<?php $image = get_field('icon_of_the_keypoint_3');  echo esc_url($image["url"]); ?>" alt="Service keypoint icon 3" /> 
                    <p class="subtitle"><?php the_field('meta_description_short'); ?></p>  
                </div>            
            </div> 

        <?php endwhile; wp_reset_query(); ?>
    </div>

</section>



</main>

<?php get_footer(); ?>
