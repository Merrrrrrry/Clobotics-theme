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
        <div class="search-bar" id="search-bar">
            <form id="search-form">
                <input type="text" name="search_query" id="search-input" placeholder="Search...">
                <button type="submit">Search</button>
            </form>
        </div>

        <!-- Open Positions section/Job list -->
        <div class="open-positions" id="search-results">
            <!-- Search results will be displayed here -->
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add event listener to the search form
        document.getElementById('search-form').addEventListener('submit', function(event) {
            // Prevent the default form submission behavior
            event.preventDefault();

            // Get the search query
            var searchQuery = document.getElementById('search-input').value.trim();
            if (searchQuery === '') {
                return; // Do nothing if the search query is empty
            }

            // Fetch search results using AJAX
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '<?php echo admin_url('admin-ajax.php'); ?>?action=search_positions&search_query=' + encodeURIComponent(searchQuery), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Replace the content with the search results
                    document.getElementById('search-results').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        });
    });
    </script>
</body>

<?php get_footer(); ?>
