<?php
/*
Template Name: About us
*/
?>

<?php get_header(); ?>
<?php 
    wp_enqueue_style("owl-carousel-style", get_stylesheet_directory_uri() . "/js/plug-ins/OwlCarousel2/owl.carousel.min.css");
    wp_enqueue_style("owl-carousel-style-theme", get_stylesheet_directory_uri() . "/js/plug-ins/OwlCarousel2/owl.theme.default.min.css");
    wp_enqueue_style("owl-carousel-custom-styles", get_stylesheet_directory_uri() . "/css/custom.owl-carousel.css");

    wp_enqueue_style("owl-carousel-mobi-styles", get_stylesheet_directory_uri() . "/css/mobi.css");
?>
<body>
<main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>



<!-- Hero section -->
    
        <div class="hero-section">
            <div class="hero-section-background white_svg">
                <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_about_us_page_1.jpg" alt="Hero image">
            </div>
            <div class="hero-section-content">
                <h1 class="title hero-title"> Meet Clobotics - vision technology company with offices all around the world </h1>
                <p class="hero-slogan"> </p>
            </div>
        </div> 


<!-- Hero Video (referenced from busters world) -->

    <!-- <video autoplay muted loop class="video-background"> 
        <source src="<?php echo get_template_directory_uri(); ?>/video/video-top.mp4" type="video/mp4">
    </video> -->



<!-- Article  Section -->
<!-- Who we are -->

<section class="article_main who-we-are">
    <img  class="who-we-are-img_1" src="<?php echo get_template_directory_uri(); ?>/media/about_us_imgs/Group1.png" alt="Article img">
    <div class="who-we-are_content">
        <h2 class="title section-title"><?php the_field('article_title_who_we_are'); ?></h2>
        <p class="subtitle"><?php the_field('subtitle_of_article_who_we_are'); ?></p>
        <p class="text"><?php the_field('article_text_who_we_are'); ?></p>
    </div>        <!-- <div class="container_to_center"> <a href="" class="btn">Video presentation</a></div> -->

</section>


<!-- Article  Section -->
<!-- One company Two directions --> 

<section class="article_secondary_main one_company_two_directions" style="text-align: center;">

    <img  class="two_directions_collage_img" src="<?php echo get_template_directory_uri(); ?>/media/about_us_imgs/Group2.png" alt="Article img">
    <h3 class="title section-title dark_line" style="margin: -13em 0 0 0;"><?php the_field('article_title_one_company_two_directions'); ?></h3>

    <div class="right_and_left">        
        <div class="left flex">
                <p class="text"><?php the_field('wind_part_text'); ?></p>
                <a style="margin: 1em 43px auto;;" href="http://maria-grysevych.dk/clobotics/home/wind-services/" class="btn">Discover Wind services</a>
        </div>
        <div class="right flex">
                <p class="text"><?php the_field('retail_part_text'); ?></p>
                <a style="margin: 1em auto 43px;" href="http://maria-grysevych.dk/clobotics/home/retail-services/" class="btn">Discover Retail services</a>
        </div>
    </div>

</section>



<!-- Meet our team Section (new, with filters)-->
<section id="meet_our_team" style="background-size: cover; height: auto;">
    <h2 class="title">Meet our team</h2>
    
    <section class="filters_container">
        <!-- Filters for Regions -->
        <div id="region-filters" class="filters">
        <select id="region-select" class="filter-select">
            <option class=" " value="all">All regions</option>
            <option class=" " value="Asia">Asia</option>
            <option class=" " value="Europe">Europe</option>
            <option class=" " value="America">America</option>
        </select>
    </div> 
    <!-- Filters for Positions -->
    <div id="position-filters" class="filters">
        <button class="filter-btn" data-filter="all">All</button>
        <button class="filter-btn" data-filter="CEO">CEO</button>
        <button class="filter-btn" data-filter="Engineer">Engineer</button>
        <button class="filter-btn" data-filter="Sales Manager">Sales Manager</button>
        <button class="filter-btn" data-filter="Project Coordinator">Project Coordinator</button>
    </div>
     </section>


    <!-- loop function  (meet our team) -->
    <div class="meet-our-team_main_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'Employee', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $name = get_field("name_and_surname");
            $position = get_field("job_position");
            $region = get_field("region"); // 'region' is a custom field 
            $image = get_field('portrait_image');
            $first_social_media_link = get_field("link_for_employees_first_social_media");
            $first_social_media_icon = get_field('picture_of_employees_first_social_media');
            $second_social_media_link = get_field("link_for_employees_second_social_media");
            $second_social_media_icon = get_field('picture_of_employees_second_social_media');
        ?>
        
        <div class="meet-our-team-box-content box-shadow-inset" data-position="<?php echo esc_attr($position); ?>" data-region="<?php echo esc_attr($region); ?>">
            <img src="<?php echo esc_url($image["url"]); ?>" alt="Portrait of <?php echo esc_attr($name); ?>">
            <p class="title thin" style="margin-right: 30px;"><?php echo esc_html($name); ?></p>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($position); ?></p>

            <div class="employee_sm_container">
                <a id="link_for_employees_first_social_media" href="<?php echo esc_url($first_social_media_link); ?>"><img class="employee_sm_single_img" src="<?php echo esc_url($first_social_media_icon["url"]); ?>" alt="icon of first social media"></a>
                <?php if ($second_social_media_icon) { ?>
                    <a id="link_for_employees_second_social_media" href="<?php echo esc_url($second_social_media_link); ?>"><img class="employee_sm_single_img" src="<?php echo esc_url($second_social_media_icon["url"]); ?>" alt="icon of second social media"></a>
                <?php } ?>
            </div>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </div>
    
