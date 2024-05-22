document.addEventListener("DOMContentLoaded", function() {

    let projet = document.querySelectorAll(".overlay");
    let lightbox = document.querySelector(".lightbox");
    
    // extrait les données (cat et ref) de l'image.
    function projectInfo(projectElement) {
        let projectURL = projectElement.src;
        let ref = projectElement.getAttribute("data-ref");
    
        let lightboxprojectElement = lightbox.querySelector(".lightBoxPic");
        lightboxprojectElement.src = projectURL;
        document.getElementById("lightboxRef").textContent = ref;
    }
    // Affiche la lightbox 
    document.body.addEventListener("click", function(event) {
        if (event.target.closest(".fullScreenIco")) {
            let projectElement = event.target.closest(".overlay").querySelector("img");
            projectInfo(projectElement)
            lightbox.style.display = "flex";
        }
    });
    

    // Ferme la lightbox
    let closeLightbox = document.querySelector(".close");
    closeLightbox.addEventListener("click", function() {
        lightbox.style.display = "none";
    });
    
    // Données de la lightbox
    function updateLightboxContent(projectsArray, offset) {
        // Index de la photo actuellement affichée
        let currentProject = document.querySelector(".lightBoxPic").src;
        let currentProjectPosition = projectsArray.findIndex(projet => projet.querySelector("img").src === currentProject);
        
        // Calcule le nouvel index en tenant compte de l'offset
        currentProjectPosition = (currentProjectPosition + offset + projectsArray.length) % projectsArray.length;
        
        // Maj des éléments de la lightbox avec les données de la nouvelle photo
        let projectElement = projectsArray[currentProjectPosition].querySelector("img");
        projectInfo(projectElement);
    }
    
    // Navigation de la lightbox
    leftArrow.addEventListener("click", function(e) {
        let projectsArray = Array.from(projet);
        updateLightboxContent(projectsArray, -1);
    });
    
    rightArrow.addEventListener("click", function(e) {
        let projectsArray = Array.from(projet);
        updateLightboxContent(projectsArray, +1);
    });
})


