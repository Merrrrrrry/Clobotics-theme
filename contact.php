<?php
/*
Template Name: Contact
*/
?>

<?php get_header() ?>
    
    <?php while(have_posts()): the_post() ?>
  
<body>




<!--- Contact form section --->

<section>
    <div class="contact-form">
        <?php echo do_shortcode( '[contact-form-7 id="8f0e96f" title="Clobotics contact form"]' ); ?>
    </div>
</section>



</body>
<?php endwhile ?>
</main>
<?php get_footer() ?>