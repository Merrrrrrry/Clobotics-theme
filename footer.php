<footer class="footer">
    <div class="footer-column">
        <img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/media/clobotics-logo-white.png" alt="Clobotics Logo">
    </div>
    <div class="footer-column">
        <p class="footer-title">Company</p>
        <ul class="footer-menu">
            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('about-us'))); ?>">About us</a></li>
            <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('career'))); ?>">Career</a></li>
            <li><a href="http://maria-grysevych.dk/clobotics/home/wind-services/articles/">Articles</a></li>
            <li><a href="http://maria-grysevych.dk/clobotics/home/wind-services/media-files/">Media</a></li>
        </ul>
    </div>
    <div class="footer-column">
        <p class="footer-title">Services</p>
        <ul class="footer-menu">
            <!-- <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('wind-services'))); ?>">Wind</a></li> -->
            <li><a href="http://maria-grysevych.dk/clobotics/home/wind-services/">Wind</a></li>
            <!-- <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('retail-services'))); ?>">Retail</a></li> -->
            <li><a href="http://maria-grysevych.dk/clobotics/home/retail-services/">Retail</a></li>
        </ul>
    </div>
    <div class="footer-column">
        <p class="footer-title">Get in touch</p>
        <a href="http://maria-grysevych.dk/clobotics/home/wind-services/contact" class="footer-contact-link">Contact us<i class="material-icons">arrow_right_alt</i></a>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

