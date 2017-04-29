<?php
/*
 * The default template for displaying content in index page
 */
?>
<div class="col-md-8 col-sm-7">	
  <?php
  $relic_args = array(
      'orderby' => 'post_date',
      'order' => 'DESC',
      'post_type' => 'post',
      'paged' => $paged,
      'post_status' => 'publish'
  );
  $relic_query = new WP_Query($relic_args);
  if ($relic_query->have_posts()) : while ($relic_query->have_posts()) : $relic_query->the_post();
      ?>												
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
      <?php
    endwhile;
  endif;
  ?> 
  <div class="col-md-12 no-padding-lr">
    <div class="gallery-pagination">
      <?php relic_pagination(); ?>
    </div>
  </div>
</div>
