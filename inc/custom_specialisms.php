<?php 



add_action('init', 'specialism_custom_post_types');

function specialism_custom_post_types() {



	// Product features

		$labels = array(

			'name' => _x('Specialisms', 'post type general name'),

			'singular_name' => _x('Specialism', 'post type singular name'),

			'add_new' => _x('Add Specialism', 'Support posts'),

			'add_new_item' => __('Add New Specialism'),

			'edit_item' => __('Edit Specialism'),

			'new_item' => __('New Specialism'),

			'view_item' => __('View Specialism'),

			'search_items' => __('Search Specialism'),

			'not_found' =>  __('No Specialism found'),

			'not_found_in_trash' => __('No Specialism posts found in Trash'),

			'parent_item_colon' => ''

		);

		register_post_type(

			'specialism',

			array(

				'labels' => $labels,

				'public' => true,

				'show_ui' => true,

				'hierarchical' => true,				

				'rewrite' => true,

				'exclude_from_search' => false,

				'show_in_nav_menus' => true,

				'supports' => array(

					'title',

					'editor',

					'page-attributes',

					//'thumbnail',

					//'excerpt',

					//'comments',

					//'author'

				)

			)

		);



}

//add_action( 'init', 'build_specialism_taxonomies', 0 );   

  

function build_specialism_taxonomies() {   

	register_taxonomy( 'specialism-category', 'specialism', 

						array(	'hierarchical' => true, 
								'label' => 'Specialism Category', 
								'query_var' => true, 
								'rewrite' => true
								) 

					); 
					
	register_taxonomy( 'content-type', 'specialism', 

						array(	'hierarchical' => true, 
								'label' => 'Content Type', 
								'query_var' => true, 
								'rewrite' => true
								) 

					);

  					

} 



add_filter('manage_edit-specialism_columns', 'specialism_list_columns');

function specialism_list_columns($columns) {

	if (!$columns['people']) {

		$new_columns = array();

		foreach($columns as $column_key => $column_val) {

			$new_columns[$column_key] = $column_val;

			if ($column_key == 'title') {

				$new_columns['sector_head'] = 'Sector Head';
				$new_columns['people'] = 'People';
				//$new_columns['content_type'] = 'Content Type';

			}

		}

		$columns = $new_columns;

	}

    return $columns;

}



add_action('manage_specialism_posts_custom_column', 'specialism_list_columns_value', 10, 2);

function specialism_list_columns_value($name, $post_id) {

	switch ($name) {

		case 'sector_head':
			$sector_head = get_field('specialism_head', $post_id);
			if(!empty($sector_head)){
				$thmbnail = get_field('thmbnail', $sector_head->ID);
				if(!empty($thmbnail)){
					$thmbnail_src = $thmbnail['url'];
				}else{
					$thmbnail_src = get_template_directory_uri()."/images/anonymous-user.gif";
				}	
				echo '<p><img src="'.$thmbnail_src.'" alt="'.esc_attr($sector_head->post_title).'" width="32px" align="left">'.$sector_head->post_title.'</p>';	
			}
		break;
		case 'people':
					$people_args = array('post_type'=>'people', 'posts_per_page'=>-1, 'post_status'=>'publish' );
					$people_args['meta_query'][] = array(										
										'key' => 'related_specialisms', 
										'value' => '"' . $post_id . '"',
										'compare' => 'LIKE'
										);
					
					$head = get_field('specialism_head', $post_id);
				
			
					$people_query = new WP_Query( $people_args );
					//echo $people_query->request;
					if ( $people_query->have_posts() ) {	
						echo '<div class="people-admin"><ul>';
						while ( $people_query->have_posts() ){ $people_query->the_post();
							
							$thmbnail = get_field('thmbnail', get_the_ID());
							if(!empty($thmbnail)){
								$thmbnail_src = $thmbnail['url'];
							}else{
								$thmbnail_src = get_template_directory_uri()."/images/anonymous-user.gif";
							}														
							echo '<li><img src="'.$thmbnail_src.'" alt="'.esc_attr(get_the_title()).'" width="32px">'.get_the_title().'</li>';						
						}
						echo '</ul></div>';
					} 
			
					wp_reset_postdata();
		break;
		case 'content_type':
			$content_type = get_the_term_list( $post_id, 'content-type', '', ', ', '' );  
            echo $content_type;  
		break;		

	}

}





//add_action( 'restrict_manage_posts', 'specialism_filter_fields' );

function specialism_filter_fields() {

    global $typenow, $wpdb;

	if ($typenow == 'specialism') {

		$cats = get_categories('type=specialism&hide_empty=0&hierarchical=0&taxonomy=specialism-category');

		if (count($cats) > 0) {

?>

	<select name="specialism-category">

	  <option value="">All Specialism Categories</option>

	  <?php foreach($cats as $cat) { $s = ''; if ($_GET['specialism-category'] == $cat->term_id) { $s = ' SELECTED'; } ?>

	  <option value="<?php echo $cat->term_id; ?>"<?php echo $s; ?>><?php echo $cat->name; ?></option>

	  <?php } ?>

	</select>

<?php

		}

	}

}



//add_action( 'request', 'specialism_posts_request' );

function specialism_posts_request($request) {

	global $pagenow;

	if (is_admin() && $pagenow == 'edit.php' && isset($request['post_type']) && $request['post_category'] == 'specialism') {

		//$request['order'] = 'desc';

		//$request['orderby'] = 'menu_order';

		if (strlen($request['specialism-category'])) {

			$request['specialism-category'] = get_term($request['specialism-category'],'specialism-category')->slug;

		}

	}

	return $request;

}

?>