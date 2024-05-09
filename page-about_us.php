<?php
/*
Template Name: About us
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
        <source src="<?php echo get_template_directory_uri(); ?>/video/video-top.mp4" type="video/mp4">
    </video>

</div>

    <div class="hero-section-content">
        <h1 class="hero page-title"> Meet Clobotics - vision technology company with offices all around the world </h1>
        <p class="hero page-slogan"> </p>
    </div>
</div>



<!-- Article  Section -->
<!-- Who we are -->

<div class="article_main who-we-are">

    <h2 class="article_title article_title_who_we_are"><?php the_field('article_title_who_we_are'); ?></h2>
    <p class="subtitle_of_article subtitle_of_article_who_we_are"><?php the_field('subtitle_of_article_who_we_are'); ?></p>
    <p class="article_text_who_we_are"><?php the_field('article_text_who_we_are'); ?></p>
        <a href="<?php echo get_permalink('  ............  ') ?>" class="button blue">Video presentation</a>
        <img class="about-us-page who-we-are-img left" src="  ............  " alt=""> 
        <img class="about-us-page who-we-are-img right" src="  ............  " alt=""> 
</div>


<!-- Article  Section -->
<!-- One company Two directions -->

<div class="article_secondary_main one_company_two_directions">

    <img class="about-us-page one_company_two_directions_collage_img " src="  ............  " alt=""> 
        <h3 class="article_title article_title_one_company_two_directions"><?php the_field('article_title_one_company_two_directions'); ?></h3>
        <p class="wind_part_text"><?php the_field('wind_part_text'); ?></p>
                <a href="<?php echo get_permalink('  ............  ') ?>" class="button blue">Discover Wind services</a>
        <p class="retail_part_text"><?php the_field('retail_part_text'); ?></p>
                <a href="<?php echo get_permalink('  ............  ') ?>" class="button blue">Discover Retail services</a>

</div>


<!-- Meet our team  Section -->

<div class="meet_our_team">
    <h4 class="article_title article_title_meet_our_team">Meet our team</h4>

<!-- search function  (meet our team) -->

<!-- button "Show more" with hover efect  (meet our team) -->


            <a href="<?php echo get_permalink('  ............  ') ?>" class="button blue">Show more</a> <!-- ???? -->

</div>


<!-- Join or Contact us  Section -->

<div class="join_or_contact_us">
    <h5 class="article_title article_title_want_to_join"><?php the_field('article_title_want_to_join'); ?></h5>
    <img class="about-us-page join_or_contact_us_collage_img " src="  ............  " alt=""> 
        <p class="subtitle_of_article_want_to_join"><?php the_field('subtitle_of_article_want_to_join'); ?></p>
            <a href="<?php echo get_permalink('  ............  ') ?>" class="button blue">Work for us</a>
            <a href="<?php echo get_permalink('  ............  ') ?>" class="button light blue">Work with us</a>

</div>


<!-- Company history  Section (povered and coded by atother clobotics team) -->

<div class="company_history">
    <h6 class="article_title article_title_company_history">Company History</h6>
</div>
<!-- !!!!!!!!!!!!!!! -->



<!-- News Articles linking  Section -->

<div class="company_history">
    <h7 class="article_title article_title_news_articles_linking">Discover Clobotics with our articles!</h7>

</div>


<!-- Subscribes for more  Section -->

<div class="subscribes_for_more">
    <p class="article_title_subscribes_for_more">Subscribes for more!</p>

    <div class="social_media">
        <a class="social_media icon_vimeo" href="<?php echo get_permalink('  ............  ') ?>" class="button">Work for us</a>
        <p class="social_media text">Wind</p>
        <a class="social_media icon_linkedin_1" href="<?php echo get_permalink('  ............  ') ?>" class="button">Work for us</a>
        <p class="social_media text">Retail</p>
        <a class="social_media icon_linkedin_2" href="<?php echo get_permalink('  ............  ') ?>" class="button">Work for us</a>
        <p class="social_media text">Vimeo</p>
    </div>

</div>





</body>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
