<?php 



add_action('init', 'people_custom_post_types');

function people_custom_post_types() {



	// Product features

		$labels = array(

			'name' => _x('Peoples', 'post type general name'),

			'singular_name' => _x('People', 'post type singular name'),

			'add_new' => _x('Add People', 'Support posts'),

			'add_new_item' => __('Add New People'),

			'edit_item' => __('Edit People'),

			'new_item' => __('New People'),

			'view_item' => __('View People'),

			'search_items' => __('Search People'),

			'not_found' =>  __('No People found'),

			'not_found_in_trash' => __('No People posts found in Trash'),

			'parent_item_colon' => ''

		);

		register_post_type(

			'people',

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

					'page-attributes',

					'thumbnail',

					//'excerpt',

					//'comments',

					//'author'

				),
				'taxonomies' => array('post_tag')

			)

		);



}

//add_action( 'init', 'build_people_taxonomies', 0 );   

  

function build_people_taxonomies() {   

	register_taxonomy( 'people-category', 'people', 

						array(	'hierarchical' => true, 
								'label' => 'People Category', 
								'query_var' => true, 
								'rewrite' => true
								) 

					); 
					
	register_taxonomy( 'content-type', 'people', 

						array(	'hierarchical' => true, 
								'label' => 'Content Type', 
								'query_var' => true, 
								'rewrite' => true
								) 

					);

  					

} 



// add_filter('manage_edit-people_columns', 'people_list_columns');

// function people_list_columns($columns) {

// 	if (!$columns['people_category']) {

// 		$new_columns = array();

// 		foreach($columns as $column_key => $column_val) {

// 			$new_columns[$column_key] = $column_val;

// 			if ($column_key == 'cb') {

// 				$new_columns['photo'] = 'Photo';
// 				//$new_columns['content_type'] = 'Content Type';

// 			}
// 			if ($column_key == 'title') {
// 				$new_columns['specialisms'] = 'Specialisms';
// 				$new_columns['sectors'] = 'Sectors';
// 				$new_columns['office'] = 'Office';
// 				$new_columns['psector'] = 'Business Services';
// 			}
// 		}

// 		$columns = $new_columns;

// 	}

//     return $columns;

// }



// add_action('manage_people_posts_custom_column', 'people_list_columns_value', 10, 2);

// function people_list_columns_value($name, $post_id) {

// 	switch ($name) {
// 		case 'photo':
// 			//$post_thumbnail_id = get_post_thumbnail_id($post->ID);
// 			$thmbnail = get_field('thmbnail', $post->ID);
// 			$post_thumbnail_id = $thmbnail['id'];
			
// 			if($post_thumbnail_id){ 
// 				$photo = '<img src="'.get_thumb($post_thumbnail_id, 90, 90, true).'">';
// 			}else{
// 				$photo = '';
// 			}
//             echo $photo;  
// 		break;
// 		case 'specialisms':
// 			$specialisms = get_field('related_specialisms',  $post_id);
// 			$sp_html = '';
// 			if(!empty($specialisms)){
// 				foreach($specialisms as $sp){
// 					$sp_html .= ' '.$sp->post_title;
// 				}
// 			}
//             echo $sp_html;  
// 		break;	
// 		case 'sectors':
// 			$sectors = get_field('related_sectors',  $post_id);
// 			$sc_html = '';
// 			if(!empty($sectors)){
// 				foreach($sectors as $sc){
// 					$sc_html .= ' '.$sc->post_title;
// 				}
// 			}
//             echo $sc_html;  
// 		break;		
// 		case 'psector':
// 			$psectors = get_field('related_psector',  $post_id);
// 			$sc_html = '';
// 			if(!empty($psectors)){
// 				foreach($psectors as $psc){
// 					$sc_html .= ' '.$psc->post_title;
// 				}
// 			}
//             echo $sc_html;  
// 		break;		
// 		case 'office':
// 			$office = get_field('related_office',  $post_id);
// 			$of_html = '';
// 			if(!empty($office)){
// 					$of_html .= ' '.$office->post_title;
// 			}
//             echo $of_html;  
// 		break;		
				
