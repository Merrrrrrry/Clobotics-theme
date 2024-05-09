<?php
/*
Template Name: Wind services
*/
?>

<?php get_header(); ?>

<main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>

<body>

<!-- Hero Section WITHOUT navbar -->

<div class="hero-section">
        <!-- <div class="navbar">
            <a class="home" href="<  ?php echo get_permalink(get_page_by_path('home')) ?>" style="order: -1;">Home</a>
            <a href="<  ?php echo get_permalink(get_page_by_path('contact')) ?>">Contacts</a>
            <a href="<  ?php echo get_permalink(get_page_by_path('faq')) ?>">FAQ</a>
            <a href="<  ?php echo get_permalink(get_page_by_path('services')) ?>">Services</a>
        </div> -->


<!-- Hero Video (referenced from busters world) -->
<div class="hero-section-background">
    <video autoplay muted loop class="video-background"> 
        <source src="<?php echo get_template_directory_uri(); ?> /....../..... .mp4" type="video/mp4">
    </video>

</div>

    <div class="hero-section-content">
        <h1 class="hero page-title"> Wind services </h1>
        <p class="hero page-slogan"> </p>
    </div>
</div>








<!-- Article  Section -->
<!-- We operate globally -->

<div class="article_main we_operate_globally"> 

    <h2 class="article_title article_title_we_operate_globally"><?php the_field('article_title_we_operate_globally'); ?></h2>
    <p class="subtitle_of_article article_text_we_operate_globally"><?php the_field('article_text_we_operate_globally'); ?></p>

        <img class="we_operate_globally-img image_of_our_offices_we_operate_globally_section " src="<?php the_field('image_of_our_offices_we_operate_globally_section'); ?>" alt=""> 
        <img class="we_operate_globally-img image_of_our_partners_we_operate_globally_section " src="<?php the_field('image_of_our_partners_we_operate_globally_section'); ?>" alt=""> 
        <img class="we_operate_globally-img image_of_our_work_we_operate_globally_section " src="<?php the_field('image_of_our_work_we_operate_globally_section'); ?>" alt=""> 

</div>


<!-- Wind services presentation Video (code referenced from busters world) -->
<div class="wind_presentation_video">
    <video autoplay class="video-background"> 
        <source src="<?php echo get_template_directory_uri(); ?> /....../..... .mp4" type="video/mp4">
    </video>

</div>
