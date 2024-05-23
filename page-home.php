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
    <a href="http://maria-grysevych.dk/clobotics/home/wind-services/">
        <div class="wind_content">
            <h2 class="title section-title">Wind services</h2>
            <p id="main_service_description" class="subtitle"><?php the_field('wind_direction_description'); ?></p>
            <div class="direction_button container_to_center">
                <a href="http://maria-grysevych.dk/clobotics/home/wind-services/"class="btn dark">Explore Clobotics Wind</a>  
            </div>  
        </div>
    </a>
    <div class="retail_content">
        <h2 class="title section-title">Retail services</h2>
        <p id="main_service_description" class="subtitle"><?php the_field('retail_direction_description'); ?></p>
        <div class="direction_button container_to_center">
            <a href="http://maria-grysevych.dk/clobotics/home/retail-services/"class="btn dark">Explore Clobotics Retail</a>  
        </div>
    </div>

</section>

<!-- Gap section -->
<div style="height: 60px;"></div>


  </main>
</body>
<?php get_footer(); ?>