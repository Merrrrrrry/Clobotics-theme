<?php
/*
Template Name: Articles
*/
?>

<?php get_header(); ?>

<body class="gray-body">
<div class="hero-section">
    <div class="hero-section-background">
        <img class="image-hero" src="<?php echo get_template_directory_uri(); ?>/media/Hero-imgs/Hero_articles_page.jpg" alt="Hero image">
    </div>

    <div class="hero-section-content">
        <h1 class="title hero-title">Explore Clobotics potential!</h1>
    </div>
</div>

<main>
    <h2>Clobotics Articles</h2>

    <!-- Search bar and filter buttons -->
    <div class="search-bar-container-2">
        <form id="article-search-form" class="search-form-2">
            <div class="search-bar-2">
                <input type="text" id="article-search-input" placeholder="Search articles...">
                <button type="submit" class="search-button">
                    <span class="material-icons search-icon">search</span>
                </button>
            </div>
            <div class="filters">
                <select id="article-category-filter">
                    <option value="">All Categories</option>
                    <option value="wind">Wind</option>
                    <option value="retail">Retail</option>
                </select>
            </div>
        </form>
    </div>

    <div id="articles-container">
        <?php
        $articles_per_page = 6;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $articles_query = new WP_Query(array(
            'post_type' => 'new-article',
            'posts_per_page' => $articles_per_page,
            'paged' => $paged
        ));

        if ($articles_query->have_posts()) :
            $count = 0;
            while ($articles_query->have_posts()) : $articles_query->the_post();
                if ($count % 3 == 0) {
                    echo '<div class="row">';
                }
                ?>
                <article class="col">
                    <a href="<?php the_permalink(); ?>">
                        <?php
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
                    echo '</div>';
                }
            endwhile;

            if ($count % 3 != 0) {
                echo '</div>';
            }

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
    function fetchArticles() {
        var search_query = $('#article-search-input').val();
        var filter = $('#article-category-filter').val();
        
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

    $('#article-search-form').on('submit', function(event) {
        event.preventDefault();
        fetchArticles();
    });

    $('#article-search-input').on('input', function() {
        fetchArticles();
    });

    $('#article-category-filter').on('change', function() {
        fetchArticles();
    });
});
</script>

</body>
<?php get_footer(); ?>
