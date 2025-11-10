<?php 

add_action('init', 'quote_custom_post_types');
function quote_custom_post_types() {

	// Product features
		$labels = array(
			'name' => _x('Quotes', 'post type general name'),
			'singular_name' => _x('Quote', 'post type singular name'),
			'add_new' => _x('Add Quote', 'Support posts'),
			'add_new_item' => __('Add New Quote'),
			'edit_item' => __('Edit Quote'),
			'new_item' => __('New Quote'),
			'view_item' => __('View Quote'),
			'search_items' => __('Search Quote'),
			'not_found' =>  __('No Quote found'),
			'not_found_in_trash' => __('No Quote posts found in Trash'),
			'parent_item_colon' => ''
		);
		register_post_type(
			'quote',
			array(
				'labels' => $labels,
				'public' => true,
				'show_ui' => true,
				'hierarchical' => false,				
				'rewrite' => true,
				'exclude_from_search' => false,
				'show_in_nav_menus' => false,
				'supports' => array(
					'title',
					'editor',
					//'page-attributes',
					//'thumbnail',
					//'excerpt',
					//'comments',
					//'author'
				)
			)
		);

}function add_admin_quote_scripts( $hook ) {    global $post;    if ( $hook == 'post-new.php' || $hook == 'post.php' ) {        if ( 'quote' === $post->post_type ) {                 wp_enqueue_script(  'quotescript', get_stylesheet_directory_uri().'/js/quotescript.js' );        }    }}add_action( 'admin_enqueue_scripts', 'add_admin_quote_scripts', 10, 1 );
//add_action( 'init', 'build_quote_taxonomies', 0 );   
  
function build_quote_taxonomies() {   
	register_taxonomy( 'quote-category', 'quote', 
						array(	'hierarchical' => true, 
								'label' => 'Quote Category', 
								'query_var' => true, 
								'rewrite' => true
								) 
					); 						register_taxonomy( 'content-type', 'quote', 						array(	'hierarchical' => true, 								'label' => 'Content Type', 								'query_var' => true, 								'rewrite' => true								) 					);  					
} 

//add_filter('manage_edit-quote_columns', 'quote_list_columns');
function quote_list_columns($columns) {
	if (!$columns['quote_category']) {
		$new_columns = array();
		foreach($columns as $column_key => $column_val) {
			$new_columns[$column_key] = $column_val;
			if ($column_key == 'title') {
				$new_columns['quote_category'] = 'Quote Category';				//$new_columns['content_type'] = 'Content Type';
			}
		}
		$columns = $new_columns;
	}
    return $columns;
}

//add_action('manage_quote_posts_custom_column', 'quote_list_columns_value', 10, 2);
function quote_list_columns_value($name, $post_id) {
	switch ($name) {
		case 'quote_category':
			$quote_category = get_the_term_list( $post_id, 'quote-category', '', ', ', '' );  
            echo $quote_category;  
		break;			case 'content_type':			$content_type = get_the_term_list( $post_id, 'content-type', '', ', ', '' );              echo $content_type;  		break;		
	}
}


add_action( 'restrict_manage_posts', 'quote_filter_fields' );
function quote_filter_fields() {
    global $typenow, $wpdb;
	if ($typenow == 'quote') {
		$cats = get_categories('type=quote&hide_empty=0&hierarchical=0&taxonomy=quote-category');
		if (count($cats) > 0) {
?>
	<select name="quote-category">
	  <option value="">All Quote Categories</option>
	  <?php foreach($cats as $cat) { $s = ''; if ($_GET['quote-category'] == $cat->term_id) { $s = ' SELECTED'; } ?>
	  <option value="<?php echo $cat->term_id; ?>"<?php echo $s; ?>><?php echo $cat->name; ?></option>
	  <?php } ?>
	</select>
<?php
		} ?>		<?php
	}
}

//add_action( 'request', 'quote_posts_request' );
function quote_posts_request($request) {
	global $pagenow;
	if (is_admin() && $pagenow == 'edit.php' && isset($request['post_type']) && $request['post_category'] == 'quote') {
		//$request['order'] = 'desc';
		//$request['orderby'] = 'menu_order';
		//if (strlen($request['quote-category'])) {
		//	$request['quote-category'] = get_term($request['quote-category'],'quote-category')->slug;
		//}						
	}
	return $request;
}
?>