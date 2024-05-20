// This file is so the page would stop reloading after pressing search button in the career page

jQuery(document).ready(function($) {
    function fetch_career_positions() {
        var search_query = $('#search-input').val();
        var sector = $('#sector').val();
        var region = $('#region').val();
        var job_type = $('#job_type').val();

        $.ajax({
            url: clobotics_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'clobotics_search',
                search_query: search_query,
                sector: sector,
                region: region,
                job_type: job_type
            },
            success: function(response) {
                $('#career-results').html(response);
            }
        });
    }

    $('.filter-button').click(function(event) {
        event.preventDefault();
        fetch_career_positions();
    });

    // Initial fetch on page load
    fetch_career_positions();
});



// AJAX request for the wind services search bar

jQuery(document).ready(function($) {
    $('#search-form-2').on('submit', function(event) {
        event.preventDefault();

        var searchQuery = $('#search-input-2').val();

        $.ajax({
            url: clobotics_ajax.ajax_url,
            type: 'post',
            data: {
                action: 'clobotics_search_wind_services',
                search_query: searchQuery
            },
            success: function(response) {
                $('#service-list').html(response);
            }
        });
    });
});

// AJAX request for articles search bar

jQuery(document).ready(function($) {
    function fetchArticles(page = 1) {
        var search_query = $('#article-search-input').val();
        var filter = $('input[name="category"]:checked').val();

        $.ajax({
            url: clobotics_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'clobotics_search_articles',
                search_query: search_query,
                filter: filter,
                paged: page
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

    $('input[name="category"]').on('change', function() {
        $('#article-search-form').submit();
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('paged=')[1];
        fetchArticles(page);
    });
});


// Navbar burger menu
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('burger-menu').addEventListener('click', function () {
      document.getElementById('navbar-nav').classList.toggle('active');
    });
  });
