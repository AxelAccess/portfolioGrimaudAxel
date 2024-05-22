<?php
function enqueue_jquery() {
    wp_enqueue_script('jquery');
}
function theme_enqueue_styles() {
    wp_enqueue_style('twentytwentyone', get_stylesheet_directory_uri(). '/style.css'); 

    wp_enqueue_script('lightbox', get_stylesheet_directory_uri(). '/scripts/lightbox.js');

    wp_enqueue_script('moreProjectsScript', get_stylesheet_directory_uri(). '/scripts/scriptLoadMoreProjects.js', array("jquery"));

    wp_enqueue_script('contactReference', get_stylesheet_directory_uri(). '/scripts/contactRef.js');

    wp_enqueue_script('overlay', get_stylesheet_directory_uri(). '/scripts/overlay.js');

    wp_enqueue_script('hoverImgNavArrowSP', get_stylesheet_directory_uri(). '/scripts/hoverImgNavArrowSP.js');

    wp_enqueue_script('filter', get_stylesheet_directory_uri(). '/scripts/filter.js', array("jquery"));
    wp_localize_script('filter', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_enqueue_script('burgerQueries', get_stylesheet_directory_uri(). '/scripts/burgerQueries.js');
}   
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_jquery');



//**Page principale**\\

// Récupere le nom de la catégorie de la photo

function get_project_by_dates() {
    $orderby = 'date'; 
    $order = 'ASC';   

    if (isset($_GET['publish_id'])) {
        if ($_GET['publish_id'] === 'newest') {
            $orderby = 'date'; 
            $order = 'DESC'; 
        } elseif ($_GET['publish_id'] === 'oldest') {
            $orderby = 'date'; 
            $order = 'ASC'; 
        }
    }

    $args = array(
        'post_type'      => 'projet',
        'posts_per_page' => 8,
        'orderby'        => $orderby,
        'order'          => $order
    );

    $project = new WP_Query($args);

    if($project->have_posts() ) {
        while( $project->have_posts() ) {
            $project->the_post(); 
            $post_id = get_the_ID();
            get_template_part('templatsParts/ProjectCatalog');
        }
    }
    wp_die();
}
add_action('wp_ajax_get_project_by_dates', 'get_project_by_dates');
add_action('wp_ajax_nopriv_get_project_by_dates', 'get_project_by_dates');


function loadMoreProjects() {
    $offset = $_GET['offset'] ?? 0;
    $args = array(
        'post_type'      => 'projet',
        'posts_per_page' => 8,
        'offset'         => $offset
    );

    $project = new WP_Query($args);

    if($project->have_posts() ) {
        while( $project->have_posts() ) {
            $project->the_post(); 
            $post_id = get_the_ID();
            get_template_part('templatsParts/ProjectCatalog');
        }
    }
    wp_die();
}
add_action('wp_ajax_loadMoreProjects', 'loadMoreProjects');
add_action('wp_ajax_nopriv_loadMoreProjects', 'loadMoreProjects');

//** **/

//**SinglePage**\\

//display photo hover
function hoverProjectImage() {
    $post_id = $_GET['post_id']; 
    $image_url = get_the_post_thumbnail_url($post_id, 'thumbnail'); 
    echo $image_url; 
    wp_die(); 
}
add_action('wp_ajax_hoverProjectImage', 'hoverProjectImage');
add_action('wp_ajax_nopriv_hoverProjectImage', 'hoverProjectImage');

//Loop for arrows & photo
function get_adjacent_post_loop($next = true) {
    $post = get_adjacent_post(false, '', $next);
    if (!$post) {
        $noAdjacentPost = array(
            'numberposts' => 1,
            'post_type'   => 'projet',
            'orderby'     => 'date',
            'order'       => $next ? 'DESC' : 'ASC'
        );
    $post = get_posts($noAdjacentPost)[0];
    }
    return $post;
}


//**Menus**\\
function register_my_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' ),
        )
    );
}
add_action( 'init', 'register_my_menus' );