<?php
/*
Template Name: Media 
*/
?>

<?php get_header(); ?>
<body class="gray-body">

<main>

    <?php while(have_posts()): the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>

<!--  Hero section  -->

        <div class="hero-section">
            <div class="hero-section-background">
                <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_media_page.jpg" alt="Hero image">
            </div>
            <div class="hero-section-content">
                <h1 class="hero-title">Mediafiles of Clobotics</h1>
                <p class="hero-slogan"> Download our media four your <br>articles or collaboration usage</p>
            </div>
        </div> 


<!-- Media Photos loop  (downloadable content section) -->
    <section class="media_photos_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-photos', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('photo_image');
            $name = get_field("photo_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">

            <img src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'">
            <a href="<?php echo esc_url($image["url"]); ?>" title="Downloadable image of <?php echo esc_attr($name); ?>">DOWNLOAD</a>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>

    

<!-- Media Videos loop  (downloadable content section) -->
    <section class="media_videos_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-video', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('video_clip');
            $name = get_field("video_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">            
            <img src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'">
            <a href="<?php echo esc_url($image["url"]); ?>" title="Downloadable vidio clip of <?php echo esc_attr($name); ?>">DOWNLOAD</a>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>



<!-- Media Certificates loop  (downloadable content section) -->
    <section class="media_certificates_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-certificate', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('certificate');
            $name = get_field("certificate_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <img src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'">
            <a href="<?php echo esc_url($image["url"]); ?>" title="Downloadable certificate '<?php echo esc_attr($name); ?>'">DOWNLOAD</a>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    



<!-- Media Company presentations loop  (downloadable content section) -->
    <section class="media_presentations_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-presentation', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('presentation');
            $name = get_field("presentation_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <img src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'">
            <a href="<?php echo esc_url($image["url"]); ?>" title="Downloadable presentation '<?php echo esc_attr($name); ?>'">DOWNLOAD</a>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>


    
<!-- Media Additional files loop  (downloadable content section) -->
    <section class="media_additional_files_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-additional-fil', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('additional_file');
            $name = get_field("file_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <img src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'">
            <a href="<?php echo esc_url($image["url"]); ?>" title="Downloadable file '<?php echo esc_attr($name); ?>'">DOWNLOAD</a>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    </section>



<!-- Media Mission, Vision and Values posters loop  (downloadable content section) -->
    <section class="media_additional_files_content">
        <?php 
        $loop = new WP_Query(array('post_type' => 'poster', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $image = get_field('poster_img');
            $name = get_field("poster_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <img src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'">
            <a href="<?php echo esc_url($image["url"]); ?>" title="Downloadable posters'<?php echo esc_attr($name); ?>'">>DOWNLOAD</a>
            <p class="subtitle" style="font-size: 24px; margin-right: 30px;"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    







</main>
    
</body>
<?php get_footer(); ?>