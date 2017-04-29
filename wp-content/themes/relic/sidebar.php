<?php 
/**
 * The right sidebar template file
**/
?>
<div class="col-md-4 col-sm-5">
<?php if ( is_active_sidebar( 'sidebar-1' ) ) { 
			 dynamic_sidebar( 'sidebar-1' );
	 } ?>
</div>
