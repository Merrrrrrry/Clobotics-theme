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

    <!-- Search bar -->
    <div class="search-bar-container">
        <form id="articles-search-form" class="search-form">
            <div class="search-bar">
                <input type="text" id="articles-search-input" placeholder="Search...">
                <button type="submit" class="search-button">
                    <span class="material-icons search-icon">search</span>
                </button>
            </div>
        </form>
    </div>

    <div id="articles-container">
        <!-- Articles will be loaded dynamically here via AJAX -->
    </div>

    <div class="pagination">
        <!-- Pagination links will be loaded dynamically here via AJAX -->
    </div>
</main>

<script>
    jQuery(function($) {
        // AJAX search for articles
        $('#articles-search-form').on('submit', function(e) {
            e.preventDefault();
            var searchQuery = $('#articles-search-input').val();

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'clobotics_ajax_search_articles',
                    search_query: searchQuery,
                    page: 1 // Start from page 1 when searching
                },
                success: function(response) {
                    $('#articles-container').html(response.articles);
                    $('.pagination').html(response.pagination);
                }
            });
        });

        // AJAX pagination for articles
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var page = $(this).attr('href').split('/').pop();

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'POST',
                data: {
                    action: 'clobotics_ajax_search_articles',
                    search_query: $('#articles-search-input').val(),
                    page: page
                },
                success: function(response) {
                    $('#articles-container').html(response.articles);
                    $('.pagination').html(response.pagination);
                }
            });
        });
    });
</script>

</body>
<?php get_footer(); ?>
