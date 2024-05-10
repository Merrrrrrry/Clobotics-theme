<?php
/*
Template Name: Career
*/
?>

<?php get_header(); ?>

<main>

    <h2>Open Positions</h2>

    <?php
    
    $related_positions = get_field('related_job_positions');

    if ($related_positions) :
        ?>
        <ul class="position-list">
            <?php foreach ($related_positions as $post) : setup_postdata($post); ?>
                <li class="position-item">
                    <h2><?php the_field('job_title'); ?></h2>
                    <p>
                        <?php
                        $job_location = get_field('job_location');
                        $job_type = get_field('job_type');
                        echo $job_location . ' | ' . $job_type;
                        ?>
                    </p>
                    <a href="<?php the_permalink(); ?>" class="learn-more">Learn more</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php
       
        wp_reset_postdata();
    else :
        ?>
        <p>No open positions currently available.</p>
    <?php endif; ?>

</main>

<?php get_footer(); ?>