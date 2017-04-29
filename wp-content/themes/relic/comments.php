<?php
/**
 * The Comments template file
 *
**/
if(!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) : 
endif;
if(!empty($post->post_password)) : 
	 if($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) :
	 endif;
endif; 
?>
<div class="clearfix"></div>
<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : 	?>	
	<div class="title">
	<h2>
		<span>
			<?php comments_number( '', __('1 comment', 'relic'), __('% comments', 'relic') ); ?>	
		</span>
	</h2>
	</div>
	<div class="comments-article">
		<ol class="comment-list">		
			<?php wp_list_comments( array( 'short_ping' => true, 'style' => 'ol') ); ?>
			<?php paginate_comments_links(); ?>	
		</ol>
	</div>	
	<?php else : ?>
	<p id="comments_status"><?php _e('No comments.','relic');?></p>
	<?php endif;  ?>
</div>
<?php comment_form(); ?>