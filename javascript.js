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


// For Search bar in Career page

document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.querySelector('.search-form');
    searchForm.addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(searchForm);
        const queryString = new URLSearchParams(formData).toString();
        fetch(`${searchForm.action}?${queryString}`)
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const newPositions = doc.querySelector('.open-positions').innerHTML;
                document.querySelector('.open-positions').innerHTML = newPositions;
                window.scrollTo({
                    top: document.querySelector('.open-positions').offsetTop,
                    behavior: 'smooth'
                });
            });
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