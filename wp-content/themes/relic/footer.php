<?php $relic_options = get_option('relic_theme_options'); ?>
<footer class="main_footer">
  <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3') || is_active_sidebar('footer-4')) { ?>
    <div class="top_footer">
      <div class="container webpage-container">
        <div class="row">				      
          <?php if (is_active_sidebar('footer-1')) { ?>
            <aside class="col-md-3 col-sm-6"> 
              <?php dynamic_sidebar('footer-1'); ?>
            </aside>
          <?php } ?>
          <?php if (is_active_sidebar('footer-2')) { ?>
            <aside class="col-md-3 col-sm-6"> 
              <?php dynamic_sidebar('footer-2'); ?>
            </aside>
          <?php } ?>
          <?php if (is_active_sidebar('footer-3')) { ?>
            <aside class="col-md-3 col-sm-6"> 
              <?php dynamic_sidebar('footer-3'); ?>
            </aside>
			<?php } ?>
			
          <?php if (is_active_sidebar('footer-4')) { ?>
            <aside class="col-md-3 col-sm-6"> 
              <?php dynamic_sidebar('footer-4'); ?>
            </aside>
          <?php } ?>	
        </div>      
      </div>
    </div>
  <?php } ?>
  <div class="bottom-footer">
    <div class="container webpage-container">
      <p>
        <?php if (!empty($relic_options['footertext'])) { ?> 
          <?php echo esc_html($relic_options['footertext']); ?>
        <?php } printf( __( 'Powered by %1$s.', 'relic' ), '<a href="#" target="_blank">Powered by HQV Technologies</a>' );?>
      </p>
      <div class="terms">
        <?php
        if (has_nav_menu('footer')) {
          $relic_defaults = array(
              'theme_location' => 'footer',
              'echo' => true,
              'items_wrap' => '<ul id="%1$s" class="%2$s footer-menu">%3$s</ul>',
              'depth' => 1
          );
          wp_nav_menu($relic_defaults);
        }
        ?> 				
      </div>
    </div>
  </div>
</footer>
<?php wp_footer(); ?>        
</body>
</html>