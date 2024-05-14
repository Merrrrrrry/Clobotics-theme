<footer class="footer">
    <div class="footer-column">
        <img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/media/clobotics-logo-white.png" alt="Clobotics Logo">
    </div>
    <div class="footer-column">
        <h2 class="footer-title">Company</h2>
        <ul class="footer-menu">
            <li><a href="<?php echo get_permalink( 'about-us' ); ?>">About us</a></li>
            <li><a href="<?php echo get_permalink( 'career' ); ?>">Career</a></li>
            <li><a href="<?php echo get_permalink( 'articles' ); ?>">Articles</a></li>
            <li><a href="media">Media</a></li>
        </ul>
    </div>
    <div class="footer-column">
        <h2 class="footer-title">Services</h2>
        <ul class="footer-menu">
            <li><a href="wind-services">Wind</a></li>
            <li><a href="retail-services-page">Retail</a></li>
        </ul>
    </div>
    <div class="footer-column">
        <h2 class="footer-title">Get in touch</h2>
        <a href="contact-us" class="footer-contact-link">Contact us <i class="arrow_right_alt"></i></a>
    </div>
    
    <div class="copyright">
        © 2024 CLOBOTICS ALL RIGHTS RESERVED - <a href="privacy-cookie-policy">PRIVACY & COOKIE POLICY</a>
    </div>
    
    <div class="social-icons">
        <img src=".png" alt="LinkedIn">
        <span>Wind</span>
        <img src=".png" alt="LinkedIn">
        <span>Retail</span>
        <img src="n.png" alt="Vimeo">
        <span>Vimeo</span>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
