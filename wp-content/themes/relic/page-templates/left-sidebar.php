<?php
/**
 * Template Name: Left sidebar 
 * */
get_header();
?>
<section>	
  <div class="breadcumb-bg">
    <div class="webpage-container container">
      <div class="site-breadcumb">
        <h1><?php the_title(); ?></h1>
        <ol class="breadcrumb breadcrumb-menubar">
<?php if (function_exists('relic_custom_breadcrumbs')) relic_custom_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>    	
  <div class="webpage-container"> 
    <div class="agent-blog">
        <?php get_sidebar(); ?>	
      <div class="col-md-8 col-sm-7">
          <?php while (have_posts()) : the_post(); ?>	
            <?php get_template_part( 'content', 'page' );  ?>
          <?php endwhile; ?> 
      </div>							
    </div>
  </div> 
</section>
<?php get_footer(); ?>
