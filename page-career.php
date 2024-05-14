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
            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" name="s" id="search-input" placeholder="Search...">
                <input type="hidden" name="post_type" value="open-position">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Open Positions section/Job list -->
        <div class="open-positions">
            <h2 class="title">Open Positions</h2>

            <!-- Gap -->
            <div style="height: 10px;"></div>

            <?php
            // Check if there is a search query
            if (isset($_GET['s']) && !empty($_GET['s'])) {
                $search_query = sanitize_text_field($_GET['s']);
                $args = array(
                    'post_type' => 'open-position',
                    'posts_per_page' => -1,
                    's' => $search_query,
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => 'job_title',
                            'value' => $search_query,
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key' => 'job_location',
                            'value' => $search_query,
                            'compare' => 'LIKE'
                        ),
                        array(
                            'key' => 'job_type',
                            'value' => $search_query,
                            'compare' => 'LIKE'
                        )
                    )
                );
            } else {
                // If no search query, show all open positions
                $args = array(
                    'post_type' => 'open-position',
                    'posts_per_page' => -1
                );
            }

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
                                echo esc_html($job_location) . ' <span class="job-type">' . esc_html($job_type) . '</span>';
                                ?>
                                <a href="<?php the_permalink(); ?>" class="btn">Learn more</a>
                            </p>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p class="job-subtitle">No open positions found for "<?php echo esc_html($search_query); ?>"</p>
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

        <?php
        $team = get_field('team');
        $team_members = get_field('team_members');
        $countries = get_field('countries');
        $cities = get_field('cities');
        ?>

        <!-- United Numbers Career section -->
        <div class="numbers-row">
            <div class="number-container">
                <h4 class="number"><?php echo esc_html($team); ?></h4>
                <h4 class="text">Team</h4>
            </div>
            <div class="number-container">
                <h4 class="number"><?php echo esc_html($team_members); ?></h4>
                <h4 class="text">Team Members</h4>
            </div>
            <div class="number-container">
                <h4 class="number"><?php echo esc_html($countries); ?></h4>
                <h4 class="text">Countries</h4>
            </div>
            <div class="number-container">
                <h4 class="number"><?php echo esc_html($cities); ?></h4>
                <h4 class="text">Cities</h4>
            </div>
        </div>

        <!-- Gap between sections -->
        <div style="height: 100px;"></div>

    </main>
</body>

<?php get_footer(); ?>
