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
                <p class="text"><strong><?php the_field('headline-1'); ?></strong></p>
                <p class="text"><?php the_field('paragraph-1'); ?></p>
                <p class="text"><strong><?php the_field('headline-2'); ?></strong></p>
                <p class="text"><?php the_field('paragraph-2'); ?></p>
                <p class="text"><strong><?php the_field('headline-3'); ?></strong></p>
                <p class="text"><?php the_field('paragraph-3'); ?></p>
                <p class="text"><strong><?php the_field('headline-4'); ?></strong></p>
                <p class="text"><?php the_field('paragraph-4'); ?></p>
                    <div class="read-more-career-button">
                        <a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>" class="btn dark">Read more about Clobotics</a>
                </div>
            </div>
        </article>

            <!-- Gap between sections -->
        <div style="height: 50px;"></div>


        <div class="contact-form-container-career" id="contact-form-container-career">
            <!---- Career contact person ---->
            <div class="contact-person-career">
                <h2 class="title">Contact person</h2>
                <div class="contact-person-image">
                    <img src="<?php echo get_field('contact_person_image')['url']; ?>" alt="<?php echo get_field('contact_person_image')['alt']; ?>">
                </div>
                <div class="contact-person-details">
                    <p class="contact-person-name"><?php the_field('contact_person_name'); ?></p>
                    <p class="contact-person-position"><?php the_field('contact_person_position'); ?></p>
                    <div class="phone-career">
                        <i class="material-icons phone-career">call</i>
                        <p class="contact-person-phone"><?php the_field('contact_person_phone'); ?></p>
                    </div>
                    <div class="contact-links">
                        <?php if ($contact_mail_icon = get_field('contact_mail_icon')): ?>
                            <a href="mailto:<?php the_field('contact_person_mail'); ?>">
                                <img src="<?php echo $contact_mail_icon['url']; ?>" alt="<?php echo $contact_mail_icon['alt']; ?>">
                            </a>
                        <?php endif; ?>
                        <?php if ($contact_linkedin_icon = get_field('contact_linkedin_icon')): ?>
                            <a href="<?php the_field('contact_person_linkedin'); ?>" target="_blank">
                                <img src="<?php echo $contact_linkedin_icon['url']; ?>" alt="<?php echo $contact_linkedin_icon['alt']; ?>">
                            </a>
                        <?php endif; ?>
                        <?php if ($contact_vimeo_icon = get_field('contact_vimeo_icon')): ?>
                            <a href="<?php the_field('contact_person_vimeo'); ?>" target="_blank">
                                <img src="<?php echo $contact_vimeo_icon['url']; ?>" alt="<?php echo $contact_vimeo_icon['alt']; ?>">
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Apply for job contact form -->
            <div class="contact-form-career">
                <h2 class="title">Apply for the position</h2>
                <?php echo do_shortcode('[contact-form-7 id="c48fb62" title="Apply for the position"]'); ?>
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