<!-- Show More Button -->
    <div class="container_to_center"> 
        <a href="javascript:void(0);" class="btn optional" id="show-more-btn" class="btn optional">Show more</a>
        <!-- Show Less Button -->
        <a href="javascript:void(0);" class="btn optional" id="show-less-btn" style="display: none;">Show less</a>
    </div>
</section>



<!-- Join or Contact us  Section -->

<section class="join_us_container">

    <img  class="join_or_contact_collage_img" src="<?php echo get_template_directory_uri(); ?>/media/about_us_imgs/Group3.jpg" alt="Article img">
    <div class="join_us_content_container">
        <h3 class="title title_special white"><?php the_field('article_title_want_to_join'); ?></h3>
        <p class="subtitle_special white"><?php the_field('subtitle_of_article_want_to_join'); ?></p>
        <div class="join_or_contact_us_btns">
            <a href="<?php echo esc_url(get_permalink(get_page_by_path('career'))); ?>"class="btn">Work for us</a>  
            <a href="http://maria-grysevych.dk/clobotics/home/wind-services/contact"class="btn light">Work with us</a>  
        </div>
    </div>

</section>


<!-- Company History Timeline Section -->
<h2 class="title">Company History</h2>

<section class="company-history-container">
    <?php
    // Query the company history posts
    $args = array(
        'post_type' => 'company_history',
        'posts_per_page' => -1,
        'orderby' => 'meta_value',
        'meta_key' => 'year_history', 
        'order' => 'ASC'
    );
    $company_history_query = new WP_Query($args);

    if ($company_history_query->have_posts()) :
        while ($company_history_query->have_posts()) : $company_history_query->the_post();

            // Retrieve custom fields
            $month_history = get_field('month_history');
            $year_history = get_field('year_history');
            $logo_history = get_field('logo_history');
            $text_history = get_field('text_history');

            ?>
            <div class="company-history-item">
                <div class="company-history-left">
                    <div class="company-history-date">
                        <h6 class="company-history-month"><?php echo esc_html($month_history); ?></h6>
                        <h6 class="company-history-year"><?php echo esc_html($year_history); ?></h6>
                    </div>
                </div>
                <div class="company-history-center">
                    <?php if ($logo_history) : ?>
                        <div class="company-history-logo">
                            <img src="<?php echo esc_url($logo_history['url']); ?>" alt="<?php echo esc_attr($logo_history['alt']); ?>">
                        </div>
                    <?php else : ?>
                        <div class="company-history-dot"></div> <!-- Use a bullet point if no logo -->
                    <?php endif; ?>
                    <div class="company-history-line"></div>
                </div>
                <div class="company-history-right">
                    <div class="company-history-text">
                        <h6><?php echo wp_kses_post($text_history); ?></h6>
                    </div>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();
    else :
        // No posts found
        ?>
        <p>No company history found.</p>
    <?php endif; ?>
</section>


<!-- News Articles linking  Section -->

 <section class="news_articles_linking">
    <h3 class="title">Discover Clobotics with our articles!</h3>

    <div class="news_articles_linking_container owl-carousel owl-theme">
        <?php $loop = new WP_Query( array( 'post_type' => 'new-article', 'posts_per_page' => -1 ) ); ?>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            
            <div class="news_articles_single_container">
                    <a href="<?php the_permalink(); ?>">
                        <?php
                        $image = get_field('article_main_image');
                        if ($image) :
                            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                        endif;
                        ?>
                        <div class="white_container_for_linking">
                            <h3><?php the_field('new_article_title'); ?></h3>
                            <p><?php the_field('meta_description_short'); ?></p>
                            <p class="article-category"><?php echo get_field('article_category'); ?></p>
                        </div>
                    </a>
                    </div>           

        <?php endwhile; wp_reset_query(); ?>
    </div>

</section>



<!-- Subscribes for more  Section -->

<section class="subscribe-section" style="background-image: url('<?php echo get_template_directory_uri(); ?>/media/sm-bg-rounded.png">
    <div class="content-wrapper">
        <h2>Subscribe for more!</h2>
        <div class="social-icons">
            <a href="https://www.linkedin.com/company/cloboticswindservices/">
                <img src="<?php echo get_template_directory_uri(); ?>/media/linkedin-logo.png" alt="LinkedIn"> <br>
                <span>Wind</span>
            </a>
            <a href="https://www.linkedin.com/company/clobotics/">
                <img src="<?php echo get_template_directory_uri(); ?>/media/linkedin-logo.png" alt="LinkedIn"> <br>
                <span>Retail</span>
            </a>
            <a href="https://vimeo.com/681845431">
                <img src="<?php echo get_template_directory_uri(); ?>/media/vimeo-logo.png" alt="Vimeo"> <br>
                <span>Vimeo</span>
            </a>
        </div>
    </div>
</section>



</main>
</body>
    <?php endwhile; ?>
    

<?php 
    wp_enqueue_script("jquery", "https://code.jquery.com/jquery-1.12.1.min.js");
    wp_enqueue_script("carousel-script", get_stylesheet_directory_uri()."/js/plug-ins/OwlCarousel2/owl.carousel.min.js");
?>
<script>
    jQuery(document).ready(function($) {
        applyOwlCarousel({
            loop: true,
            items:1,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 6000,
            animateOut: 'fadeOut',
            lazyLoad: true,
        })
    });
</script>

<?php get_footer(); ?>
