<?php
/**
 * 404 page template file
 * */
get_header();
?>
<section>	
  <div class="breadcumb-bg">
    <div class="webpage-container container">
      <div class="site-breadcumb">
        <h1><?php _e('Epic 404 - Article Not Found', 'relic'); ?></h1>
        <ol class="breadcrumb breadcrumb-menubar">
<?php if (function_exists('relic_custom_breadcrumbs')) relic_custom_breadcrumbs(); ?>
        </ol>
      </div>
    </div>
  </div>    	
  <div class="webpage-container"> 
    <div class="agent-blog">
      <div class="col-md-12">		
        <div class="agent-blog-bg">				
          <div class="about-agent">                               
            <h1><?php _e('Epic 404 - Article Not Found', 'relic'); ?></h1>			
            <p><?php _e("This is embarassing. We can't find what you were looking for.", 'relic'); ?></p>
            <p><?php _e('Whatever you were looking for was not found, but maybe try looking again or search using the form below.', 'relic'); ?></p>                                                              
            <div class="col-md-4 col-sm-4">						  
<?php get_search_form(); ?>						  
            </div>
          </div>					
        </div>				
      </div>
    </div>	
  </div> 
</section>
<?php get_footer(); ?>
