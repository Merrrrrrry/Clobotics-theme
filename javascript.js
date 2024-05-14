function showInfo() {
    var infoText = document.getElementById("info-text");
    if (infoText.style.display === "none") {
        infoText.style.display = "block";
    } else {
        infoText.style.display = "none";
    }
}

// Function to scroll to the contact form section
function scrollToContactForm(event) {
    event.preventDefault(); 
    var contactFormSection = document.getElementById("contact-form-section");
    contactFormSection.scrollIntoView({ behavior: "smooth" });
}

// Event listener to the Apply button to scroll to the contact form section
document.addEventListener("DOMContentLoaded", function() {
    var applyButton = document.getElementById("apply-button"); 
    if (applyButton) {
        applyButton.addEventListener("click", scrollToContactForm);
    }
});

// Company History Timeline JS

document.addEventListener("DOMContentLoaded", function() {
    const items = document.querySelectorAll(".company-history-item");

    window.addEventListener("scroll", function() {
        const triggerBottom = window.innerHeight / 5 * 4;

        items.forEach(item => {
            const itemTop = item.getBoundingClientRect().top;

            if (itemTop < triggerBottom) {
                item.classList.add("show");
            } else {
                item.classList.remove("show");
            }
        });
    });
});

// Search functionality using AJAX

document.addEventListener('DOMContentLoaded', function() {
    // Add event listener to the search form
    document.getElementById('search-form').addEventListener('submit', function(event) {
        // Prevent the default form submission behavior
        event.preventDefault();

        // Get the search query
        var searchQuery = document.getElementById('search-input').value;
        console.log('Search Query:', searchQuery); // Log the search query

        // Fetch search results using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo esc_url(get_permalink()); ?>?search_query=' + encodeURIComponent(searchQuery), true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Replace the content with the search results
                document.getElementById('search-results').innerHTML = xhr.responseText;
            }
        };
        xhr.send();
    });
});




// Function to show one of three pictures - we work globally section on Wind services page

function show_our(btn) {
    document.getElementById("image_of_our_offices").style.display = 'none';
    document.getElementById("image_of_our_partners").style.display = 'none';
    document.getElementById("image_of_our_work").style.display = 'none';
    document.getElementById("image_of_our_" + btn.innerText.replace("Our ", '')).style.display = 'inline';
    
    var img_selector_btns = document.querySelectorAll('ul.img_selector > li');
    img_selector_btns.forEach((el)=>{el.classList.remove('selected');});
    
    btn.classList.add('selected');
}

function applyOwl() {
    jQuery(".clobotics-carousel").owlCarousel();
}

// $(document).ready(function() {
// });