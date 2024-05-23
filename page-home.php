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



  </main>
</body>
<?php get_footer(); ?>