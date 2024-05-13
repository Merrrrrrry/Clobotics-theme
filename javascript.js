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


// Parallax effect on the images with the class 'parallax-image'
window.addEventListener('scroll', function() {
    var scrollPosition = window.scrollY;
    document.querySelector('.collage-container img').style.left = -scrollPosition * 0.5 + 'px';
});






<<<<<<< HEAD
// Function to show one of three pictures
=======


// Function to show one of three pictures - we work globally section on Wind services page
>>>>>>> 5859035990ffb69dc6f24c825e4c8451b2350742
function show_our(btn) {
    document.getElementById("image_of_our_offices").style.display = 'none';
    document.getElementById("image_of_our_partners").style.display = 'none';
    document.getElementById("image_of_our_work").style.display = 'none';
    document.getElementById("image_of_our_" + btn.innerText.replace("Our ", '')).style.display = 'inline';

    var img_selector_btns = document.querySelectorAll('ul.img_selector > li');
    img_selector_btns.forEach((el)=>{el.classList.remove('selected');});

    btn.classList.add('selected');
}
