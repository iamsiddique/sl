<?php
/*
 * Relic Enqueue css and js files
*/
function relic_enqueue() {
  wp_enqueue_style('relic-bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '04302015', '');
  wp_enqueue_style('relic-font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '04302015', '');
  wp_enqueue_style('relic-style', get_stylesheet_uri());
  wp_enqueue_script('relic-bootstrapjs', get_template_directory_uri() . '/js/bootstrap.js', array('jquery'));
  wp_enqueue_script('relic-defaultjs', get_template_directory_uri() . '/js/default.js', array('jquery'));
  if (is_page_template('page-templates/front-page.php')) {
    wp_enqueue_style('relic-owl-curousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '04302015', '');
    wp_enqueue_script('relic-homepage-js', get_template_directory_uri() . '/js/home-page.js', array('jquery'));
    wp_enqueue_script('relic-owl-curousel-js', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'));
  }
  if (is_singular())
    wp_enqueue_script("comment-reply");
}
add_action('wp_enqueue_scripts', 'relic_enqueue');
