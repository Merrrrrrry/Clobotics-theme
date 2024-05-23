<?php
/*
Template Name: Media 
*/
?>

<?php get_header(); ?>
<body class="gray-body">

<main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>

<!--  Hero section  -->

        <div class="hero-section">
            <div class="hero-section-background">
                <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_media_page.jpg" alt="Hero image">
            </div>
            <div class="hero-section-content">
                <h1 class="hero-title">Mediafiles of Clobotics</h1>
                <p class="hero-slogan"> Download our media four your <br>articles or collaboration usage</p>
            </div>
        </div> 


<!-- Media Photos loop  (downloadable content section) -->
    <section class="media_photos_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-photos', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('photo_image');
            $name = get_field("photo_description");
        ?>
        
        <div class="downloadable-content">
            <img src="<?php echo esc_url($image["url"]); ?>" alt="Downloadable image of <?php echo esc_attr($name); ?>">
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    







</main>
    
</body>
<?php get_footer(); ?>