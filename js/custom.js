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





// Navbar burger menu
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('burger-menu').addEventListener('click', function () {
      document.getElementById('navbar-nav').classList.toggle('active');
    });
  });



  //articles
  jQuery(document).ready(function($) {
    function applyArticleStyles() {
        $('#articles-container').find('article').each(function() {
            $(this).css({
                'flex': '0 0 calc(30% - 20px)',
                'max-width': 'calc(30% - 20px)',
                'margin-bottom': '20px',
                'box-shadow': '0 0 10px rgba(0, 0, 0, 0.1)',
                'border-radius': '10px',
                'overflow': 'hidden',
                'background': '#fff'
            });
            $(this).find('img').css({
                'width': '100%',
                'height': 'auto'
            });
            $(this).find('h3').css({
                'padding': '15px',
                'font-size': '1.2em',
                'color': '#333'
            });
            $(this).find('p').css({
                'padding': '0 15px 15px',
                'color': '#666'
            });
        });
    }

    // Apply article styles initially
    applyArticleStyles();

    $('#search-form-articles').on('submit', function(event) {
        event.preventDefault();

        var searchQuery = $('#search-input-articles').val();

        $.ajax({
            url: clobotics_ajax.ajax_url,
            type: 'get',
            data: {
                action: 'clobotics_search_new_articles',
                search_query: searchQuery
            },
            success: function(response) {
                $('#articles-container').html(response);
                // Apply article styles after search
                applyArticleStyles();
            }
        });
    });
});
