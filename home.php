<?php 
get_header();  
?>

<h1 class="titre">
    <span class="redCapitalize">D</span>éveloppeur WordPress, 
    <span class="redCapitalize">D</span>éveloppeur web, 
    <span class="redCapitalize">W</span>ebmaster ou encore 
    <span class="redCapitalize">D</span>éveloppeur front-end. 
</h1>
<div class="logoDiv">
    <img class="logoTech" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/Ico/wordpress.png" alt="Logo wordpress">
    <img class="logoTech" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/Ico/php.png" alt="Logo PHP">
    <img class="logoTech" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/Ico/js.png" alt="Logo JavaScript">
    <img class="logoTech" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/Ico/html.png" alt="Logo Html">
    <img class="logoTech" src="<?php echo get_stylesheet_directory_uri() ?>/images/PhotosNMota/Ico/css.png" alt="Logo Css">
</div>

<h2 class="titre">Qui je suis?</h2>
<p class="text">  
    Bonjour, <br>
    Je m’appelle Axel Grimaud. Je suis développeur web. 
    J’ai suivi une formation chez OpenClassroom, qui m'a conduit à apprendre et à manipuler Wordpress, PHP, JS, HTML et CSS. 
    Ainsi que des notions de jQuery et de Responsive design.    
</p>
<p class="text">
    Grâce à une pédagogie basée sur la pratique ainsi qu’à l'aide d'un expert du métier. 
    J’ai obtenu des compétences clés en validant des projets professionnalisants. 
    Et gagnez un véritable savoir-faire ainsi qu’un portfolio pour le démontrer. 
    Aussi, à l’issue (j’ai obtenu), la certification professionnelle 
    « Développeur Informatique » enregistrée au Répertoire National des Certifications Professionnelles, de niveau 5 (bac +2)
</p>
<p class="text">
    Vous retrouvez sur ce site ces projets accompagné d’une description de ce que j’ai entrepris et dans quel contexte j’ai mené à bien les projets qui m’étaient confiés.
</p>
<section class="alignFake">
    <div class="sel blockFormsForRight">
        <div class="label">Trier par</div>
        <div class="options">
            <div data-value="newest">Plus récentes</div>
            <div data-value="oldest">Plus anciennes</div>
        </div>
    </div>
</section>

    <div class=blockFormsForRight>
        <select id="publishSelect" name="publish" class="forms">
            <option value="" disabled selected class="hiddenOption">Trier par</option>
            <option value="newest">plus récentes</option>           
            <option value="oldest">plus anciennes</option>
        </select>
    </div>


<section class="picturesList container">
    <div id="project-container" class="project-container"> 
        <?php      
        $args = array(
            'post_type'      => 'projet',
            'posts_per_page' => 8,       
        );
        $project = new WP_Query($args);  
        if($project->have_posts() ) : while( $project->have_posts() ) : $project->the_post(); 
        get_template_part('templatsParts/ProjectCatalog');
        endwhile; endif; wp_reset_postdata();?>
    </div>
 

    <div class= "centerButton">
        <button id="buttonLoadMoreProjects" 
            data-ajaxurl="<?php echo admin_url( 'admin-ajax.php' ); ?>" 
            data-action="loadMoreProjects"
            data-nonce="<?php echo wp_create_nonce('loadMoreProjects'); ?>">
            Charger plus
        </button>
    </div>
</section>

<?php
get_footer();