<?php
/**
 * The template used for displaying page content
 */
?>
<div class="agent-blog-bg">
  <?php $relic_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'large'); ?>
  <?php if ($relic_image[0] != "") { ?>
    <div class="item banner-item">
      <img src="<?php echo esc_url($relic_image[0]); ?>" width="<?php echo $relic_image[1]; ?>" height="<?php echo $relic_image[2]; ?>" class="img-responsive" alt="<?php esc_attr(the_title()); ?>" />
    </div>
  <?php } ?> 	
  <div class="about-agent">                               
    <?php the_content(); ?>	                                                              
  </div>
  <div class="reply-box">
    <?php comments_template('', true); ?>				
  </div>
</div>
