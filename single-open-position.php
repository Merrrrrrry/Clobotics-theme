<?php
/*
Template Name: single-open-position
*/
?>


<?php get_header(); ?>

<main>
    <!--- Apply button --->

    <a id="apply-button" href="#" class="btn">Apply</a>

     <!--- Information about the job position --->

    <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
        <h2><?php the_field('job_title'); ?></h2>
            <p><strong>Location:</strong> <?php the_field('job_location'); ?></p>
            <p><strong>Job Type:</strong> <?php the_field('job_type'); ?></p>
            <p><strong>Deadline:</strong> <?php the_field('deadline'); ?></p>
            <p><strong><?php the_field('headline-1'); ?></strong></p>
            <p><?php the_field('paragraph-1'); ?></p>
            <p><strong><?php the_field('headline-2'); ?></strong></p>
            <p><?php the_field('paragraph-2'); ?></p>
            <p><strong><?php the_field('headline-3'); ?></strong></p>
            <p><?php the_field('paragraph-3'); ?></p>
            <p><strong><?php the_field('headline-4'); ?></strong></p>
            <p><?php the_field('paragraph-4'); ?></p>
        </article>

        <!--- Find more about Clobotics button --->
        <a href="page-about_us.php" class="btn dark">Read more about Clobotics</a>


         <!--- Contact Person --->

        <!--- Apply for job contact form --->


    <section id="contact-form-section">
        <div class="contact-form-career">
             <?php echo do_shortcode( '[contact-form-7 id="c48fb62" title="Apply for the position"]' ); ?>
        </div>
    </section>


    <?php endwhile; ?>
</main>

<?php get_footer(); ?>



