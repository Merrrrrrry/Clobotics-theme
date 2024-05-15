<?php
/*
Template Name: Privacy & cookie policy
*/
?>

<?php get_header(); ?>

<body>
    <main>
        <!-- Hero section -->
        <div class="hero-section">
            <div class="hero-section-background">
                <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/11.png" alt="Your Image Alt Text">
            </div>
            <div class="hero-section-content">
                <h1 class="hero-title">Privacy & Cookie Policy</h1>
            </div>
        </div>

        <!-- Space under hero section -->
        <div style="height: 50px;"></div>

        <!-- Download buttons -->
        <div class="download-buttons">
            <a href="<?php echo get_template_directory_uri(); ?>/pdf/privacy_policy.pdf" class="btn" download>
                <span class="material-icons">get_app</span>
                Download our Privacy Policy here
            </a>
            <a href="<?php echo get_template_directory_uri(); ?>/pdf/cookie_policy.pdf" class="btn" download>
                <span class="material-icons">get_app</span>
                Download our Cookie Policy here
            </a>
        </div>

    </main>
</body>

<?php get_footer(); ?>

