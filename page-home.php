<?php
/*
Template Name: Home
*/
?>

<?php get_header() ?>


  <main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>


<!-- Hero section -->

<section class="home-content">
<div class="home-video">
    <video id="sectionVideoHome" autoplay loop muted playsinline preload="auto">
        <source src="<?php echo get_template_directory_uri(); ?>/media/logo-animation.mp4" type="video/mp4">
    </video>
 </div>


<!-- Wind and Retail directions Section -->

<section id="two_main_directions_conteiner">
    <div class="retail_and_wind_content wind_content">
        <a href="http://maria-grysevych.dk/clobotics/home/wind-services/">
            <h2 class="title main_service_title">Wind services</h2>
            <p class="main_service_description"><?php the_field('wind_direction_description'); ?></p>
            <div class="direction_button container_to_center">
                <div class="btn dark">Explore Clobotics Wind</div>  
            </div>  
        </a>
    </div>
    <div class="retail_and_wind_content retail_content">
        <a href="http://maria-grysevych.dk/clobotics/home/retail-services/">
            <h2 class="title main_service_title">Retail services</h2>
            <p class="main_service_description"><?php the_field('retail_direction_description'); ?></p>
            <div class="direction_button container_to_center">
                <div href="http://maria-grysevych.dk/clobotics/home/retail-services/"class="btn dark">Explore Clobotics Retail</div>  
            </div>
        </a>
    </div>


</section>
</section>

<!-- Gap section -->
<div style="height: 60px;"></div>


  </main>
</body>
<?php get_footer(); ?>