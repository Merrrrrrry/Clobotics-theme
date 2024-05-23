<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

<body class="gray-body">
  <main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>


<!-- Hero section -->
<div class="hero-section hero-section-home">
    <div class="hero-section-background">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_articles_page.jpg" alt="Hero image">
    </div>

    <div class="hero-section-content">
        <h1 class="title hero-title" style="display: none;">Clobotics home page</h1>
    </div>
</div>


<!-- Wind and Retail directions Section -->

<section id="two_main_directions_conteiner">
    <div class="retail_and_wind_content wind_content">
        <a href="http://maria-grysevych.dk/clobotics/home/wind-services/">
            <h2 class="title">Wind services</h2>
            <p id="main_service_description" class="subtitle"><?php the_field('wind_direction_description'); ?></p>
            <div class="direction_button container_to_center">
                <div class="btn dark">Explore Clobotics Wind</div>  
            </div>  
        </a>
    </div>
    <div class="retail_and_wind_content retail_content">
        <a href="http://maria-grysevych.dk/clobotics/home/retail-services/">
            <h2 class="title">Retail services</h2>
            <p id="main_service_description" class="subtitle"><?php the_field('retail_direction_description'); ?></p>
            <div class="direction_button container_to_center">
                <div href="http://maria-grysevych.dk/clobotics/home/retail-services/"class="btn dark">Explore Clobotics Retail</div>  
            </div>
        </a>
    </div>


</section>

<!-- Gap section -->
<div style="height: 60px;"></div>


  </main>
</body>
<?php get_footer(); ?>