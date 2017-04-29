<?php
/**
 * The Single template file
 * */
get_header();
?>
<section>
  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>           
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
      <div class="property-blog-page">
        <div class="col-md-8 col-sm-7">
<?php while (have_posts()) : the_post(); ?>				
            <div class="property-blog-bg">
              <div class="blog-property">
                <div class="blog-box">
                  <div class="blog-details col-md-3 col-xs-6"> 
  <?php relic_entry_meta(); ?>																						
                  </div> 
                  <div class="blog-img col-md-9 col-xs-6">
                    <p class="single-title"><?php the_title(); ?></a></p>
                    <?php $relic_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'relic-post-image'); ?>									
                    <?php if ($relic_image[0] != "") { ?>								
                      <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($relic_image[0]); ?>" width="<?php echo $relic_image[1]; ?>" height="<?php echo $relic_image[2]; ?>" class="media-object img-responsive"> 							
                <?php }  ?>				
                  </div>
                </div>
                <div class="about-blog-property">
                  <?php
                  the_content();
                  wp_link_pages(array(
                      'before' => '<div class="col-md-6 col-xs-6 no-padding-lr prev-next-btn">' . __('Pages', 'relic') . ':',
                      'after' => '</div>',
                      'link_before' => '<span>',
                      'link_after' => '</span>',
                  ));
                  ?>   
                </div>						
              </div>					
              <div class="reply-box">
  <?php comments_template('', true); ?>					
              </div>
              <div class="pagination_single">
				<?php relic_pagination(); ?>
				</div>
              
            </div>	
<?php endwhile; ?>			
        </div>		
<?php get_sidebar(); ?>
      </div>
    </div>
  </div> 
</section>
<?php get_footer(); ?> 
