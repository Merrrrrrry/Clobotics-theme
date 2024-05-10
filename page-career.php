<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<main>
    
    <h1>Career at Clobotics</h1>

    <div class="search-bar">
        <form method="get" action="">
            <input type="text" name="search_query" id="search-input" placeholder="Search...">
            <button type="submit">Search</button>
        </form>
    </div>

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
                    <h3><?php the_field('job_title'); ?></h3>
                    <p>
                        <?php
                        $job_location = get_field('job_location');
                        $job_type = get_field('job_type');
                        echo $job_location . ' | ' . $job_type;
                        ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="learn-more">Learn more</a>
                </li>
            <?php endwhile; ?>
        </ul>
        <?php
        wp_reset_postdata();
    else :
        ?>
        <p>No open positions found for "<?php echo $search_query; ?>"</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>
