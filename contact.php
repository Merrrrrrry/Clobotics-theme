




<!--- Contact form section --->

<section class="contact-form-container" style="background-image: <?php $image = get_field('contact-form-image'); ?>">
    <h4 class="contact-form-heading"><?php the_field('form_heading'); ?></h4>
    <div class="contact-form">
        <?php echo do_shortcode( '[contact-form-7 id="2e0ef46" title="Secure your business"]' ); ?>
    </div>
</section>