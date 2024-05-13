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
<div class="open-positions">
    <h2 class="title">Open Positions</h2>

    <!-- Gap -->
    <div style="height: 10px;"></div>

    <?php
    $search_query = isset($_GET['search_query']) ? sanitize_text_field($_GET['search_query']) : '';
    $args = array(
        'post_type' => 'open-position',
        'posts_per_page' => -1,
        's' => $search_query,
    );
    $related_positions = new WP_Query($args);

    if ($related_positions->have_posts()) : ?>
        <ul class="position-list">
            <?php while ($related_positions->have_posts()) : $related_positions->the_post(); ?>
                <li class="position-item">
                    <h3 class="job-title"><?php the_field('job_title'); ?></h3>
                    <p class="job-subtitle">
                        <?php
                            $job_location = get_field('job_location');
                            $job_type = get_field('job_type');
                             echo $job_location . ' <span class="job-type">' . $job_type . '</span>';
                         ?>
                            <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                    </p>

                </li>
            <?php endwhile; ?>
        </ul>
        <?php
        wp_reset_postdata();
    else : ?>
        <p class="job-subtitle">No open positions found for "<?php echo $search_query; ?>"</p>
    <?php endif; ?>
</div>


        <!-- Gap between sections -->
        <div style="height: 100px;"></div>

    <!-- Image carousel -->
    <div class="carousel-container">
            <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-1.png" alt="career-img-1">
            <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-2.png" alt="career-img-2">
            <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-3.png" alt="career-img-3">
            <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-4.png" alt="career-img-4">
            <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-5.png" alt="career-img-5">
            <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-6.png" alt="career-img-6">
        </div>



        <!-- United Numbers Career section -->
<div class="united-numbers-career">
    <?php
    // Retrieve custom field data from the options page
    $team = get_field('team');
    $team_members = get_field('team_members');
    $countries = get_field('countries');
    $cities = get_field('cities');
    ?>

    <!-- Display retrieved data -->
    <div class="numbers-row">
        <div class="number"><?php echo $team; ?></div>
        <div class="text">Team</div>
        <div class="number"><?php echo $team_members; ?></div>
        <div class="text">Team Members</div>
        <div class="number"><?php echo $countries; ?></div>
        <div class="text">Countries</div>
        <div class="number"><?php echo $cities; ?></div>
        <div class="text">Cities</div>
    </div>
</div>

   <!-- Gap between sections -->
   <div style="height: 1000px;"></div>


    </main>
</body>

<?php get_footer(); ?>
