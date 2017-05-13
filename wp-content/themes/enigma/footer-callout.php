<?php $wl_theme_options = weblizar_get_options(); ?>
<div class="enigma_callout_area">
	<div class="container">
		<div class="row">
		<?php if($wl_theme_options['fc_title'] !='') { ?>
			<div class="col-md-12">
			<p><?php if($wl_theme_options['fc_icon'] !='') { ?><i class="<?php echo esc_attr($wl_theme_options['fc_icon']);?>"></i><?php } ?><!-- <?php echo esc_attr($wl_theme_options['fc_title']);?> -->
			<h4 class="text-center">We offer a free, no-obligation property valuation service to all homes in London &amp; Surrey</h4>
<p class="text-center">Extended? Renovated? Remortgaging? Considering selling later? Or just curious?</p>
<p class="text-center">We understand that getting an update on your property's value or rental potential can help you make better informed long-term decisions.</p>
<?php if($wl_theme_options['fc_btn_txt'] !='') { ?>
			<div class="col-md-12 text-center">
			<a href="<?php echo esc_url($wl_theme_options['fc_btn_link']); ?>" class="enigma_callout_btn"><?php echo esc_attr($wl_theme_options['fc_btn_txt']); ?></a>
			</div>
			<?php } ?>
			</p>
			</div>
			<?php } ?>
			<!-- <?php if($wl_theme_options['fc_btn_txt'] !='') { ?>
			<div class="col-md-3">
			<a href="<?php echo esc_url($wl_theme_options['fc_btn_link']); ?>" class="enigma_callout_btn"><?php echo esc_attr($wl_theme_options['fc_btn_txt']); ?></a>
			</div>
			<?php } ?> -->
		</div>
		
	</div>
	<div class="enigma_callout_shadow"></div>
</div>