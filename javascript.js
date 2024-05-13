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

// Function to update the scroll position of the image container
function updateImageContainerScroll() {
    var scrollPosition = window.scrollX;
    document.querySelector('.image-container').scrollLeft = scrollPosition;
}

// Event listener for window scroll to update the image container scroll
window.addEventListener('scroll', updateImageContainerScroll);

// Initial call to update the image container scroll when the page loads
document.addEventListener('DOMContentLoaded', updateImageContainerScroll);




// Function to show one of three pictures
function show_our(btn) {
    document.getElementById("image_of_our_offices").style.display = 'none';
    document.getElementById("image_of_our_partners").style.display = 'none';
    document.getElementById("image_of_our_work").style.display = 'none';
    document.getElementById("image_of_our_" + btn.innerText).style.display = 'inline';

    var img_selector_btns = document.querySelectorAll('ul.img_selector > li');
    img_selector_btns.forEach((el)=>{el.classList.remove('selected');});

    btn.classList.add('selected');
}
