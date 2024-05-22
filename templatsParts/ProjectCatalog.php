<div class="overlay">
    <a>
        <?php the_post_thumbnail('full', [
            'class'           => 'projectOverlay',
            'data-idProjet'    => 'idProjet' . get_the_ID(), 
            'data-ref'        => get_field ('shortdescriptionLightbox'),
        ]);?>                 
    </a>
    <div id="idProjet<?php echo get_the_ID(); ?>" class="projectInfo hide"> 
        <a class="eyeIco" href="<?php the_permalink(); ?>">  
            <span> <img src="<?php echo get_template_directory_uri(); ?>/images/Icon_eye.svg"></span>
        </a>
        <span class="fullScreenIco"> <img  src="<?php echo get_template_directory_uri(); ?>/images/iconFullscreen.png"></span>
    </div>          
</div>