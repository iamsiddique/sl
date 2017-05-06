<?php
/**
 * The Header template file
 */
$relic_options = get_option('relic_theme_options');
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
  <!--<![endif]-->
  <!--[if lt IE 9]>
  <script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/html5.js"></script>
  <![endif]-->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">  
    <?php if (!empty($relic_options['favicon'])) { ?>
      <link rel="shortcut icon" href="<?php echo esc_url($relic_options['favicon']); ?>"> 
    <?php } ?>	   
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>       
    <header>
      <?php if (!empty($relic_options['email']) || !empty($relic_options['phone']) || !empty($relic_options['fburl']) || !empty($relic_options['twitter']) || !empty($relic_options['gplus']) || !empty($relic_options['linkedin']) || !empty($relic_options['pinterest']) || !empty($relic_options['rss'])) { ?>
        <div class="menubar">
          <div class="webpage-container">
            <?php if (!empty($relic_options['email']) || !empty($relic_options['phone'])) { ?>
              <div class="col-md-6">
                <div class="contact-info">
                  <ul>
                    <?php if (!empty($relic_options['phone'])) { ?>						
                      <li><i class="fa fa-phone"></i><?php echo esc_attr($relic_options['phone']); ?></li>
                    <?php } ?>
                    <?php if (!empty($relic_options['email'])) { ?>						
                      <li><i class="fa fa-envelope"></i><a href="mailto:<?php echo esc_attr($relic_options['email']); ?>"><?php echo esc_attr($relic_options['email']); ?></a></li> 
                    <?php } ?>							                       
                  </ul>
                </div>
              </div>
            <?php } ?>

            <?php if (!empty($relic_options['fburl']) || !empty($relic_options['twitter']) || !empty($relic_options['gplus']) || !empty($relic_options['linkedin']) || !empty($relic_options['pinterest']) || !empty($relic_options['rss'])) { ?>
              <div class="col-md-6 <?php echo (empty($relic_options['email']) && empty($relic_options['phone'])) ? 'col-md-offset-6' : ''; ?>">
                <div class="social-link">
                  <ul>
                    <?php if (!empty($relic_options['fburl'])) { ?>						
                      <li><a href="<?php echo esc_url($relic_options['fburl']); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($relic_options['twitter'])) { ?>
                      <li><a href="<?php echo esc_url($relic_options['twitter']); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($relic_options['linkedin'])) { ?>
                      <li><a href="<?php echo esc_url($relic_options['linkedin']); ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php } ?>
                    <?php if (!empty($relic_options['pinterest'])) { ?>						
                      <li><a href="<?php echo esc_url($relic_options['pinterest']); ?>"><i class="fa fa-pinterest"></i></a></li>
                    <?php } ?>  						
                    <?php if (!empty($relic_options['gplus'])) { ?>						
                      <li><a href="<?php echo esc_url($relic_options['gplus']); ?>"><i class="fa fa-google-plus"></i></a></li>  
                    <?php } ?>
                    <?php if (!empty($relic_options['rss'])) { ?>
                      <li><a href="<?php echo esc_url($relic_options['rss']); ?>"><i class="fa fa-rss"></i></a></li>
                    <?php } ?>						                     
                  </ul>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      <?php } ?>
      <div class="<?php echo (!is_page_template('page-templates/front-page.php')) ? 'menu-bar' : 'transparent-menubar'; ?>">
        <div class="header_bottom">
          <div class="container webpage-container">
            <div class="col-md-12 no-padding-lr"> 
              <div class="header_menu">               
                <div class="col-md-2 logo-display  no-padding-lr">                                    
                  <?php
                  if (!empty($relic_options['logo'])) {
                    $relic_logo_details = getimagesize($relic_options['logo']);
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>"><img class="img-responsive" alt="<?php _e('logo', 'relic') ?>" src="<?php echo esc_url($relic_options['logo']); ?>" height="<?php echo $relic_logo_details[1]; ?>" width="<?php echo $relic_logo_details[0]; ?>" ></a> 
<?php } else { ?>		  
                    <a class="home-link" style="color:#<?php echo get_header_textcolor(); ?>!important;" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                      <h2 class="site-title"><?php bloginfo('name'); ?></h2>							
                    </a>
                    <h4 class="site-description"><?php bloginfo('description'); ?></h4>
                    <?php } ?>
                  <div class="navbar-header res-nav-header toggle-respon">
<?php if (has_nav_menu('primary')) { ?>
                      <button type="button" class="navbar-toggle" data-toggle="collapse" 
                              data-target="#example-navbar-collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
<?php } ?>
                  </div>
                </div>                              
                <div class="col-md-10 no-padding-lr">                  
                  <nav class="main_menu navigation-deafault" role="navigation">                
                    <?php
                    if (has_nav_menu('primary')) {
                      $relic_defaults = array(
                          'theme_location' => 'primary',
                          'container' => 'div',
                          'container_class' => 'collapse navbar-collapse nav_coll main-menu-ul no-padding-lr',
                          'container_id' => 'example-navbar-collapse',
                          'menu_class' => 'gg-navbar',
                          'menu_id' => '',
                          'submenu_class' => '',
                          'echo' => true,
                          'before' => '',
                          'after' => '',
                          'link_before' => '',
                          'link_after' => '',
                          'items_wrap' => '<ul id="%1$s menu" class="%2$s main-menu">%3$s</ul>',
                          'depth' => 0
                      );
                      wp_nav_menu($relic_defaults);
                    }
                    ?>                                                
                  </nav>	             
                </div>
              </div>				
            </div>
          </div> 
        </div>
      </div>	
    </header>

<?php
if(is_front_page()){
 wowslider(7); 
}
else{?>
<div class="custom-header"></div>
<?php
}
?>
    <?php
    $relic_header_image = get_header_image();
    if (!empty($relic_header_image)) {
      ?>
      <div class="webpage-container container custom-header">
        <img src="<?php echo esc_url($relic_header_image); ?>" class="header-image img-responsive" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php _e('custom-header', 'relic') ?>" />
      </div>
    <?php } ?>
