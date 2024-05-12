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


// Add event listener to the Apply button to scroll to the contact form section
document.addEventListener("DOMContentLoaded", function() {
    var applyButton = document.getElementById("apply-button"); 
    if (applyButton) {
        applyButton.addEventListener("click", scrollToContactForm);
    }
});



// Function to show one of three pictures
function show_our(type) {
    document.getElementById("image_of_our_offices").style.display = 'none';
    document.getElementById("image_of_our_partners").style.display = 'none';
    document.getElementById("image_of_our_work").style.display = 'none';
    document.getElementById("image_of_our_" + type).style.display = 'inline';
}
