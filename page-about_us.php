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
        <h1 class="title hero-title"> Meet Clobotics - vision technology company with offices all around the world </h1>
        <p class="hero-slogan"> </p>
    </div>
</div>



<!-- Article  Section -->
<!-- Who we are -->

<div class="article_main who-we-are">

    <h2 class="title"><?php the_field('article_title_who_we_are'); ?></h2>
    <p class="subtitle"><?php the_field('subtitle_of_article_who_we_are'); ?></p>
    <p class="text"><?php the_field('article_text_who_we_are'); ?></p>
        <a href="<?php echo get_permalink('  ............  ') ?>" class="btn">Video presentation</a>
        <img class="who-we-are-img left" src="  ............  " alt=""> 
        <img class="who-we-are-img right" src="  ............  " alt=""> 
</div>


<!-- Article  Section -->
<!-- One company Two directions -->

<div class="article_secondary_main one_company_two_directions">

    <img class="two_directions_collage_img " src="  ............  " alt=""> 
        <h3 class="title"><?php the_field('article_title_one_company_two_directions'); ?></h3>
        <p class="text"><?php the_field('wind_part_text'); ?></p>
                <a href="<?php echo get_permalink('  ............  ') ?>" class="btn">Discover Wind services</a>
        <p class="text"><?php the_field('retail_part_text'); ?></p>
                <a href="<?php echo get_permalink('  ............  ') ?>" class="btn">Discover Retail services</a>

</div>


<!-- Meet our team  Section -->

<section id="meet_our_team" style="background-size: cover; height: auto;">
    <h4 class="title">Meet our team</h4>

<!-- search function  (meet our team) -->


<!-- loop function  (meet our team) -->
<!--  <div class="loops_main_content_and_image" > -->

    <div class="meet-our-team_main_content">
        <?php $loop = new WP_Query( array( 'post_type' => 'Employee', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <div class="meet-our-team-box-content box-shadow-inset">
            <img src="<?php $image = get_field('portrait_image'); echo esc_url($image["url"]); ?>" alt="Portrait of <?php echo get_field("name_and_surname"); ?>">
            <p class="title thin" style="margin-right: 30px;" ><?php echo get_field("name_and_surname"); ?></p>
            <p class="subtitle" style="fond-size: 24px; margin-right: 30px;" ><?php echo get_field("job_position"); ?></p>

            <div class="employee_sm_container">
                <!-- <li onclick=show_our(this) class="selected">Our offices</li> -->
                <a id="link_for_employees_first_social_media" href="<?php echo get_field("link_for_employees_first_social_media") ?>" ><img class="employee_sm_single_img" src="<?php $image = get_field('picture_of_employees_first_social_media'); echo esc_url($image["url"]); ?>" alt="icon of first social media"></a>
                <?php 
                    $image = get_field('picture_of_employees_second_social_media');
                    // echo "<pre>"; print_r($image); echo "</pre>";
                    if($image !=="") {
                    // if(isset($image["url"])) {
                        echo '<a id="link_for_employees_second_social_media" href="'.get_field("link_for_employees_second_social_media").'" ><img class="employee_sm_single_img test" src="'.esc_url($image["url"]).'" alt="icon of second social media"></a>';                                               
                    }
                ?>
            </div>
        </div>
        <?php endwhile; wp_reset_query(); ?>
    </div>
    
 </section>


<!-- button "Show more" with hover efect  (meet our team) -->


    <a href="<?php echo get_permalink('  ............  ') ?>" class="btn optional">Show more</a> <!-- ???? -->



<!-- Join or Contact us  Section -->

<div class="join_or_contact_us">

    <h5 class="title"><?php the_field('article_title_want_to_join'); ?></h5>
    <img class="join_or_contact_collage_img " src="  ............  " alt=""> 
        <p class="subtitle"><?php the_field('subtitle_of_article_want_to_join'); ?></p>
            <a href="<?php echo get_permalink('  ............  ') ?>" class="btn">Work for us</a>
            <a href="<?php echo get_permalink('  ............  ') ?>" class="btn light">Work with us</a>

</div>


<!-- Company history  Section (povered and coded by atother clobotics team) -->

<div class="company_history">
    <h6 class="title">Company History</h6>
</div>
<!-- !!!!!!!!!!!!!!! -->



<!-- News Articles linking  Section -->

<div class="company_history">
    <h7 class="title">Discover Clobotics with our articles!</h7>

</div>


<!-- Subscribes for more  Section -->

<div class="subscribes_for_more">
    <p class="title medium">Subscribes for more!</p>

    <div class="social_media">
        <a class="social_media icon_vimeo" href="<?php echo get_permalink('  ............  ') ?>" >Work for us</a>
        <p class="social_media_ text">Wind</p>
        <a class="social_media icon_linkedin_1" href="<?php echo get_permalink('  ............  ') ?>" >Work for us</a>
        <p class="social_media_ text">Retail</p>
        <a class="social_media icon_linkedin_2" href="<?php echo get_permalink('  ............  ') ?>" >Work for us</a>
        <p class="social_media_ text">Vimeo</p>
    </div>

</div>


</body>
    <?php endwhile; ?>

</main>

<?php get_footer(); ?>
