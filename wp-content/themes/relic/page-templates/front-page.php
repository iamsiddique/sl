<?php
/*
 * Template Name: Home Page
 */
get_header();
$relic_options = get_option('relic_theme_options');
?>
<section>		
  <?php $relic_loop_active = 0;
  $relic_remove_div = 0;
  ?>
  <?php
  for ($relic_loop = 1; $relic_loop <= 5; $relic_loop++):
    if (!empty($relic_options['slider-img-' . $relic_loop])) {
      $relic_remove_div++;
    } endfor;
  ?>
<?php if ($relic_remove_div != 0) { ?>
    <div class="banner">		
      <div id="sidebar-carousel-1" class="carousel slide relic-slider" data-ride="carousel">
        <div class="carousel-inner slider">
          <?php for ($relic_loop = 1; $relic_loop <= 5; $relic_loop++): ?>
            <?php
            if (!empty($relic_options['slider-img-' . $relic_loop])) {
              $relic_loop_active++;
              $relic_image = getimagesize($relic_options['slider-img-' . $relic_loop]);
              ?>
              <div class="item <?php echo ($relic_loop_active == 1) ? 'active' : ''; ?>">
      <?php if (!empty($relic_options['slidelink-' . $relic_loop])) { ?>
                  <a href="<?php echo esc_url($relic_options['slidelink-' . $relic_loop]); ?>" target="_blank">
                    <img src="<?php echo esc_url($relic_options['slider-img-' . $relic_loop]); ?>" width="<?php echo $relic_image[0]; ?>" height="<?php echo $relic_image[1]; ?>" alt="<?php echo $relic_loop; ?>" class="img-responsive"/>
                  </a>
                <?php } else { ?>                          
                  <img src="<?php echo esc_url($relic_options['slider-img-' . $relic_loop]); ?>" width="<?php echo $relic_image[0]; ?>" height="<?php echo $relic_image[1]; ?>" alt="<?php echo $relic_loop; ?>" class="img-responsive"/>
              <?php } ?>	
              </div>  
          <?php } endfor; ?>                                          			
        </div>
  <?php if ($relic_loop_active >= 2) { ?>		
          <a class="left carousel-control slider_button" href="#sidebar-carousel-1" data-slide="prev">
            <i class="fa fa-arrow-circle-o-left"></i>
          </a>
          <a class="right carousel-control slider_button" href="#sidebar-carousel-1" data-slide="next">
            <i class="fa fa-arrow-circle-o-right"></i>
          </a>
  <?php } ?>
      </div>
    </div> 
<?php } ?>          
  <div class="webpage-container container not-slider">         
    <div class="recent-listings">
<?php if (!empty($relic_options['home-title'])) { ?>
        <div class="title">
          <h2><span><?php echo sanitize_text_field($relic_options['home-title']); ?></span></h2>			  
        </div>
        <?php } ?>
      <div class="row">
        <?php for ($relic_loop = 1; $relic_loop < 4; $relic_loop++): ?>
  <?php if (!empty($relic_options['home-icon-' . $relic_loop])) { ?>
            <div class="col-md-4 col-sm-4 blog-post">
              <div class="col-md-12 no-padding-lr listing-details">
                <?php if (!empty($relic_options['home-icon-' . $relic_loop])) { ?>						
                  <?php
                  $relic_image = esc_url($relic_options['home-icon-' . $relic_loop]);
                  $relic_id = relic_get_image_id($relic_image);
                  $relic_image = wp_get_attachment_image_src($relic_id, 'relic-home-tab-size');
                  ?>   
                  <div class="property-thumbnail">
                    <img alt="<?php echo $relic_loop; ?>" class="img-responsive" src="<?php echo esc_url($relic_image[0]); ?>" width="<?php echo $relic_image[1]; ?>" height="<?php echo $relic_image[2]; ?>">			
                    <div class="property-excerpt">
                      <?php if (!empty($relic_options['section-title-' . $relic_loop])) { ?>
                        <h4 class="address"><?php echo sanitize_text_field($relic_options['section-title-' . $relic_loop]); ?></h4>
                      <?php } ?>
                      <?php if (!empty($relic_options['section-content-' . $relic_loop])) { ?>
                        <p><?php echo sanitize_text_field($relic_options['section-content-' . $relic_loop]); ?></p>
      <?php } ?>
                    </div>
                  </div>						
					<?php if (!empty($relic_options['section-title-' . $relic_loop])) { ?>
						<div class="property-details">
						  <h4><?php echo sanitize_text_field($relic_options['section-title-' . $relic_loop]); ?></h4>                                   
						</div>
                  <?php } ?>
				<?php } ?>
              </div>
            </div>
    <?php } ?>
<?php endfor; ?>  
      </div>
    </div>                
    <div class="our-blog">
<?php if (!empty($relic_options['post-title'])) { ?>
        <div class="title">
          <h2><span><?php echo sanitize_text_field($relic_options['post-title']); ?></span></h2>			  
        </div>
      <?php } ?>
      <?php $relic_category = $relic_options['post-category-latest']; ?>
      <?php
      $relic_args = array(
          'ignore_sticky_posts' => '1',
          'meta_query' => array(
              array(
                  'key' => '_thumbnail_id',
                  'compare' => 'EXISTS'
              ),
          )
      );
      if (!empty($relic_category))
        $relic_args['cat'] = $relic_category;
      $relic_query = new WP_Query($relic_args);
      ?>
<?php if ($relic_query->have_posts()) { ?> 
        <div id="blog_slide">
          <?php while ($relic_query->have_posts()) {
            $relic_query->the_post();
            ?>    
            <div class="owl-item col-md-6">  
              <div class="blog-box">
                <div class="blog-details col-md-4 col-xs-6"> 							
    <?php relic_entry_meta(); ?> 											
                </div> 
                <div class="blog-img col-md-8 col-xs-6">
                  <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo get_the_title(); ?></a>
    <?php $relic_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'relic-home-tab-size'); ?>          
    <?php if ($relic_image[0] != "") { ?> 
                    <a href="<?php echo esc_url(get_permalink()); ?>"> 
                      <img alt="<?php the_title(); ?>" src="<?php echo esc_url($relic_image[0]); ?>" width="<?php echo $relic_image[1]; ?>" height="<?php echo $relic_image[2]; ?>" class="media-object img-responsive">
                    </a>
    <?php } ?> 
                </div>
              </div>
            </div>
        <?php } ?> 
        </div>
  <?php if ($relic_query->found_posts >= 3) { ?>
          <div class="slider-button">
            <a class="blog-prev left-right" href="javascript:void(0);"> 
              <i class="fa fa-angle-left"></i> 
            </a> 
            <a class="blog-next left-right" href="javascript:void(0);"> 
              <i class="fa fa-angle-right"></i> 
            </a> 
          </div>
        <?php } ?>
<?php } ?>       
    </div>
  </div> 
</section> 
<?php get_footer(); ?>
