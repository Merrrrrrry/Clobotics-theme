<?php
/*
Template Name: single-open-position
*/
?>

<?php get_header(); ?>

<main>
    <!-- Hero section -->
    <div class="hero-section">
        <div class="hero-section-background white_svg">
            <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_single_career_page.jpg" alt="Hero image">
        </div>
        <div class="hero-section-content">
            <h1 class="title hero-title"><?php the_field('job_title'); ?></h1>
        </div>
    </div>

    <a id="apply-button" href="#" class="btn">Apply</a>

    <!-- Gap -->
    <div style="height: 50px;"></div>

    <!-- Information about the job position -->
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        <div class="job-info">
                <div class="info-item">
                    <div class="info-label">
                        <i class="material-icons info-label">calendar_month</i>
                    </div>
                    <div class="info-value">
                        <span>Deadline</span>
                        <?php the_field('deadline'); ?>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="material-icons info-label">work</i>
                    </div>
                    <div class="info-value">
                        <span>Job Type</span>
                        <?php the_field('job_type'); ?>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="material-icons info-label">location_on</i>
                    </div>
                    <div class="info-value">
                        <span>Location</span>
                        <?php the_field('job_location'); ?>
                    </div>
                </div>
            </div>

            <div class="job-description">
                <p class="text"><?php the_field('headline-1'); ?></p>
                <p class="text"><?php the_field('paragraph-1'); ?></p>
                <p class="text"><?php the_field('headline-2'); ?></p>
                <p class="text"><?php the_field('paragraph-2'); ?></p>
                <p class="text"><?php the_field('headline-3'); ?></p>
                <p class="text"><?php the_field('paragraph-3'); ?></p>
                <p class="text"><?php the_field('headline-4'); ?></p>
                <p class="text"><?php the_field('paragraph-4'); ?></p>
                    <div class="read-more-career-button">
                        <a href="page-about_us.php" class="btn dark">Read more about Clobotics</a>
                </div>
            </div>
        </article>

        <!-- Career contact person -->
        <h2 class="title">Contact person</h2>
        <div class="contact-person-career">
            <div class="contact-person-image">
                <img src="<?php echo get_field('contact_person_image')['url']; ?>" alt="<?php echo get_field('contact_person_image')['alt']; ?>">
            </div>
            <div class="contact-person-details">
                <p><?php the_field('contact_person_name'); ?></p>
                <p><?php the_field('contact_person_position'); ?></p>
                <div class="phone-career">
                    <i class="material-icons phone-career">call</i>
                    <p><?php the_field('contact_person_phone'); ?></p>
                </div>
            </div>
        </div>

        <!-- Apply for job contact form -->
        <h2 class="title">Apply for the position</h2>
        <section id="contact-form-section">
            <div class="contact-form-career">
                <?php echo do_shortcode('[contact-form-7 id="c48fb62" title="Apply for the position"]'); ?>
            </div>
        </section>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
