jQuery(document).ready(function($) {
    $('#buttonLoadMoreProjects').click(function() {
        
        let ajaxurl = $(this).data('ajaxurl');
        $.ajax({
            type: 'GET',
            url: ajaxurl,
            data: {
                action: 'loadMoreProjects',
                offset: $('.overlay').length
            },
            success: function(response) {
                $('.project-container').append(response);
                let links = document.querySelectorAll(".catPhoto a");
                links.forEach(function(link) {
                    link.classList.add('whiteCat');               
                });
            },
        });
    });
});