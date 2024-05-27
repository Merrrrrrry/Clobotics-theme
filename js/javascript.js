function showInfo() {
    var infoText = document.getElementById("info-text");
    if (infoText.style.display === "none") {
        infoText.style.display = "block";
    } else {
        infoText.style.display = "none";
    }
}

// Navbar burber menu
document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('burger-menu').addEventListener('click', function () {
      document.getElementById('navbar-nav').classList.toggle('active');
    });
  });
  

// Function to scroll to the contact form 
function scrollToContactForm(event) {
    event.preventDefault(); 
    var contactSection = document.getElementById("contact-form-container-career");
    if (contactSection) {
        console.log("Contact section found:", contactSection);
        contactSection.scrollIntoView({ behavior: "smooth" });
    } else {
        console.error("Contact section not found.");
    }
}

// Event listener to the Apply button to scroll to the contact form section

document.addEventListener("DOMContentLoaded", function() {
    var applyButton = document.getElementById("apply-button"); 
    if (applyButton) {
        applyButton.addEventListener("click", scrollToContactForm);
    } else {
        console.error("Apply button not found.");
    }
});




// Logo slider JS
document.addEventListener("DOMContentLoaded", function() {
    const slides = document.querySelector('.slides');
    const slidesWrapper = document.querySelector('.slides-wrapper');
    const originalContent = slides.innerHTML;
    const logos = document.querySelectorAll('.customers_logo_link');
    let totalWidth = 0;

    logos.forEach(logo => {
        totalWidth += logo.offsetWidth + parseInt(window.getComputedStyle(logo).marginRight);
    });

    // Duplicate the content to ensure seamless animation
    slides.innerHTML += originalContent;

    // Calculate the animation duration based on the total width
    const animationDuration = totalWidth / 100; // Adjust this value as needed
    slides.style.animationDuration = animationDuration + 's';

    // Seamless looping
    slides.style.width = `${totalWidth * 2}px`;
});




// Function for filtering REGIONs and JOB positons for "meet our team" on About us page
document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const regionSelect = document.getElementById('region-select');
    const employeeBoxes = document.querySelectorAll('.meet-our-team-box-content');
    const showMoreBtn = document.getElementById('show-more-btn');
    const showLessBtn = document.getElementById('show-less-btn');
    let itemsToShow = 8;

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            const filter = button.getAttribute('data-filter');
            filterEmployees(filter, regionSelect.value);
        });
    });

    regionSelect.addEventListener('change', () => {
        const region = regionSelect.value;
        const positionFilter = document.querySelector('.filter-btn.active')?.getAttribute('data-filter') || 'all';
        filterEmployees(positionFilter, region);
    });

    function filterEmployees(position, region) {
        let visibleCount = 0;
        employeeBoxes.forEach(box => {
            const matchesPosition = (position === 'all' || box.getAttribute('data-position') === position);
            const matchesRegion = (region === 'all' || box.getAttribute('data-region') === region);

            if (matchesPosition && matchesRegion) {
                box.style.display = (visibleCount < itemsToShow) ? 'block' : 'none';
                visibleCount++;
            } else {
                box.style.display = 'none';
            }
        });

        // Set the active class on the position filter buttons
        filterButtons.forEach(button => {
            if (button.getAttribute('data-filter') === position) {
                button.classList.add('active');
            } else {
                button.classList.remove('active');
            }
        });

        // Update button visibility
        updateButtonVisibility();
    }

    function updateButtonVisibility() {
        let hiddenItems = document.querySelectorAll('.meet-our-team-box-content[style*="display: none"]');
        let visibleItems = document.querySelectorAll('.meet-our-team-box-content:not([style*="display: none"])').length;

        showMoreBtn.style.display = hiddenItems.length > 0 ? 'inline-block' : 'none';
        showLessBtn.style.display = visibleItems > itemsToShow ? 'inline-block' : 'none';
    }

    // Show more button functionality
    showMoreBtn.addEventListener('click', function() {
        let hiddenItems = document.querySelectorAll('.meet-our-team-box-content[style*="display: none"]');
        if (hiddenItems.length === 0) {
            // Switch to "all" filter if no more items to show
            document.querySelector('.filter-btn[data-filter="all"]').click();
            regionSelect.value = 'all';
            filterEmployees('all', 'all');
        } else {
            for (let i = 0; i < Math.min(itemsToShow, hiddenItems.length); i++) {
                hiddenItems[i].style.display = 'block';
            }
        }
        updateButtonVisibility();
    });

    // Show less button functionality
    showLessBtn.addEventListener('click', function() {
        let visibleItems = document.querySelectorAll('.meet-our-team-box-content:not([style*="display: none"])');
        for (let i = visibleItems.length - 1; i >= Math.max(visibleItems.length - itemsToShow, itemsToShow); i--) {
            visibleItems[i].style.display = 'none';
        }
        updateButtonVisibility();
    });

    // Initially hide all but the first 8 items
    for (let i = itemsToShow; i < employeeBoxes.length; i++) {
        employeeBoxes[i].style.display = 'none';
    }

    // Ensure the "Show Less" button is initially hidden
    showLessBtn.style.display = 'none';
    updateButtonVisibility();
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

function applyOwlCarousel(settings_array) {
    jQuery(".owl-carousel").owlCarousel(settings_array);
}