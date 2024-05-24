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


        <!-- Section Headline -->
        <h2 class="title">Pictures</h2>
        <!-- Media Photos loop  (downloadable content section) -->
    <section class="media_content photos">
        
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-photos', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $file = get_field('photo_image');
            $name = get_field("photo_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <div class="preview_container"><div class="overlay blue"></div>
            <img class="preview_img" src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'"></div>
            <a class="btn downloadable_content_link" download="<?php echo preg_replace('/.*?\/([^\/]+)$/','$1',$file["url"]); ?>" href="<?php echo esc_url($file["url"]); ?>" title="Downloadable image of <?php echo esc_attr($name); ?>"><img class="download_icon" src="<?php echo get_template_directory_uri(); ?>/media/icon_download.png" alt="Download icon">Download</a>
            <p class="subtitle description_of_dwnld_file"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>

    

    <!-- Section Headline -->
    <h2 class="title">Videos and video clips</h2>
    <!-- Media Videos loop  (downloadable content section) -->
    <section class="media_content videos">    
            
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-video', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $file = get_field('video_clip');
            $name = get_field("video_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <div class="preview_container"><div class="overlay blue"></div>            
            <img class="preview_img" src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'"></div>
            <a class="btn downloadable_content_link" download="<?php echo esc_url(preg_replace('.*?\/([^\/]+)$','$1',$file["url"])); ?>" href="<?php echo esc_url($file["url"]); ?>" title="Downloadable vidio clip of <?php echo esc_attr($name); ?>"><img class="download_icon" src="<?php echo get_template_directory_uri(); ?>/media/icon_download.png" alt="Download icon">Download</a>
            <p class="subtitle description_of_dwnld_file"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>


    <!-- Section Headline -->
    <h2 class="title">Certificates</h2>
    
<!-- Media Certificates loop  (downloadable content section) -->
    <section class="media_content certificates">        

        <?php 
        $loop = new WP_Query(array('post_type' => 'media-certificate', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $file = get_field('certificate');
            $name = get_field("certificate_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <div class="preview_container"><div class="overlay blue"></div>
            <img class="preview_img" src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'"></div>
            <a class="btn downloadable_content_link" download="<?php echo esc_url(preg_replace('.*?\/([^\/]+)$','$1',$file["url"])); ?>" href="<?php echo esc_url($file["url"]); ?>" title="Downloadable certificate '<?php echo esc_attr($name); ?>'"><img class="download_icon" src="<?php echo get_template_directory_uri(); ?>/media/icon_download.png" alt="Download icon">Download</a>
            <p class="subtitle description_of_dwnld_file"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    


    <!-- Section Headline -->
    <h2 class="title">Company presentations</h2>
    
<!-- Media Company presentations loop  (downloadable content section) -->
    <section class="media_content presentations">        
    
        <?php 
        $loop = new WP_Query(array('post_type' => 'media-presentation', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $file = get_field('presentation');
            $name = get_field("presentation_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <div class="preview_container"><div class="overlay blue"></div>
            <img class="preview_img" src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'"></div>
            <a class="btn downloadable_content_link" download="<?php echo esc_url(preg_replace('.*?\/([^\/]+)$','$1',$file["url"])); ?>" href="<?php echo esc_url($file["url"]); ?>" title="Downloadable presentation '<?php echo esc_attr($name); ?>'"><img class="download_icon" src="<?php echo get_template_directory_uri(); ?>/media/icon_download.png" alt="Download icon">Download</a>
            <p class="subtitle description_of_dwnld_file"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>

    <!-- Section Headline -->
    <h2 class="title">Clobotics Posters</h2>
    
<!-- Media Mission, Vision and Values posters loop  (downloadable content section) -->
    <section class="media_content posters">        

        <?php 
        $loop = new WP_Query(array('post_type' => 'poster', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $file = get_field('poster_img');
            $name = get_field("poster_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <div class="preview_container"><div class="overlay blue"></div>
            <img class="preview_img" src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'"></div>
            <a class="btn downloadable_content_link" download="<?php echo esc_url(preg_replace('.*?\/([^\/]+)$','$1',$file["url"])); ?>" href="<?php echo esc_url($file["url"]); ?>" title="Downloadable posters'<?php echo esc_attr($name); ?>'"><img class="download_icon" src="<?php echo get_template_directory_uri(); ?>/media/icon_download.png" alt="Download icon">Download</a>
            <p class="subtitle description_of_dwnld_file"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    


    <!-- Section Headline -->
    <h2 class="title">Additional files</h2>
    
<!-- Media Additional files loop  (downloadable content section) -->
    <section class="media_content additional_files">        

        <?php 
        $loop = new WP_Query(array('post_type' => 'media-additional-fil', 'posts_per_page' => -1)); 
        while ($loop->have_posts()) : $loop->the_post(); 
            $file = get_field('additional_file');
            $name = get_field("file_description");
            $preview = get_field('preview_image');
        ?>
        
        <div class="downloadable-content">
            <div class="preview_container"><div class="overlay blue"></div>
            <img class="preview_img" src="<?php echo esc_url($preview["url"]); ?>" alt="Preview of '<?php echo esc_attr($name); ?>'"></div>
            <a class="btn downloadable_content_link" download="<?php echo esc_url(preg_replace('.*?\/([^\/]+)$','$1',$file["url"])); ?>" href="<?php echo esc_url($file["url"]); ?>" title="Downloadable file '<?php echo esc_attr($name); ?>'"><img class="download_icon" src="<?php echo get_template_directory_uri(); ?>/media/icon_download.png" alt="Download icon">Download</a>
            <p class="subtitle description_of_dwnld_file"><?php echo esc_html($name); ?></p>
        </div>
        
        
        <?php endwhile; wp_reset_query(); ?>
    </section>
    </section>



</main>
    
</body>
<?php get_footer(); ?>