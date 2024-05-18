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
    <div class="search-bar-container-3">
        <form id="article-search-form" class="search-form-3">
            <div class="search-bar-3">
                <input type="text" id="article-search-input" placeholder="Search articles...">
                <button type="submit" class="search-button-3">
                    <span class="material-icons search-icon-3">search</span>
                </button>
            </div>
            <div class="filters">
                <label>
                    <input type="radio" name="category" value="" checked> All
                </label>
                <label>
                    <input type="radio" name="category" value="wind"> Wind
                </label>
                <label>
                    <input type="radio" name="category" value="retail"> Retail
                </label>
            </div>
        </form>
    </div>

    <div id="articles-container">
        <!-- Content loaded via AJAX will be injected here -->
    </div>
</main>

<script>
    jQuery(document).ready(function($) {
        // JavaScript code as provided in the custom.js file
    });
</script>

</body>
<?php get_footer(); ?>

