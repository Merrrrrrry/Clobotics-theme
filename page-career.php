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

        <!-- Search bar and filters -->
        <div class="search-bar-container">
            <form id="search-form" method="get" action="<?php echo esc_url(get_permalink()); ?>" class="search-form">
                <div class="search-bar">
                    <input type="text" name="search_query" id="search-input" placeholder="Search...">
                    <button type="submit" class="search-button">
                        <span class="material-icons search-icon">search</span>
                    </button>
                </div>
                <div class="filters">
                    <select name="sector" id="sector">
                        <option value="">All Sectors</option>
                        <option value="wind">Wind</option>
                        <option value="retail">Retail</option>
                    </select>
                    <select name="region" id="region">
                        <option value="">All Regions</option>
                        <option value="europe">Europe</option>
                        <option value="americas">Americas</option>
                        <option value="asia">Asia</option>
                    </select>
                    <select name="job_type" id="job_type">
                        <option value="">All Job Types</option>
                        <option value="full_time">Full time</option>
                        <option value="part_time">Part time</option>
                    </select>
                    <button type="submit" class="filter-button">
                        <span class="material-icons search-icon">search</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Open Positions section/Job list -->
        <div class="open-positions">
            <h2 class="title">Open Positions</h2>

            <!-- Gap -->
            <div style="height: 10px;"></div>

            <ul id="position-list" class="position-list">
                <?php
                // Initial load: Display all job positions
                $args = array(
                    'post_type' => 'open-position',
                    'posts_per_page' => -1,
                );

                $all_positions = new WP_Query($args);

                if ($all_positions->have_posts()) :
                    while ($all_positions->have_posts()) : $all_positions->the_post(); ?>
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
                    <?php endwhile;
                    wp_reset_postdata();
                else : ?>
                    <p class="job-subtitle">No open positions available.</p>
                <?php endif; ?>
            </ul>
        </div>

        <!-- Gap between sections -->
        <div style="height: 100px;"></div>

        <!-- Image slide-show -->
        <div class="images-career">
            <div class="image-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-1.png" alt="career-img-1">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-2.png" alt="career-img-2">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-3.png" alt="career-img-3">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-4.png" alt="career-img-4">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-5.png" alt="career-img-5">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-6.png" alt="career-img-6">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-1.png" alt="career-img-1">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-2.png" alt="career-img-2">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-3.png" alt="career-img-3">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-4.png" alt="career-img-4">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-5.png" alt="career-img-5">
                <img src="<?php echo get_template_directory_uri(); ?>/media/career-img-6.png" alt="career-img-6">
            </div>
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
        <div style="height: 50px;"></div>
    </main>
</body>

<?php get_footer(); ?>
