<?php
/*
Template Name: Wind services
*/
?>

<?php get_header(); ?>


<body>
<main>




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


    
<!-- Search bar -->
<div class="search-bar-container-2">
    <form id="search-form-2" method="get" action="<?php echo esc_url(get_permalink()); ?>" class="search-form-2">
        <div class="search-bar-2">
            <input type="text" name="search_query" id="search-input-2" placeholder="Search...">
            <button type="submit" class="search-button">
                <span class="material-icons search-icon">search</span>
            </button>
        </div>
    </form>
</div>

<!-- Wind services list -->
<ul id="service-list" class="service-list">
    <?php
    $search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';

    // Retrieve wind services
    $args = array(
        'post_type' => 'wind-service',
        'posts_per_page' => -1,
        's' => $search_query,
    );

    $all_services = new WP_Query($args);

    if ($all_services->have_posts()) :
        $counter = 0;
        while ($all_services->have_posts()) : $all_services->the_post();
            if ($counter % 3 === 0 && $counter !== 0) {
                echo '</ul><ul id="service-list" class="service-list">'; // Close the row and start a new one every 3 items
            }

            // Retrieve the image URL and alt text
            $image = get_field('service_main_image');
            $image_url = !empty($image) ? esc_url($image['url']) : '';
            ?>
            <li class="service-item" style="background-image: url('<?php echo $image_url; ?>');">
                <div class="overlay">
                    <h3 class="service-title"><?php the_field('service_title'); ?></h3>
                </div>
                <div class="service-content">
                    <div class="service-keypoints">
                        <div class="keypoint">
                            <?php
                            $icon1 = get_field('icon_of_the_keypoint_1');
                            if ($icon1) : ?>
                                <img src="<?php echo esc_url($icon1['url']); ?>" alt="<?php echo esc_attr($icon1['alt']); ?>" class="keypoint-icon">
                            <?php endif; ?>
                            <p><?php the_field('1st_keypoint'); ?></p>
                        </div>
                        <div class="keypoint">
                            <?php
                            $icon2 = get_field('icon_of_the_keypoint_2');
                            if ($icon2) : ?>
                                <img src="<?php echo esc_url($icon2['url']); ?>" alt="<?php echo esc_attr($icon2['alt']); ?>" class="keypoint-icon">
                            <?php endif; ?>
                            <p><?php the_field('2nd_keypoint'); ?></p>
                        </div>
                        <div class="keypoint">
                            <?php
                            $icon3 = get_field('icon_of_the_keypoint_3');
                            if ($icon3) : ?>
                                <img src="<?php echo esc_url($icon3['url']); ?>" alt="<?php echo esc_attr($icon3['alt']); ?>" class="keypoint-icon">
                            <?php endif; ?>
                            <p><?php the_field('3rd_keypoint'); ?></p>
                        </div>
                    </div>
                    <a href="<?php the_permalink(); ?>" class="btn">Read more</a>
                </div>
            </li>
            <?php
            $counter++;
        endwhile;
        wp_reset_postdata();
    else : ?>
        <p class="service-subtitle">No wind services available.</p>
    <?php endif; ?>
</ul>
















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

</main>
</body>


<?php get_footer(); ?>