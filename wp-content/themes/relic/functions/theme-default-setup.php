<?php
/*
 * thumbnail list
 */
function relic_thumbnail_image($content) {
  if (has_post_thumbnail())
    return the_post_thumbnail('thumbnail');
}
/*
 * relic Main Sidebar
 */
function relic_widgets_init() {
  register_sidebar(array(
      'name' => __('Main Sidebar', 'relic'),
      'id' => 'sidebar-1',
      'description' => __('Main sidebar that appears on the right.', 'relic'),
      'before_widget' => '<div class="sidebar-widget %2$s" id="%1$s" >',
      'after_widget' => '</div>',
      'before_title' => '<h4>',
      'after_title' => '</h4>',
  ));
  register_sidebar(array(
      'name' => __('Footer area one', 'relic'),
      'id' => 'footer-1',
      'description' => __('Footer area one that appears on the footer.', 'relic'),
      'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ));
  register_sidebar(array(
      'name' => __('Footer area two', 'relic'),
      'id' => 'footer-2',
      'description' => __('Footer area two that appears on the footer.', 'relic'),
      'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ));
  register_sidebar(array(
      'name' => __('Footer area three', 'relic'),
      'id' => 'footer-3',
      'description' => __('Footer area three that appears on the footer.', 'relic'),
      'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ));
  register_sidebar(array(
      'name' => __('Footer area four', 'relic'),
      'id' => 'footer-4',
      'description' => __('Footer area four that appears on the footer.', 'relic'),
      'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
  ));
}
add_action('widgets_init', 'relic_widgets_init');
/*
 * relic Set up post entry meta.
 *
 * Meta information for current post: categories, tags, permalink, author, and date.
 */
function relic_entry_meta() {
  $relic_categories_list = get_the_category_list(', ', ' ');
  $relic_tag_list = get_the_tag_list('', ',');
  $relic_author = get_the_author();
  $relic_author_url = esc_url(get_author_posts_url(get_the_author_meta('ID')));
  $relic_comments = wp_count_comments(get_the_ID());
  $relic_date = sprintf('<time datetime="%1$s">%2$s</time>', sanitize_text_field(get_the_date('c')), esc_html(get_the_date())
  );
  ?>	
  <ul>
    <li><i class="fa fa-calendar"></i>
      <a href="<?php echo esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))); ?>" rel="tag"><?php echo $relic_date; ?></a>
    </li>
    <li><i class="fa fa-user"></i>
      <a href="<?php echo $relic_author_url; ?>" rel="tag"><?php echo $relic_author; ?></a>
    </li>						
    <?php if (!empty($relic_tag_list) && !is_page_template('page-templates/front-page.php')) { ?><li class="tag-list"><i class="fa fa-tag"></i><?php echo $relic_tag_list; ?></li><?php } ?>
    <?php if (!empty($relic_categories_list) && !is_page_template('page-templates/front-page.php')) { ?><li class="category-list"><i class="fa fa-folder-open "></i><?php echo $relic_categories_list; ?></li><?php } ?>
    <li><i class="fa fa-comments"></i><?php comments_number(__('No Comments', 'relic'), __('1 Comment', 'relic'), __('% Comments', 'relic')); ?></li>
  </ul>
  <?php
}
/*
 * pagination
 * */
function relic_pagination() {
	if(is_single()){
		the_post_navigation( array(
			'prev_text' => '<div class="relic_previous_pagination alignleft">%title</div>',
			'next_text' => '<div class="relic_next_pagination alignright">%title</div>',
		) );
	}else{
		the_posts_pagination(array(
		  'prev_text' => '<i class="fa fa-angle-double-left"></i>',
		  'next_text' => '<i class="fa fa-angle-double-right"></i>',
		  'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
		));
	}
}
/*
 * Comments placeholder function
 * 
 * */
add_filter('comment_form_default_fields', 'relic_comment_placeholders');
function relic_comment_placeholders($fields) {
  $fields['author'] = str_replace(
          '<input', '<input placeholder="'
          . _x(
                  'Name *', 'comment form placeholder', 'relic'
          )
          . '" required', $fields['author']
  );
  $fields['email'] = str_replace(
          '<input', '<input placeholder="'
          . _x(
                  'E-mail *', 'comment form placeholder', 'relic'
          )
          . '" required', $fields['email']
  );
  return $fields;
}
add_filter('comment_form_defaults', 'relic_textarea_insert');
function relic_textarea_insert($fields) {
  $fields['comment_field'] = str_replace(
          '<textarea', '<textarea  placeholder="'
          . _x(
                  'Comment', 'comment form placeholder', 'relic'
          )
          . '" ', $fields['comment_field']
  );
  return $fields;
}
?>
