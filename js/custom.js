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





  // Articles page

  jQuery(document).ready(function($) {
    function initializeOwlCarousel() {
        $('#articles-container').owlCarousel({
            loop: true,
            items: 3,  // Number of items per view
            nav: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000,
            animateOut: 'fadeOut',
            lazyLoad: true
        });
    }

    // Initialize the Owl Carousel
    initializeOwlCarousel();

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
                // Reinitialize the carousel after search
                $('#articles-container').owlCarousel('destroy');
                initializeOwlCarousel();
            }
        });
    });
});
