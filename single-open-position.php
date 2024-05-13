<?php
/*
Template Name: single-open-position
*/
?>

<?php get_header(); ?>

<main>

    <!-- Hero section -->
    <div class="hero-section">
        <div class="hero-section-background">
            <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/11.png" alt="Your Image Alt Text">
        </div>
        <div class="hero-section-content">
            <h1 class="hero-title"><?php the_field('job_title'); ?></h1>
            <a id="apply-button" href="#" class="btn">Apply</a>
        </div>
    </div>

    <!-- Information about the job position -->
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <div class="job-info">
                <div class="info-item">
                    <i class="material-icons">date_range</i>
                    <span class="info-label">Deadline</span>
                    <span class="info-value"><?php the_field('deadline'); ?></span>
                </div>
                <div class="info-item">
                    <i class="material-icons">work</i>
                    <span class="info-label">Job Title</span>
                    <span class="info-value"><?php the_field('job_type'); ?></span>
                </div>
                <div class="info-item">
                    <i class="material-icons">location_on</i>
                    <span class="info-label">Location</span>
                    <span class="info-value"><?php the_field('job_location'); ?></span>
                </div>
            </div>
            <p><strong><?php the_field('headline-1'); ?></strong></p>
            <p><?php the_field('paragraph-1'); ?></p>
            <p><strong><?php the_field('headline-2'); ?></strong></p>
            <p><?php the_field('paragraph-2'); ?></p>
            <p><strong><?php the_field('headline-3'); ?></strong></p>
            <p><?php the_field('paragraph-3'); ?></p>
            <p><strong><?php the_field('headline-4'); ?></strong></p>
            <p><?php the_field('paragraph-4'); ?></p>
        </article>

        <!-- Find more about Clobotics button -->
        <a href="page-about_us.php" class="btn dark">Read more about Clobotics</a>

        <!-- Contact Person -->

        <!-- Apply for job contact form -->
        <section id="contact-form-section">
            <div class="contact-form-career">
                <?php echo do_shortcode( '[contact-form-7 id="c48fb62" title="Apply for the position"]' ); ?>
            </div>
        </section>

    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
