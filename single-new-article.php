<?php
/*
Template Name: single-new-article
*/
?>

<?php get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <!-- Hero section -->
        <div class="hero-section">
            <div class="hero-section-background white_svg">
                <img class="image-hero" id="article_main_img" src="<?php $image = get_field('article_main_image'); echo esc_url($image["url"]); ?>" alt="Main image of article" /> 
            </div>

            <div class="hero-section-content">
                <h1 class="title hero-title"><?php the_field('new_article_title'); ?></h1>
            </div>
        </div>

        <article style="margin: 5em;">
            <h2><?php the_field('meta_description_short'); ?></h2>

            <?php for ($i = 1; $i <= 6; $i++): ?>
                <?php if (get_field("new_article_subtitle_$i")): ?>
                    <h3><?php the_field("new_article_subtitle_$i"); ?></h3>
                <?php endif; ?>

                <?php if (get_field("new_article_paragraph_$i")): ?>
                    <p><?php the_field("new_article_paragraph_$i"); ?></p>
                <?php endif; ?>

                <?php for ($j = 1; $j <= 2; $j++): ?>
                    <?php $image = get_field("new_article_image_" . (($i - 1) * 2 + $j)); ?>
                    <?php if ($image): ?>
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                    <?php endif; ?>
                <?php endfor; ?>
            <?php endfor; ?>
        </article>
    <?php endwhile; ?>
</main>


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

<?php get_footer(); ?>
