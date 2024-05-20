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

// Function for filtering REGIONs and JOB positons for ""meet our team on About us page

document.addEventListener('DOMContentLoaded', function () {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const regionSelect = document.getElementById('region-select');
    const employeeBoxes = document.querySelectorAll('.meet-our-team-box-content');

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
        employeeBoxes.forEach(box => {
            const matchesPosition = (position === 'all' || box.getAttribute('data-position') === position);
            const matchesRegion = (region === 'all' || box.getAttribute('data-region') === region);

            if (matchesPosition && matchesRegion) {
                box.style.display = 'block';
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
    }
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