// This file is so the page would stop reloading after pressing search button in the career page

jQuery(document).ready(function($) {
    $('#search-form').on('submit', function(event) {
        event.preventDefault();

        var searchQuery = $('#search-input').val();
        var sector = $('#sector').val();
        var region = $('#region').val();
        var jobType = $('#job_type').val();

        $.ajax({
            url: clobotics_ajax.ajax_url,
            type: 'post',
            data: {
                action: 'clobotics_search',
                search_query: searchQuery,
                sector: sector,
                region: region,
                job_type: jobType
            },
            success: function(response) {
                $('#position-list').html(response);
            }
        });
    });
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
        fetchArticles();
    });

    $(document).on('click', '.pagination a', function(e) {
        e.preventDefault();
        var page = $(this).attr('href').split('paged=')[1];
        fetchArticles(page);
    });
});
