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
    <div class="hero-section-background white_svg">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_privacy_and_cookie_policy.jpg" alt="Hero image">
    </div>

    <div class="hero-section-content">
        <h1 class="title hero-title"> </h1>
    </div>
</div>


<!-- Hero section
<div class="hero-section">
    <div class="hero-section-background">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/11.png" alt="Your Image Alt Text">
    </div>
    <div class="hero-section-content">
        <h1 class="hero-title">Privacy & Cookie Policy</h1>
    </div>
</div> -->

         <!-- Gap section -->
         <div style="height: 40px;"></div>

        <!-- Download buttons -->
        <div class="download-buttons">
            <a class="btn" onclick="openPdf('<?php echo get_template_directory_uri(); ?>/media/download/Privacy_Policy.pdf');">
                <span class="material-icons">get_app</span>
                Download our Privacy Policy here
            </a>
            <a class="btn" onclick="openPdf('<?php echo get_template_directory_uri(); ?>/media/download/Cookie_Policy.pdf');">
                <span class="material-icons">get_app</span>
                Download our Cookie Policy here
            </a>
        </div>

        <!-- Gap section -->
        <div style="height: 40px;"></div>

    </main>
    
    <script>
        function openPdf(pdfUrl) {
            window.open(pdfUrl, '_blank');
        }
    </script>
</body>

<?php get_footer(); ?>
