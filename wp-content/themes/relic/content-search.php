<?php
/*
 * The template part for displaying results in search pages
 */
?>
<div class="col-md-8 col-sm-7">	
  <?php if (have_posts()) : ?>		
    <?php while (have_posts()) : the_post(); ?>										
      <div class="property-blog-bg">
        <div class="blog-property">
          <div class="blog-details col-md-3 col-xs-6"> 							
            <?php relic_entry_meta(); ?>								
          </div> 
          <div class="blog-img col-md-9 col-xs-6">
            <a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a>
            <?php $relic_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'relic-post-image'); ?>			 
            <?php if ($relic_image[0] != "") { ?>
              <a href="<?php echo esc_url(get_permalink()); ?>"> 
                <img alt="<?php esc_attr(the_title()); ?>" src="<?php echo esc_url($relic_image[0]); ?>" width="<?php echo $relic_image[1]; ?>" height="<?php echo $relic_image[2]; ?>" class="media-object img-responsive"> 
              </a>
            <?php
            } ?>				
            <?php the_excerpt(); ?>						
          </div>			
        </div>
      </div>	
    <?php endwhile; ?>
    <div class="col-md-12 no-padding-lr">
      <div class="gallery-pagination">
        <?php relic_pagination(); ?>
      </div>
    </div> 
  <?php else : ?>				
    <div class="property-blog-bg"> 
      <div class="blog-property col-md-12">
        <h3><?php _e('Nothing Found', 'relic'); ?></h3>
        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'relic'); ?></p>
        <div class="col-md-6">
          <?php get_search_form(); ?>  
        </div>
      </div>
    </div>
  <?php endif; ?>				
</div>
