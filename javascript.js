function showInfo() {
    var infoText = document.getElementById("info-text");
    if (infoText.style.display === "none") {
        infoText.style.display = "block";
    } else {
        infoText.style.display = "none";
    }
}

// Function to scroll to the contact form section
function scrollToContactForm() {
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


window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    var images = document.querySelectorAll('.carousel-container img');

    images.forEach(function(img) {
        var imgPosition = img.getBoundingClientRect().left + window.scrollX;
        var distanceToCenter = (window.innerWidth - img.width) / 2 - (imgPosition - window.innerWidth / 2);
        var move = Math.min(100, Math.max(-100, distanceToCenter / 10));

        img.style.transform = 'translateX(' + move + 'px)';
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
