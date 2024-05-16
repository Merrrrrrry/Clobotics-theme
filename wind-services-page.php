<?php
/*
Template Name: Wind services
*/
?>

<?php get_header(); ?>

<main>


<body>

<!-- Hero section -->
<div class="hero-section">
    <div class="hero-section-background white_svg">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_wind_services.jpg" alt="Hero image">
    </div>

    <div class="hero-section-content">
        <h1 class="title hero-title">Wind Services</h1>
    </div>
</div>

    <!-- Hero Video (referenced from busters world) -->
    <!-- <div class="hero-section-background">
        <video autoplay muted loop class="video-background"> 
            <source src="<?php echo get_template_directory_uri(); ?> /....../..... .mp4" type="video/mp4">
        </video>

    </div> -->







<!-- Article  Section -->
<!-- We operate globally -->

<section class="we_operate_globally">
    <h2 class="title"><?php the_field('article_title_we_operate_globally'); ?></h2>

    <div class="we_operate_globally_container flex"> 

        <div class="half-size" id="text_container">
            <p class="text"><?php the_field('article_text_we_operate_globally'); ?></p> 
        </div>

        <div  class="half-size" id="buttons_switcher_container">
            <ul class="inline img_selector">
                <li onclick=show_our(this) class="selected">Our offices</li>
                <li onclick=show_our(this)>Our partners</li>
                <li onclick=show_our(this)>Our work</li>
            </ul>

                <img class="we_operate_globally-img" id="image_of_our_offices" src="<?php $image = get_field('image_of_our_offices_we_operate_globally_section');  echo esc_url($image["url"]); ?>" alt="Image of our offices (We operate globally section)" /> 
                <img class="we_operate_globally-img hidden" id="image_of_our_partners" src="<?php $image = get_field('image_of_our_partners_we_operate_globally_section');  echo esc_url($image["url"]); ?>" alt="Image of our partners (We operate globally section)" /> 
                <img class="we_operate_globally-img hidden" id="image_of_our_work" src="<?php $image = get_field('image_of_our_work_we_operate_globally_section');  echo esc_url($image["url"]); ?>" alt="Image of our work (We operate globally section)" /> 
                <img class="article_main_img" src="<?php $image = get_field('article_main_image');  echo esc_url($image["url"]); ?>" alt="Main image of article" /> 
        </div>
    </div>
</section>


<!-- Wind services presentation Video (code referenced from busters world) -->
<div class="wind_presentation_video">
    <video autoplay class="video-background"> 
        <source src="<?php echo get_template_directory_uri(); ?> /....../..... .mp4" type="video/mp4">
    </video>
</div>






<section class="we-take-care">
<img class="we-take-care-background-image" src="<?php echo get_template_directory_uri(); ?>/media/wind_blade.png" alt="We take care of your blades"> <br>
    <div class="we-take-care-content">
        <h2 class="we-take-care-text">
            WE TAKE <br>
            CARE OF <br>
            YOUR BLADES
        </h2>
        <div class="we-take-care-social-media">
        <div class="social-icons">
                    <a href="https://www.linkedin.com/company/cloboticswindservices/">
                    <img src="<?php echo get_template_directory_uri(); ?>/media/linkedin-logo.png"  alt="LinkedIn"> <br>
                    <span class="social_media_icon_text">Wind</span>
                </a>
                <a href="https://vimeo.com/681845431">
                    <img src="<?php echo get_template_directory_uri(); ?>/media/vimeo-logo.png" alt="Vimeo"> <br>
                    <span class="social_media_icon_text">Vimeo</span>
                </a>
            </div>
        </div>
    </div>
</section>


</body>

</main>
<?php get_footer(); ?>