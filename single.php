<?php get_header(); ?>
  <?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>
    
    <article class="post">

      <section class="topSection container">
      <div class="blocMainPic">
          <?php the_post_thumbnail('large', array('class' => 'mainPics')); ?>
        </div>
        <div class="descriptionBlock">
          <h1 class="descriptionPicsTitle"id="titleId"><?php the_title(); ?></h1>
          <?php the_content();?>
          <p class="descriptionPics" >Contexte du projet :</p>
          <div class="descriptionPics"><?php  echo get_field ('contexte'); ?></div>
          <p class="descriptionPics" >Description du projet :</p>
          <div class="descriptionPics"><?php  echo get_field ('description'); ?></div>
        </div>
      </section>
      
      <section class="middleSection container">
        <div class="leftMiddleSection">
          <p class="insterested">Intéressé ?</p>
        </div>

        <div class="centerMiddleSection">
          <button class="contactButton" type="submit"> Contact</button>
        </div>

        <div class= "rightMiddleSection">
          <div class="navBox">           
            <img id="hoverImage" class="navPic" src="<?php echo get_the_post_thumbnail_url(get_adjacent_post_loop(true)->ID, 'thumbnail');?>">  
            <div class="arrows">              
              <a  class="leftArrow" 
                  data-id="<?php echo get_adjacent_post_loop(false)->ID;?>" 
                  href="<?php echo get_permalink(get_adjacent_post_loop(false)); ?>">
                  <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/leftArrowWhite.png" alt="Previous Post">
              </a>
              <a  class="rightArrow" 
                  data-id="<?php echo get_adjacent_post_loop(true)->ID;?>" 
                  href="<?php echo get_permalink(get_adjacent_post_loop(true)); ?>">
                  <img class="arrow" src="<?php echo get_stylesheet_directory_uri() ?>/images/rightArrowWhite.png" alt="Next Post">
              </a>
            </div>
          </div>
        </div>
      </section>
    </article>
  <?php endwhile; endif; ?>
<?php get_footer(); ?>