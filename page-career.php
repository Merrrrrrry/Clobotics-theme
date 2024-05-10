<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<body <?php body_class('gray-body'); ?>>
    <main>

    <!-- Hero section -->

        <div class="hero-section">
            <div class="hero-section-background">
                <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/11.png" alt="Your Image Alt Text">
        </div>
                <div class="hero-section-content">
                    <h1 class="hero-title">Career at Clobotics</h1>
                </div>
        </div>

    <!-- Search bar -->

    <div class="search-bar">
        <form method="get" action="">
            <input type="text" name="search_query" id="search-input" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Open Positions section/Job list -->

    <h2>Open Positions</h2>

    <?php
    
    $search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';

    
    $args = array(
        'post_type' => 'open-position', 
        'posts_per_page' => -1, 
        's' => $search_query, 
    );

    $related_positions = new WP_Query($args);

    if ($related_positions->have_posts()) :
        ?>
        <ul class="position-list">
            <?php while ($related_positions->have_posts()) : $related_positions->the_post(); ?>
                <li class="position-item">
                    <h3 class="job-title"><?php the_field('job_title'); ?></h3>
                    <p class="job-subtitle">
                        <?php
                        $job_location = get_field('job_location');
                        $job_type = get_field('job_type');
                        echo $job_location . ' | ' . $job_type;
                        ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php
        wp_reset_postdata();
    else :
        ?>
        <p class="job-subtitle">No open positions found for "<?php echo $search_query; ?>"</p>
    <?php endif; ?>

</main>
</body>
    

<?php get_footer(); ?>
