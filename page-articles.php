<?php
/*
Template Name: Articles
*/
?>

<?php get_header(); ?>


<!-- Hero section -->
<body class="gray-body">
    

<div class="hero-section">
    <div class="hero-section-background">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_articles_page.jpg" alt="Hero image">
    </div>

    <div class="hero-section-content">
        <h1 class="title hero-title"> Explore Clobotics potential!</h1>
    </div>
</div>

<main>
    <h2>Clobotics Articles</h2>

    <!-- Search bar and filter buttons -->
    <div class="article-filters">
        <input type="text" id="article-search" placeholder="Search articles...">
        <button class="filter-button" data-filter="retail">Retail</button>
        <button class="filter-button" data-filter="wind">Wind</button>
    </div>

    <div id="articles-container">
        <?php
        $articles_per_page = 6; // 2 rows with 3 articles each

        // Get current page number
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        // Query articles
        $articles_query = new WP_Query(array(
            'post_type' => 'new-article', // Custom post type name
            'posts_per_page' => $articles_per_page,
            'paged' => $paged // Pagination
        ));

        if ($articles_query->have_posts()) :
            $count = 0;
            while ($articles_query->have_posts()) : $articles_query->the_post();
                if ($count % 3 == 0) {
                    // Start a new row after every third article
                    echo '<div class="row">';
                }
                ?>
                <article class="col">
                    <a href="<?php the_permalink(); ?>">
                        <?php 
                        // Retrieve and display the main article image/thumbnail
                        $image = get_field('article_main_image');
                        if ($image) :
                            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '">';
                        endif;
                        ?>
                        <h3><?php the_field('new_article_title'); ?></h3>
                        <p><?php the_field('meta_description_short'); ?></p>
                    </a>
                </article>
                <?php
                $count++;
                if ($count % 3 == 0) {
                    // Close the row after every third article
                    echo '</div>';
                }
            endwhile;

            // Close the row if the last row contains less than 3 articles
            if ($count % 3 != 0) {
                echo '</div>';
            }

            // Pagination
            if ($articles_query->max_num_pages > 1) :
                ?>
                <div class="pagination">
                    <?php echo paginate_links(array(
                        'total' => $articles_query->max_num_pages,
                        'current' => max(1, $paged),
                        'prev_text' => __('« Previous'),
                        'next_text' => __('Next »'),
                    )); ?>
                </div>
            <?php endif;

            wp_reset_postdata();
        else :
            echo '<p>No articles found.</p>';
        endif;
        ?>
    </div>
</main>

<script>
jQuery(document).ready(function($) {
    // Handle search and filter
    function fetchArticles() {
        var search_query = $('#article-search').val();
        var filter = $('.filter-button.active').data('filter');
        
        $.ajax({
            url: clobotics_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'clobotics_search_articles',
                search_query: search_query,
                filter: filter
            },
            success: function(response) {
                $('#articles-container').html(response);
            }
        });
    }

    $('#article-search').on('input', function() {
        fetchArticles();
    });

    $('.filter-button').on('click', function() {
        $('.filter-button').removeClass('active');
        $(this).addClass('active');
        fetchArticles();
    });
});
</script>

</body>
<?php get_footer(); ?>

