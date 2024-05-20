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

    <!-- Information about the job position -->
    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <div class="job-info">
                <div class="info-item">
                    <div class="info-label">
                        <i class="material-icons">calendar_month</i>
                        <span>Deadline</span>
                    </div>
                    <div class="info-value"><?php the_field('deadline'); ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="material-icons">work</i>
                        <span>Job Type</span>
                    </div>
                    <div class="info-value"><?php the_field('job_type'); ?></div>
                </div>
                <div class="info-item">
                    <div class="info-label">
                        <i class="material-icons">location_on</i>
                        <span>Location</span>
                    </div>
                    <div class="info-value"><?php the_field('job_location'); ?></div>
                </div>
            </div>

            <div class="job-description">
                <p><?php the_field('headline-1'); ?></p>
                <p><?php the_field('paragraph-1'); ?></p>
                <p><?php the_field('headline-2'); ?></p>
                <p><?php the_field('paragraph-2'); ?></p>
                <p><?php the_field('headline-3'); ?></p>
                <p><?php the_field('paragraph-3'); ?></p>
                <p><?php the_field('headline-4'); ?></p>
                <p><?php the_field('paragraph-4'); ?></p>
            </div>

        </article>


        <!-- Find more about Clobotics button -->
        <a href="page-about_us.php" class="btn dark">Read more about Clobotics</a>

       

         <!-- Career contact person -->

            <h2 class="title">Contact person</h2>
        
            <div class="contact-person-career">
                <?php
           
                $args = array(
                    'post_type' => 'contact-person',
                    'posts_per_page' => 1
                );

                $contact_person_query = new WP_Query($args);

                if ($contact_person_query->have_posts()) :
                    while ($contact_person_query->have_posts()) : $contact_person_query->the_post();
                ?>
                    <div class="contact-person-image">
                        <img src="<?php echo get_field('contact_person_image')['url']; ?>" alt="<?php echo get_field('contact_person_image')['alt']; ?>">
                    </div>
                    <div class="contact-person-details">
                        <p><strong>Name:</strong> <?php the_field('contact_person_name'); ?></p>
                        <p><strong>Position:</strong> <?php the_field('contact_person_position'); ?></p>
                        <p><strong>Phone:</strong> <?php the_field('contact_person_phone'); ?></p>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
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
