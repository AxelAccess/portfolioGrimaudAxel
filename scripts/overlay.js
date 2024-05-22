document.addEventListener("DOMContentLoaded", function() {
    document.body.addEventListener("mouseover", mouseHoverOverlay);
    document.body.addEventListener("mouseout", mouseOutOverlay);
});

function mouseHoverOverlay(event) {
    hoverEvent(event, true);
}

function mouseOutOverlay(event) {
    hoverEvent(event, false);
}

function hoverEvent(event, mouseHover) {
    if(event.target.closest(".overlay")) {
        let overlay = event.target.closest(".overlay");
        let img = overlay.querySelector('.projectOverlay');
        let infoProjectId = img.getAttribute('data-idProjet');
        let info = document.getElementById(infoProjectId);
        if (mouseHover) {
            info.classList.remove("hide");
            info.classList.add("display");
            img.style.filter = "brightness(50%)";
        } else {
            info.classList.remove("display");
            info.classList.add("hide");
            img.style.filter = "brightness(100%)";
        }
    }
}

