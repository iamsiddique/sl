<?php
/*
 * relic Breadcrumbs
*/
function relic_custom_breadcrumbs() {
  $relic_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $relic_delimiter = '/'; // relic_delimiter between crumbs
  $relic_home = __('Home','relic'); // text for the 'Home' link
  $relic_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $relic_before = ' '; // tag before the current crumb
  $relic_after = ' '; // tag after the current crumb
  global $post;
  $relic_homelink = esc_url(home_url('/'));
  if (is_home() || is_front_page()) {
    if ($relic_showonhome == 1) echo '<li id="breadcrumbs"><a href="' . $relic_homelink . '">' . $relic_home . '</a></li>';
    
  }  else {
    echo '<li id="breadcrumbs_home"><a href="' . $relic_homelink . '">' . $relic_home . '</a> </li><li id="breadcrumbs">';
    
   if ( is_category() ) {
      $relic_thisCat = get_category(get_query_var('cat'), false);
      if ($relic_thisCat->parent != 0) echo get_category_parents($relic_thisCat->parent, TRUE, ' ' . $relic_delimiter . ' ');      
		echo $relic_before; _e('category','relic'); echo ' "'.single_cat_title('', false) . '"' . $relic_after;
    } 
    elseif ( is_search() ) {
      echo $relic_before; _e('Search Results For','relic'); echo ' "'. get_search_query() . '"' . $relic_after;
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $relic_delimiter . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $relic_delimiter . ' ';
      echo $relic_before . get_the_time('d') . $relic_after;
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $relic_delimiter . ' ';
      echo $relic_before . get_the_time('F') . $relic_after;
    } elseif ( is_year() ) {
      echo $relic_before . get_the_time('Y') . $relic_after;
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $relic_post_type = get_post_type_object(get_post_type());
        $relic_slug = $relic_post_type->rewrite;
        echo '<a href="' . $relic_homelink . '/' . $relic_slug['slug'] . '/">' . $relic_post_type->labels->singular_name . '</a>';
        if ($relic_showcurrent == 1) echo ' ' . $relic_delimiter . ' ' . $relic_before . get_the_title() . $relic_after;
      } else {
        $relic_cat = get_the_category(); $relic_cat = $relic_cat[0];
        $relic_cats = get_category_parents($relic_cat, TRUE, ' ' . $relic_delimiter . ' ');
        if ($relic_showcurrent == 0) $relic_cats = preg_replace("#^(.+)\s$relic_delimiter\s$#", "$1", $relic_cats);
        echo $relic_cats;
        if ($relic_showcurrent == 1) echo $relic_before . get_the_title() . $relic_after;
      }
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $relic_post_type = get_post_type_object(get_post_type());
      echo $relic_before . $relic_post_type->labels->singular_name . $relic_after;
    } elseif ( is_attachment() ) {
      $relic_parent = get_post($post->post_parent);
      $relic_cat = get_the_category($relic_parent->ID); $relic_cat = $relic_cat[0];
      echo get_category_parents($relic_cat, TRUE, ' ' . $relic_delimiter . ' ');
      echo '<a href="' . get_permalink($relic_parent) . '">' . $relic_parent->post_title . '</a>';
      if ($relic_showcurrent == 1) echo ' ' . $relic_delimiter . ' ' . $relic_before . get_the_title() . $relic_after;
    } elseif ( is_page() && !$post->post_parent ) {
      if ($relic_showcurrent == 1) echo $relic_before . get_the_title() . $relic_after;
    } elseif ( is_page() && $post->post_parent ) {
      $relic_parent_id  = $post->post_parent;
      $relic_breadcrumbs = array();
      while ($relic_parent_id) {
        $relic_page = get_page($relic_parent_id);
        $relic_breadcrumbs[] = '<a href="' . get_permalink($relic_page->ID) . '">' . get_the_title($relic_page->ID) . '</a>';
        $relic_parent_id  = $relic_page->post_parent;
      }
      $relic_breadcrumbs = array_reverse($relic_breadcrumbs);
      for ($relic_i = 0; $relic_i < count($relic_breadcrumbs); $relic_i++) {
        echo $relic_breadcrumbs[$relic_i];
        if ($relic_i != count($relic_breadcrumbs)-1) echo ' ' . $relic_delimiter . ' ';
      }
      if ($relic_showcurrent == 1) echo ' ' . $relic_delimiter . ' ' . $relic_before . get_the_title() . $relic_after;
    } elseif ( is_tag() ) {
      echo $relic_before; _e('Posts tagged','relic'); echo ' "'.  single_tag_title('', false) . '"' . $relic_after;
    } elseif ( is_author() ) {
       global $author;
      $relic_userdata = get_userdata($author);
      echo $relic_before; _e('Articles posted by ','relic'); echo $relic_userdata->display_name . $relic_after;
    } elseif ( is_404() ) {
      echo $relic_before; _e('Error 404','relic'); echo $relic_after;
    }
    
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','relic') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
    echo '</li>';
  }
} // end relic_custom_breadcrumbs()
