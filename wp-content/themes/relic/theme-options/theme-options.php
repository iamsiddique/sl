<?php
function relic_options_init() {
  register_setting('relic_option', 'relic_theme_options', 'relic_option_validate');
}
add_action('admin_init', 'relic_options_init');
function relic_option_validate($input) {
  $input['logo'] = esc_url_raw($input['logo']);
  $input['favicon'] = esc_url_raw($input['favicon']);
  $input['footertext'] = sanitize_text_field($input['footertext']);
  $input['email'] = sanitize_email($input['email']);
  $input['phone'] = sanitize_text_field($input['phone']);
  $input['twitter'] = esc_url_raw($input['twitter']);
  $input['fburl'] = esc_url_raw($input['fburl']);
  $input['pinterest'] = esc_url_raw($input['pinterest']);
  $input['linkedin'] = esc_url_raw($input['linkedin']);
  $input['gplus'] = esc_url_raw($input['gplus']);
  $input['rss'] = esc_url_raw($input['rss']);
  $input['home-title'] = sanitize_text_field($input['home-title']);
  $input['post-title'] = sanitize_text_field($input['post-title']);
  for ($relic_i = 1; $relic_i <= 5; $relic_i++):
    $input['slider-img-' . $relic_i] = esc_url_raw($input['slider-img-' . $relic_i]);
    $input['slidelink-' . $relic_i] = esc_url_raw($input['slidelink-' . $relic_i]);
  endfor;
  for ($relic_section_i = 1; $relic_section_i <= 3; $relic_section_i++):
    $input['home-icon-' . $relic_section_i] = esc_url_raw($input['home-icon-' . $relic_section_i]);
    $input['section-title-' . $relic_section_i] = sanitize_text_field($input['section-title-' . $relic_section_i]);
    $input['section-content-' . $relic_section_i] = sanitize_text_field($input['section-content-' . $relic_section_i]);
  endfor;
  return $input;
}
function relic_framework_load_scripts($hook) {
	if($GLOBALS['relic_menu'] == $hook){
		wp_enqueue_media();
		wp_enqueue_style('relic-theme-option-css', get_template_directory_uri() . '/theme-options/css/theme-option.css', false, '1.0.0');
		wp_enqueue_script('relic-options-custom-js', get_template_directory_uri() . '/theme-options/js/theme-option.js', array('jquery'));
		wp_enqueue_script('relic-media-uploader', get_template_directory_uri() . '/theme-options/js/media-uploader.js', array('jquery'));
	}
}
function relic_framework_menu_settings() {
  $relic_menu = array(
      'page_title' => __('Themes Options', 'relic'),
      'menu_title' => __('Theme Options', 'relic'),
      'capability' => 'edit_theme_options',
      'menu_slug' => 'relic_framework',
      'callback' => 'relic_framework_page'
  );
  return apply_filters('relic_framework_menu', $relic_menu);
}
add_action('admin_menu', 'relic_options_add_page');
function relic_options_add_page() {
  $relic_menu = relic_framework_menu_settings();
  $GLOBALS['relic_menu']=add_theme_page($relic_menu['page_title'], $relic_menu['menu_title'], $relic_menu['capability'], $relic_menu['menu_slug'], $relic_menu['callback']);
  add_action('admin_enqueue_scripts', 'relic_framework_load_scripts');  
}
function relic_framework_page() {
  global $select_options;
  if (!isset($_REQUEST['settings-updated']))
    $_REQUEST['settings-updated'] = false;
  ?>
  <div class="relic-themes">
    <form method="post" action="options.php" id="form-option" class="theme_option_ft">
      <div class="relic-header">
        <div class="logo">
  <?php
  $relic_image = get_template_directory_uri() . '/theme-options/images/logo.png';
  echo "<a href='https://fasterthemes.com/' target='_blank'><img src='" . esc_url($relic_image) . "' alt='FasterThemes' /></a>";
  ?>
        </div>
        <div class="header-right">		
          <div class='btn-save'><input type='submit' class='button-primary' value='<?php _e('Save Options', 'relic'); ?>' />
          </div>
        </div>
      </div>
      <div class="relic-details">
        <div class="relic-options">
          <div class="right-box">
            <div class="nav-tab-wrapper">
              <div class="option-title">
                <h2><?php _e('Theme Options', 'relic'); ?></h2>
              </div>  
              <ul>
                <li><a id="options-group-1-tab" class="nav-tab basicsettings-tab" title="<?php _e('Basic Settings', 'relic'); ?>" href="#options-group-1"><?php _e('Basic Settings', 'relic'); ?></a></li>
                <li><a id="options-group-2-tab" class="nav-tab homepagesettings-tab" title="<?php _e('Home Page Settings', 'relic'); ?>" href="#options-group-2"><?php _e('Home Page Settings', 'relic'); ?></a></li>
                <li><a id="options-group-3-tab" class="nav-tab socialsettings-tab" title="<?php _e('Social Settings', 'relic'); ?>" href="#options-group-3"><?php _e('Social Settings', 'relic'); ?></a></li> 
				 <li><a id="options-group-4-tab" class="nav-tab profeatures-tab" title="<?php _e('PRO Theme Features','relic');?>" href="#options-group-4"><?php _e('PRO Theme Features','relic');?></a></li> 
              </ul>
            </div>
          </div>
          <div class="right-box-bg"></div>
          <div class="postbox left-box"> 
            <!--======================== F I N A L - - T H E M E - - O P T I O N ===================-->
  <?php
  settings_fields('relic_option');
  $relic_options = get_option('relic_theme_options');
  ?>
            <!-------------- Header group ----------------->
            <div id="options-group-1" class="group theme-option-inner-tabs">                    
              <div class="section theme-tabs theme-logo">
                <a class="heading theme-option-inner-tab active" href="javascript:void(0)"><?php _e('Site Logo (Recommended Size : 300px * 120px)', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group active">				
                  <div class="ft-control">
						<span class="error-msg hide"></span>
                    <input id="logo-img" class="upload" type="text" name="relic_theme_options[logo]" 
                           value="<?php if (!empty($relic_options['logo'])) {
                      echo esc_attr($relic_options['logo']);
                    } ?>" placeholder="<?php _e('No file chosen', 'relic'); ?>" />
                    <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'relic'); ?>" />
                    <div class="screenshot" id="logo-image">
  <?php if (!empty($relic_options['logo'])) { ?>
                        <img src="<?php echo esc_url($relic_options['logo']); ?>" />
                        <a class='remove-image'> </a>
  <?php } ?>
                    </div>
                  </div>              
                </div>
              </div>
              <div class="section theme-tabs theme-favicon">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Favicon (Recommended Size : 32px * 32px)', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
						<span class="error-msg hide"></span>
                    <input id="favicon-img" class="upload" type="text" name="relic_theme_options[favicon]" 
                           value="<?php if (!empty($relic_options['favicon'])) {
    echo esc_attr($relic_options['favicon']);
  } ?>" placeholder="<?php _e('No file chosen', 'relic'); ?>" />
                    <input id="upload_image_button1" class="upload-button button" type="button" value="<?php _e('Upload', 'relic'); ?>" />
                    <div class="screenshot" id="favicon-image">
  <?php if (!empty($relic_options['favicon'])) { ?>
                        <img src="<?php echo esc_url($relic_options['favicon']); ?>" />
                        <a class='remove-image'> </a>
  <?php } ?>
                    </div>
                  </div>                
                </div>
              </div>     
              <div id="section-footertext" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Copyright Text', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Some text regarding copyright of your site, you would like to display in the footer.', 'relic'); ?></div>                
                    <input type="text" id="footertext" class="of-input" name="relic_theme_options[footertext]" size="32"  value="<?php if (!empty($relic_options['footertext'])) {
    echo sanitize_text_field($relic_options['footertext']);
  } ?>">
                  </div>                
                </div>
              </div>
              <div id="section-email" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Email', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Enter e-mail id for your site , you would like to display in the Top Header.', 'relic'); ?></div>                
                    <input type="text" id="email" class="of-input" name="relic_theme_options[email]" size="32"  value="<?php if (!empty($relic_options['email'])) {
    echo sanitize_text_field($relic_options['email']);
  } ?>">
                  </div>                
                </div>
              </div>
              <div id="section-phone" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Phone', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Enter phone number for your site , you would like to display in the Top Header.', 'relic'); ?></div>                
                    <input type="text" id="phone" class="of-input" name="relic_theme_options[phone]" size="32"  value="<?php if (!empty($relic_options['phone'])) {
    echo sanitize_text_field($relic_options['phone']);
  } ?>">
                  </div>                
                </div>
              </div>                        
            </div>          
            <!-------------- Home Page group ----------------->
            <div id="options-group-2" class="group theme-option-inner-tabs">
              <h3><?php _e('Banner Slider', 'relic'); ?></h3>
  <?php for ($relic_i = 1; $relic_i <= 5; $relic_i++): ?> 
                <div class="section theme-tabs theme-slider-img">
                  <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Slider', 'relic');
    echo $relic_i; ?><?php _e(' (Recommended Size : 1350px * 350px)', 'relic'); ?></a>
                  <div class="theme-option-inner-tab-group">
                    <div class="ft-control">
						<span class="error-msg hide"></span>
                      <input id="slider-img-<?php echo $relic_i; ?>" class="upload" type="text" name="relic_theme_options[slider-img-<?php echo $relic_i; ?>]" 
                             value="<?php if (!empty($relic_options['slider-img-' . $relic_i])) {
              echo esc_attr($relic_options['slider-img-' . $relic_i]);
            } ?>" placeholder="<?php _e('No file chosen', 'relic'); ?>" />
                      <input id="1upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'relic'); ?>" />
                      <div class="screenshot" id="slider-img-<?php echo $relic_i; ?>">
    <?php if (!empty($relic_options['slider-img-' . $relic_i])) { ?>
                          <img src="<?php echo esc_url($relic_options['slider-img-' . $relic_i]); ?>" />
                          <a class='remove-image'> </a>
    <?php } ?>
                      </div>
                    </div>            
                    <div class="ft-control">
                      <input type="text" placeholder="<?php _e('Sliderlink', 'relic');
    echo $relic_i; ?>" id="slidelink-<?php echo $relic_i; ?>" class="of-input" name="relic_theme_options[slidelink-<?php echo $relic_i; ?>]" size="32"  value="<?php if (!empty($relic_options['slidelink-' . $relic_i])) {
      echo esc_url($relic_options['slidelink-' . $relic_i]);
    } ?>">
                    </div>                              
                  </div>            
                </div>
                      <?php endfor; ?> 
              <h3><?php _e('First Section', 'relic'); ?></h3>
              <div id="section-title" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Title', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Enter home page title for your site , you would like to display in the Home Page.', 'relic'); ?></div>                
                    <input id="title" class="of-input" name="relic_theme_options[home-title]" type="text" size="50" value="<?php if (!empty($relic_options['home-title'])) {
                      echo sanitize_text_field($relic_options['home-title']);
                    } ?>" />
                  </div>                
                </div>
              </div> 
              <?php for ($relic_section_i = 1; $relic_section_i <= 3; $relic_section_i++): ?>
                <div class="section theme-tabs theme-slider-img">
                  <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Tab', 'relic'); ?> <?php echo $relic_section_i; ?><?php _e(' (Recommended Size : 380px * 270px)', 'relic'); ?></a>
                  <div class="theme-option-inner-tab-group">
                    <div class="ft-control">
						<span class="error-msg hide"></span>
                      <input id="first-image-<?php echo $relic_section_i; ?>" class="upload" type="text" name="relic_theme_options[home-icon-<?php echo $relic_section_i; ?>]" 
                             value="<?php if (!empty($relic_options['home-icon-' . $relic_section_i])) {
              echo esc_attr($relic_options['home-icon-' . $relic_section_i]);
            } ?>" placeholder="<?php _e('No file chosen', 'relic'); ?>" />
                      <input id="upload_image_button" class="upload-button button" type="button" value="<?php _e('Upload', 'relic'); ?>" />
                      <div class="screenshot" id="first-img-<?php echo $relic_section_i; ?>">
    <?php if (!empty($relic_options['home-icon-' . $relic_section_i])) { ?>
                          <img src="<?php echo esc_url($relic_options['home-icon-' . $relic_section_i]); ?>"/>
                          <a class='remove-image'> </a>
    <?php } ?>
                      </div>
                    </div>            
                    <div class="ft-control">
                      <div class="explain"><?php _e('Enter section title for your home template , you would like to display in the Home Page.', 'relic'); ?></div>
                      <input type="text" placeholder="<?php _e('Enter title here', 'relic'); ?>" id="title-<?php echo $relic_section_i; ?>" class="of-input" name="relic_theme_options[section-title-<?php echo $relic_section_i; ?>]" size="32"  value="<?php if (!empty($relic_options['section-title-' . $relic_section_i])) {
                      echo sanitize_text_field($relic_options['section-title-' . $relic_section_i]);
                    } ?>">
                    </div>
                    <div class="ft-control">
                      <div class="explain"><?php _e('Enter section content for home template , you would like to display in the Home Page.', 'relic'); ?></div>
                      <textarea name="relic_theme_options[section-content-<?php echo $relic_section_i; ?>]" rows="6" id="content-<?php echo $relic_section_i; ?>" placeholder="<?php _e('Enter Content here', 'relic'); ?>" class="of-input" maxlength="200"><?php if (!empty($relic_options['section-content-' . $relic_section_i])) {
                      echo sanitize_text_field($relic_options['section-content-' . $relic_section_i]);
                    } ?></textarea>             
                    </div>                              
                  </div>            
                </div>
                      <?php endfor; ?>
              <h3><?php _e('Second Section', 'relic'); ?></h3>
              <div id="section-title" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Title', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Enter Latest post title for your site , you would like to display in the Home Page.', 'relic'); ?></div>                
                    <input id="title" class="of-input" name="relic_theme_options[post-title]" type="text" size="50" value="<?php if (!empty($relic_options['post-title'])) {
                      echo sanitize_text_field($relic_options['post-title']);
                    } ?>" />
                  </div>                
                </div>
              </div>          
              <div class="section theme-tabs theme-short_description">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Select Category', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">					
                    <div class="explain"><?php _e('Select Categories of posts for your site , you would like to display in the Home Page.', 'relic'); ?></div> 
                    <select name="relic_theme_options[post-category-latest]" id="category">
                      <option value=""><?php _e('Select Category', 'relic'); ?></option>
						<?php
						$relic_args = array(
						  'meta_query' => array(
							  array(
								  'key' => '_thumbnail_id',
								  'compare' => 'EXISTS'
							  ),
						  )
						);
						$relic_post = new WP_Query($relic_args);
						if($relic_post->found_posts > 0){
						  $relic_cat_id = array();
						  while ($relic_post->have_posts()) {
							$relic_post->the_post();
							$relic_post_categories = wp_get_post_categories(get_the_id());
							$relic_cat_id[] = $relic_post_categories[0];
						  }
						  $relic_cat_id = array_unique($relic_cat_id);
						  $relic_args = array(
							  'orderby' => 'name',
							  'parent' => 0,
							  'include' => $relic_cat_id
						  );
						  $relic_categories = get_categories($relic_args);
						  foreach ($relic_categories as $relic_category) {
							if ($relic_category->term_id == $relic_options['post-category-latest'])
							  $relic_selected = "selected=selected";
							else
							  $relic_selected = '';
							$relic_option = '<option value="' . $relic_category->term_id . '" ' . $relic_selected . '>';
							$relic_option .= $relic_category->cat_name;
							$relic_option .= '</option>';
							echo $relic_option;
						  }
						}
						?>
                    </select>                
                  </div>                
                </div>
              </div>            		
            </div>
            <!-------------- Social group ----------------->
            <div id="options-group-3" class="group theme-option-inner-tabs">            
              <div id="section-facebook" class="section theme-tabs">
                <a class="heading theme-option-inner-tab active" href="javascript:void(0)"><?php _e('Facebook', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group active">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Facebook profile or page URL ', 'relic'); ?>i.e. http://facebook.com/username/ </div>                
                    <input id="facebook" class="of-input" name="relic_theme_options[fburl]" size="30" type="text" value="<?php if (!empty($relic_options['fburl'])) {
                        echo esc_url($relic_options['fburl']);
                      } ?>" />
                  </div>                
                </div>
              </div>
              <div id="section-twitter" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Twitter', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Twitter profile or page URL ', 'relic'); ?>i.e. http://www.twitter.com/username/</div>                
                    <input id="twitter" class="of-input" name="relic_theme_options[twitter]" type="text" size="30" value="<?php if (!empty($relic_options['twitter'])) {
                        echo esc_url($relic_options['twitter']);
                      } ?>" />
                  </div>                
                </div>
              </div>
              <div id="section-gplus" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Google Plus', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Google plus profile or page URL ', 'relic'); ?>i.e. https://plus.google.com/username/</div>                
                    <input id="gplus" class="of-input" name="relic_theme_options[gplus]" type="text" size="30" value="<?php if (!empty($relic_options['gplus'])) {
                        echo esc_url($relic_options['gplus']);
                      } ?>" />
                  </div>                
                </div>
              </div>
              <div id="section-pinterest" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Pinterest', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('pinterest profile or page URL ', 'relic'); ?>i.e. https://pinterest.com/username/</div>                
                    <input id="pinterest" class="of-input" name="relic_theme_options[pinterest]" type="text" size="30" value="<?php if (!empty($relic_options['pinterest'])) {
    echo esc_url($relic_options['pinterest']);
  } ?>" />
                  </div>                
                </div>
              </div>
              <div id="section-linkedin" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('Linkedin', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('Linkedin profile or page URL ', 'relic'); ?>i.e. https://linkedin.com/username/</div>                
                    <input id="linkedin" class="of-input" name="relic_theme_options[linkedin]" type="text" size="30" value="<?php if (!empty($relic_options['linkedin'])) {
    echo esc_url($relic_options['linkedin']);
  } ?>" />
                  </div>                
                </div>
              </div>
              <div id="section-rss" class="section theme-tabs">
                <a class="heading theme-option-inner-tab" href="javascript:void(0)"><?php _e('RSS', 'relic'); ?></a>
                <div class="theme-option-inner-tab-group">
                  <div class="ft-control">
                    <div class="explain"><?php _e('RSS profile or page URL ', 'relic'); ?>i.e. https://www.rss.com/username/</div>                
                    <input id="rss" class="of-input" name="relic_theme_options[rss]" type="text" size="30" value="<?php if (!empty($relic_options['rss'])) {
    echo esc_url($relic_options['rss']);
  } ?>" />
                  </div>                
                </div>
              </div>
            </div>
            <!-------------- Social group ----------------->        
          
			<div id="options-group-4" class="group theme-option-inner-tabs relic-pro-image">  
				<div class="relic-pro-header">
				  <img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/relic-logo.png" class="relic-pro-logo" />
				  <a href="https://fasterthemes.com/wordpress-themes/relic/" target="_blank">
						<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/button.png" class="relic-pro-buynow" /></a>
				  </div>
				<img src="<?php echo get_template_directory_uri(); ?>/theme-options/images/relic_pro_features.png" />
			  </div>           
          
            <!--======================== F I N A L - - T H E M E - - O P T I O N S ===================--> 
          </div>
        </div>
      </div>
      <div class="relic-footer">
        <ul>        	
          <li class="btn-save"><input type="submit" class="button-primary" value="<?php _e('Save options', 'relic'); ?>" /></li>
        </ul>
      </div>
    </form>    
  </div>
<?php } ?>
