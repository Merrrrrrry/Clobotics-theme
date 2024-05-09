function showInfo() {
    var infoText = document.getElementById("info-text");
    if (infoText.style.display === "none") {
        infoText.style.display = "block";
    } else {
        infoText.style.display = "none";
    }
}


//FONT

function enqueue_google_fonts() {
    wp_enqueue_style( 'open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_google_fonts' );