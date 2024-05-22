<div class="lightbox">

    <a class="close"></a> 

    <div class="lightBoxArrowsProject">
        <a id="leftArrow" class="lightBoxArrow" data-id="<?php echo get_previous_post()->ID; ?>">
            <p class="arrowLeftText"> 
            <img class="arrow" src="<?php echo get_stylesheet_directory_uri()?>/images/leftArrowWhite.png" alt="Previous Post">Precedente</p>
        </a>

        <div class="projectBlock" id="projectInfo <?php echo get_the_ID(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full')?>" class="lightBoxPic">
        </div> 

        <a id="rightArrow" class="lightBoxArrow" data-id="<?php echo get_next_post()->ID; ?>">
            <p class="arrowRightText">Suivant
            <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrowWhite.png" alt="Next Post"></p>
        </a>
    </div>

    <div class="projectInfoLightBox">
        <p class="lightBoxRefProject"> <span id="lightboxRef"></span></p>
    </div>   
      
</div>
<div class="darkbackground"></div>

<div class="contactWindow container">               
    <img class="modalDeco" src="<?php echo get_stylesheet_directory_uri() ?>/images/ContactHeader.png">               
    <?= do_shortcode('[contact-form-7 id="4701b95" title="Contact form 1"]');?> 
</div>
<?php wp_nav_menu( array( 'theme_location' => 'footer-menu' ) ); ?>
<div class="ico">
    <a href="https://www.flaticon.com/free-icons/wordpress" title="wordpress icons">Wordpress icons created by Roundicons - Flaticon</a>
</div>