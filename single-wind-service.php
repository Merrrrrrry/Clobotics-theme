<?php
/*
Template Name: single-wind-service
*/
?>

<?php get_header(); ?>
<?php 
    wp_enqueue_style("owl-carousel-style", get_stylesheet_directory_uri() . "/js/plug-ins/OwlCarousel2/owl.carousel.min.css");
    wp_enqueue_style("owl-carousel-style-theme", get_stylesheet_directory_uri() . "/js/plug-ins/OwlCarousel2/owl.theme.default.min.css");
    wp_enqueue_style("owl-carousel-custom-styles", get_stylesheet_directory_uri() . "/css/custom.owl-carousel.css");
?>
<body>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h1 class="service-title"><?php the_field('service_title'); ?></h1>

            <div class="service-keypoints">
                <div class="keypoint">
                    
                    <?php
                    $icons1 = get_field('icon_of_the_keypoint_1');
                    if ($icons1) :
                        foreach ($icons1 as $icon1) :
                            $icon_image1 = get_field('icon_image_of_the_keypoint', $icon1->ID);
                            if ($icon_image1) : ?>
                                <img src="<?php echo esc_url($icon_image1['url']); ?>" alt="<?php echo esc_attr($icon_image1['alt']); ?>" class="icon">
                            <?php endif;
                        endforeach;
                    endif; ?>
                    <h3><?php the_field('1st_keypoint'); ?></h3>
                </div>
                <div class="keypoint">
                    <h3><?php the_field('2nd_keypoint'); ?></h3>
                    <?php
                    $icons2 = get_field('icon_of_the_keypoint_2');
                    if ($icons2) :
                        foreach ($icons2 as $icon2) :
                            $icon_image2 = get_field('icon_image_of_the_keypoint', $icon2->ID);
                            if ($icon_image2) : ?>
                                <img src="<?php echo esc_url($icon_image2['url']); ?>" alt="<?php echo esc_attr($icon_image2['alt']); ?>" class="icon">
                            <?php endif;
                        endforeach;
                    endif; ?>
                </div>
                <div class="keypoint">
                    <h3><?php the_field('3rd_keypoint'); ?></h3>
                    <?php
                    $icons3 = get_field('icon_of_the_keypoint_3');
                    if ($icons3) :
                        foreach ($icons3 as $icon3) :
                            $icon_image3 = get_field('icon_image_of_the_keypoint', $icon3->ID);
                            if ($icon_image3) : ?>
                                <img src="<?php echo esc_url($icon_image3['url']); ?>" alt="<?php echo esc_attr($icon_image3['alt']); ?>" class="icon">
                            <?php endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>

            <h2><?php the_field('short_article_title'); ?></h2>
            <p><?php the_field('short_article_text'); ?></p>
        </article>
    <?php endwhile; ?>



<section class="wind-call-to-action">
    <img  class="wind-call-to-action-image" src="<?php echo get_template_directory_uri(); ?>/media/contact-us.png" alt="Contact us img">
        <div class="content-wrapper">
            <h2>Optimise your<br>wind turbines</h2>
            <button class="btn optional">Contact us</button>
        </div>
</section>





    <!-- Other wind services linking  Section    Wind service -->

 <section class="wind_services_linking">
    <h3 class="title">Discover Clobotics with our articles!</h3>

    <div class="news_articles_linking_container  owl-carousel owl-theme">

        <?php $loop = new WP_Query( array( 'post_type' => 'wind-service', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

            <div class="service_single_conteiner owl-carousel">
                <img class="service_image_in_loop" src="<?php $image = get_field('service_main_image');  echo esc_url($image["url"]); ?>" alt="Article image" /> 
                <h4 class="title"><?php the_field('service_title'); ?></h4>

                <div class="keypoints_container">
                    <img class="icon" src="<?php $image = get_field('icon_of_the_keypoint_1');  echo esc_url($image["url"]); ?>" alt="Service keypoint icon 1" /> 
                    <img class="icon" src="<?php $image = get_field('icon_of_the_keypoint_2');  echo esc_url($image["url"]); ?>" alt="Service keypoint icon 2" /> 
                    <img class="icon" src="<?php $image = get_field('icon_of_the_keypoint_3');  echo esc_url($image["url"]); ?>" alt="Service keypoint icon 3" /> 

                </div>            
            </div> 

        <?php endwhile; wp_reset_query(); ?>
    </div>

</section>

<!-- <p class="subtitle"><?php the_field('meta_description_short'); ?></p>   -->

<?php 
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-1.12.1.min.js");
    wp_enqueue_script("carousel-script", get_stylesheet_directory_uri()."/js/plug-ins/OwlCarousel2/owl.carousel.min.js");
?>
<script>
    jQuery(document).ready(function($) {
        applyOwlCarousel({
            loop: true,
            items:3,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            animateOut: 'fadeOut',
            lazyLoad: true,
        })
    });
</script>


</main>
   
</body>
<?php get_footer(); ?>

