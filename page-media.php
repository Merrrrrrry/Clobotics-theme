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


</main>
    
</body>
<?php get_footer(); ?>