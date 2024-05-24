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
                <?php if (have_rows('keypoints')) : ?>
                    <?php while (have_rows('keypoints')) : the_row(); ?>
                        <div class="keypoint">
                            <h3><?php the_sub_field('keypoint_title'); ?></h3>
                            <?php
                            $icon = get_sub_field('keypoint_icon');
                            if ($icon) : ?>
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
                            <?php endif; ?>
                            <p><?php the_sub_field('keypoint_description'); ?></p>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <h2><?php the_field('short_article_title'); ?></h2>
            <p><?php the_field('short_article_text'); ?></p>
        </article>
    <?php endwhile; ?>

    <section class="wind-call-to-action">
        <img class="wind-call-to-action-image" src="<?php echo get_template_directory_uri(); ?>/media/contact-us.png" alt="Contact us img">
        <div class="content-wrapper">
            <h2>Optimise your<br>wind turbines</h2>
            <a href="http://maria-grysevych.dk/clobotics/home/wind-services/contact/" class="btn optional">Contact us</a>
        </div>
    </section>

    <!-- Other wind services linking Section -->
    <section class="wind_services_linking">
        <h3 class="title">Discover Clobotics with our articles!</h3>

        <div class="news_articles_linking_container owl-carousel owl-theme">
            <?php $loop = new WP_Query(array('post_type' => 'wind-service', 'posts_per_page' => -1)); ?>
            <?php while ($loop->have_posts()) : $loop->the_post(); ?>
                <div class="service_single_container">
                    <?php
                    $image = get_field('service_main_image');
                    if ($image) : ?>
                        <img class="service_image_in_loop" src="<?php echo esc_url($image['url']); ?>" alt="Article image">
                    <?php endif; ?>
                    <h4 class="title"><?php the_field('service_title'); ?></h4>

                    <div class="keypoints_container">
                        <?php if (have_rows('keypoints')) : ?>
                            <?php while (have_rows('keypoints')) : the_row(); ?>
                                <?php
                                $icon = get_sub_field('keypoint_icon');
                                if ($icon) : ?>
                                    <img class="icon" src="<?php echo esc_url($icon['url']); ?>" alt="Service keypoint icon">
                                <?php endif; ?>
                                <p class="subtitle"><?php the_sub_field('keypoint_description'); ?></p>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; wp_reset_query(); ?>
        </div>
    </section>

    <?php 
        wp_enqueue_script("jquery", "https://code.jquery.com/jquery-1.12.1.min.js");
        wp_enqueue_script("carousel-script", get_stylesheet_directory_uri()."/js/plug-ins/OwlCarousel2/owl.carousel.min.js");
    ?>
    <script>
        jQuery(document).ready(function($) {
            $('.news_articles_linking_container').owlCarousel({
                loop: true,
                items: 3,
                nav: true,
                dots: true,
                autoplay: true,
                autoplayTimeout: 3000,
                animateOut: 'fadeOut',
                lazyLoad: true,
            });
        });
    </script>

</main>
   
</body>
<?php get_footer(); ?>


