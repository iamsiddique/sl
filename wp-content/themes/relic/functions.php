<?php
/*
 * Set up the content width value based on the theme's design.
 */
if ( ! function_exists( 'relic_setup' ) ) :
function relic_setup() {	
	
	register_nav_menus( array(
		'primary'   => __( 'Main Menu', 'relic' ),	
		 'footer' => __( 'Footer Menu', 'relic' )	
	) );
	global $content_width;
	if ( ! isset( $content_width ) ) $content_width = 730;
	
	load_theme_textdomain( 'relic', get_template_directory() . '/languages' );	
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(730, 404, true);
	add_image_size('relic-post-image', 580, 480, true);
	add_image_size('relic-home-tab-size', 380, 270, true);	
	add_image_size('relic-custom-widget-size',100, 80, true);
	
	add_theme_support('html5', array(
	   'search-form', 'comment-form', 'comment-list',
	));
	add_theme_support( 'custom-header', apply_filters( 'relic_custom_header_args', array(
	'uploads'       => true,
	'flex-height'   => true,
	'default-text-color' => '#fff',
	'header-text' => true,
	'height' => '110',
	'width'  => '1300'
 	) ) );
	add_theme_support( 'custom-background', apply_filters( 'relic_custom_background_args', array(
	'default-color' => 'f5f5f5',
	) ) );	
	     
	add_filter('use_default_gallery_style', '__return_false'); 
	add_editor_style('css/editor-style.css');
	add_theme_support( 'title-tag' );	  	
}
function relic_change_excerpt_more( $more ) {
	global $post;
    return (is_page_template('page-templates/front-page.php')) ? '' : '<div class="read-more"><a title="'. __('Read More','relic').'" href="'. esc_url(get_permalink($post->ID)) . '">' .  __('Read More','relic'). '</a></div>';          
}
add_filter('excerpt_more', 'relic_change_excerpt_more');
function relic_excerpt_length( $length ) {
    return (!is_page_template('page-templates/front-page.php')) ? 30 : 20;
}
add_filter( 'excerpt_length', 'relic_excerpt_length', 999 );
endif; // relic_setup
add_action( 'after_setup_theme', 'relic_setup' );
function relic_get_image_id($image_url) {
	global $wpdb;
	$relic_attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE guid='%s';", $image_url )); 
        return $relic_attachment[0]; 
}
/*** Enqueue css and js files ***/
require get_template_directory() . '/functions/enqueue-files.php';
/*** Enqueue breadcrumbs files ***/
require get_template_directory() . '/functions/breadcrumbs.php';
/*** default setup files ***/
require get_template_directory() . '/functions/theme-default-setup.php';
/***Theme Option***/
require get_template_directory() . '/theme-options/theme-options.php';
?>