// 		case 'content_type':
// 			$content_type = get_the_term_list( $post_id, 'content-type', '', ', ', '' );  
//             echo $content_type;  
// 		break;		

// 	}

// }





add_action( 'restrict_manage_posts', 'people_filter_fields' );

function people_filter_fields() {

    global $typenow, $wpdb, $wp_query;

	if ($typenow == 'people') {
	
		$sectors = get_posts(array('post_type'=>'sector', 'posts_per_page'=>-1, 'orderby'=>'menu_order', 'order'=>'asc'));

		if (count($sectors) > 0) {

?>

	<select name="sector_id">

	  <option value="">All sectors</option>

	  <?php foreach($sectors as $sc) { $s = ''; if ($_GET['sector_id'] == $s�->ID) { $s = ' SELECTED'; } ?>

	  <option value="<?php echo $sc->ID; ?>"<?php echo $s; ?>><?php echo $sc->post_title; ?></option>

	  <?php } ?>

	</select>
<?php
		}	
	
		$specialisms = get_posts(array('post_type'=>'specialism', 'posts_per_page'=>-1, 'orderby'=>'menu_order', 'order'=>'asc'));

		if (count($specialisms) > 0) {

?>

	<select name="specialism_id">

	  <option value="">All specialismss</option>

	  <?php foreach($specialisms as $sp) { $s = ''; if ($_GET['specialism_id'] == $sp->ID) { $s = ' SELECTED'; } ?>

	  <option value="<?php echo $sp->ID; ?>"<?php echo $s; ?>><?php echo $sp->post_title; ?></option>

	  <?php } ?>

	</select>
<?php
		}

		
		$offices = get_posts(array('post_type'=>'office', 'posts_per_page'=>-1, 'orderby'=>'menu_order', 'order'=>'asc'));

		if (count($offices) > 0) {

?>

	<select name="office_id">

	  <option value="">All offices</option>

	  <?php foreach($offices as $sp) { $s = ''; if ($_GET['office_id'] == $sp->ID) { $s = ' SELECTED'; } ?>

	  <option value="<?php echo $sp->ID; ?>"<?php echo $s; ?>><?php echo $sp->post_title; ?></option>

	  <?php } ?>

	</select>
<?php
		}		
		
		
	}

}



add_action( 'request', 'people_posts_request' );

function people_posts_request($request) {

	global $pagenow;

	if (is_admin() && $pagenow == 'edit.php' && isset($request['post_type']) && $request['post_type'] == 'people') {

		$request['order'] = 'asc';
		$request['orderby'] = 'title';

		//if (strlen($request['specialism_id'])) {
		
		if (!empty($_GET['sector_id'])) {

			$request['meta_query'][] = array(										
											'key' => 'related_sectors', // name of custom field
											'value' => '"' . $_GET['sector_id'] . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
											'compare' => 'LIKE'
										);	
		}		
		
		
		if (!empty($_GET['specialism_id'])) {

			$request['meta_query'][] = array(										
											'key' => 'related_specialisms', // name of custom field
											'value' => '"' . $_GET['specialism_id'] . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
											'compare' => 'LIKE'
										);	
		}

		if (!empty($_GET['office_id'])) {

			$request['meta_query'][] = array(										
											'key' => 'related_office', // name of custom field
											'value' => $_GET['office_id'], // matches exaclty "123", not just 123. This prevents a match for "1234"
											'compare' => '=='
										);	
		}
		
		
		if(isset($request['meta_query']) && is_array($request['meta_query']) && count($request['meta_query']) > 1){
			$request['meta_query']['relation'] = 'AND';
		}
			//echo '<pre>';
			//print_r($request);	
			//echo '</pre>';	
	}


	return $request;

}

?>