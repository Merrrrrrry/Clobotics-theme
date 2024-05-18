<?php
/*
Template Name: Contact
*/
?>

<?php get_header() ?>
    
    <?php while(have_posts()): the_post() ?>
  
 <body class="gray-body">


<!--  Hero section  -->

        <div class="hero-section">
            <div class="hero-section-background">
                <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_contact_us.jpg" alt="Hero image">
            </div>
            <div class="hero-section-content">
                <h1 class="hero-title">Contact Clobotics filling our contact form <br> and we will get in touch with you.</h1>
            </div>
        </div> 


<!--- Contact form section --->

<section>
    <div class="contact-form">
        <?php echo do_shortcode( '[contact-form-7 id="8f0e96f" title="Clobotics contact form"]' ); ?>
    </div>
</section>


 <!-- Clobotics contact your office -->
 <section class="contact-section">
  <h2 class="section-title">Contact Your Local Office</h2>
  <div class="section-content">
        <div class="section-one">
        <video id="sectionVideo" autoplay loop muted playsinline preload="auto" width="360px">
        <source src="<?php echo get_template_directory_uri(); ?>/media/Earth Globe 2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        </div>
    <div class="section-two">
      <h3 class="subsection-title">China</h3>
      <div class="location-info">
      <div class="contact-info">
        <div class="phone">
            <i class="material-icons">call</i> 
            <p><?php the_field('china_phone'); ?></p>
        </div>
        <div class="mail">
            <i class="material-icons">mail</i> 
            <p><?php the_field('china_mail'); ?></p>
        </div>
        <div class="location">
            <i class="material-icons">location_on</i> 
            <p><?php the_field('china_location'); ?></p>
        </div>
        </div>
      </div>
    </div>
    <div class="section-three">
      <h3 class="subsection-title">USA</h3>
      <div class="location-info">
      <div class="contact-info">
        <div class="phone">
            <i class="material-icons">call</i> 
            <p><?php the_field('usa_phone'); ?></p>
        </div>
        <div class="mail">
            <i class="material-icons">mail</i> 
            <p><?php the_field('usa_mail'); ?></p>
        </div>
        <div class="location">
            <i class="material-icons">location_on</i> 
            <p><?php the_field('usa_location'); ?></p>
        </div>
        </div>
      </div>
    </div>
    <div class="section-four">
      <h3 class="subsection-title">Denmark</h3>
      <div class="location-info">
      <div class="contact-info">
        <div class="phone">
            <i class="material-icons">call</i> 
            <p><?php the_field('denmark_phone'); ?></p>
        </div>
        <div class="mail">
            <i class="material-icons">mail</i> 
            <p><?php the_field('denmark_mail'); ?></p>
        </div>
        <div class="location">
            <i class="material-icons">location_on</i> 
            <p><?php the_field('denmark_location'); ?></p>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
<?php endwhile ?>
</main>
<?php get_footer() ?>