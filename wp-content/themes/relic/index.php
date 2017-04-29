<?php
/**
 * The main index template file
 * */
get_header();
?>
<section>
  <div class="breadcumb-bg">
    <div class="webpage-container container">
      <div class="site-breadcumb">
        <?php $relic_page_id = get_query_var('page_id'); ?>
        <h1><?php echo get_the_title($relic_page_id); ?></h1>
        <ol class="breadcrumb breadcrumb-menubar">
          <?php if (function_exists('relic_custom_breadcrumbs')) relic_custom_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>    
  <div class="webpage-container"> 
    <div class="property-blog-page">
      <?php get_template_part( 'content', 'index' );  ?>
      <?php get_sidebar(); ?>
    </div>
  </div> 
</section>
<?php get_footer(); ?>
