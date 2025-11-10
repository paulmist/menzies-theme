<?php 



add_action('init', 'office_custom_post_types');

function office_custom_post_types() {



	// Product features

		$labels = array(

			'name' => _x('Offices', 'post type general name'),

			'singular_name' => _x('Office', 'post type singular name'),

			'add_new' => _x('Add Office', 'Support posts'),

			'add_new_item' => __('Add New Office'),

			'edit_item' => __('Edit Office'),

			'new_item' => __('New Office'),

			'view_item' => __('View Office'),

			'search_items' => __('Search Office'),

			'not_found' =>  __('No Office found'),

			'not_found_in_trash' => __('No Office posts found in Trash'),

			'parent_item_colon' => ''

		);

		register_post_type(

			'office',

			array(

				'labels' => $labels,

				'public' => true,

				'show_ui' => true,

				'hierarchical' => false,				

				'rewrite' => true,

				'exclude_from_search' => false,

				'show_in_nav_menus' => true,

				'show_in_rest' => true,

				'supports' => array(

					'title',

					'editor',

					'page-attributes',
					
					'custom-fields',

					'editor'

					//'thumbnail',

					//'excerpt',

					//'comments',

					//'author'

				)

			)

		);



}

//add_action( 'init', 'build_office_taxonomies', 0 );   

  

function build_office_taxonomies() {   

	register_taxonomy( 'office-category', 'office', 

						array(	'hierarchical' => true, 
								'label' => 'Office Category', 
								'query_var' => true, 
								'rewrite' => true
								) 

					); 
					
	register_taxonomy( 'content-type', 'office', 

						array(	'hierarchical' => true, 
								'label' => 'Content Type', 
								'query_var' => true, 
								'rewrite' => true
								) 

					);

  					

} 



add_filter('manage_edit-office_columns', 'office_list_columns');

function office_list_columns($columns) {

	if (!$columns['office_category']) {

		$new_columns = array();

		foreach($columns as $column_key => $column_val) {

			$new_columns[$column_key] = $column_val;

			if ($column_key == 'title') {

				$new_columns['address'] = 'Address';
				$new_columns['people'] = 'People';

			}

		}

		$columns = $new_columns;

	}

    return $columns;

}



add_action('manage_office_posts_custom_column', 'office_list_columns_value', 10, 2);

function office_list_columns_value($name, $post_id) {

	switch ($name) {

		case 'address':
			$office_address = get_field('office_address', $post_id);  
            echo $office_address;  
		break;	
		case 'map_image':
			$map_image = get_field('map_image', $post_id);  
            if(!empty($map_image)) echo '<img src="'.$map_image['url'].'" width="60px" height="45px">';  
		break;		
		case 'content_type':
			$content_type = get_the_term_list( $post_id, 'content-type', '', ', ', '' );  
            echo $content_type;  
		break;
		case 'people':
					$people_args = array('post_type'=>'people', 'posts_per_page'=>-1, 'post_status'=>'publish' );
					$people_args['meta_query'][] = array(										
											'key' => 'related_office',
											'value' => $post_id,
											'compare' => '=='
										);
					$people_query = new WP_Query( $people_args );
					//echo $people_query->request;
					if ( $people_query->have_posts() ) {	
						echo '<div class="people-admin"><ul>';
						while ( $people_query->have_posts() ){ $people_query->the_post();
							$office_leader = get_field('office_leader', get_the_ID());
							$thmbnail = get_field('thmbnail', get_the_ID());
							if(!empty($thmbnail)){
								$thmbnail_src = $thmbnail['url'];
							}else{
								$thmbnail_src = get_template_directory_uri()."/images/anonymous-user.gif";
							}							
							
							if($office_leader == 1){ $style = 'style="color: red"'; }else{ $style = '';} 
							echo '<li '.$style.'><img src="'.$thmbnail_src.'" alt="'.get_the_title().'" width="32px">'.get_the_title().'</li>';						
						}
						echo '</ul></div>';
					} 
					wp_reset_postdata();
		break;			
		case 'sector':
			$content_type = get_the_term_list( $post_id, 'content-type', '', ', ', '' );  
            echo $content_type;  
		break;			

	}

}





//add_action( 'restrict_manage_posts', 'office_filter_fields' );

function office_filter_fields() {

    global $typenow, $wpdb;

	if ($typenow == 'office') {

		$cats = get_categories('type=office&hide_empty=0&hierarchical=0&taxonomy=office-category');

		if (count($cats) > 0) {

?>

	<select name="office-category">

	  <option value="">All Office Categories</option>

	  <?php foreach($cats as $cat) { $s = ''; if ($_GET['office-category'] == $cat->term_id) { $s = ' SELECTED'; } ?>

	  <option value="<?php echo $cat->term_id; ?>"<?php echo $s; ?>><?php echo $cat->name; ?></option>

	  <?php } ?>

	</select>

<?php

		}

	}

}



//add_action( 'request', 'office_posts_request' );

function office_posts_request($request) {

	global $pagenow;

	if (is_admin() && $pagenow == 'edit.php' && isset($request['post_type']) && $request['post_category'] == 'office') {

		//$request['order'] = 'desc';

		//$request['orderby'] = 'menu_order';

		if (strlen($request['office-category'])) {

			$request['office-category'] = get_term($request['office-category'],'office-category')->slug;

		}

	}

	return $request;

}


add_action( 'save_post_office', 'save_office_calback', 10, 2 );

function save_office_calback($post_id){

	if(!empty($_REQUEST['fields']['field_56260c84148f1'])){
		$address = $_REQUEST['fields']['field_56260c84148f1'];
		
		$address = str_replace("\r\n", " ", $address);
		$invalid_chars = array( " " => "+", "," => "", "?" => "", "&" => "", "=" => "" , "#" => "" );
		$address   = trim( strtolower( str_replace( array_keys( $invalid_chars ), array_values( $invalid_chars ), $address ) ) );
		
		
		if ( empty( $address ) ) {
			return false;
		}		
	
		$transient_name              = 'jm_geocode_' . md5( $address );
		$geocoded_address            = get_transient( $transient_name );
		$jm_geocode_over_query_limit = get_transient( 'jm_geocode_over_query_limit' );	
	
		try {
			//if ( false === $geocoded_address || empty( $geocoded_address->results[0] ) ) {
				
				$result = wp_remote_get(
					"http://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false",
					array(
						'timeout'     => 5,
					    'redirection' => 1,
					    'httpversion' => '1.1',
					    'user-agent'  => 'WordPress/WP-Job-Manager-Menzies; ' . get_bloginfo( 'url' ),
					    'sslverify'   => false
				    )
				);
						
	//echo '<pre>';
	//print_r($result);
	//echo '</pre>';						
				$result           = wp_remote_retrieve_body( $result );
				$geocoded_address = json_decode( $result );

	//echo '<pre>';
	//print_r($geocoded_address);
	//echo '</pre>';				
				
				if ( $geocoded_address->status ) {
					switch ( $geocoded_address->status ) {
						case 'ZERO_RESULTS' :
							throw new Exception( __( "No results found", 'wp-job-manager' ) );
						break;
						case 'OVER_QUERY_LIMIT' :
							set_transient( 'jm_geocode_over_query_limit', 1, HOUR_IN_SECONDS );
							throw new Exception( __( "Query limit reached", 'wp-job-manager' ) );
						break;
						case 'OK' :
							if ( ! empty( $geocoded_address->results[0] ) ) {
								set_transient( $transient_name, $geocoded_address, 24 * HOUR_IN_SECONDS * 365 );
							} else {
								throw new Exception( __( "Geocoding error", 'wp-job-manager' ) );
							}
						break;
						default :
							throw new Exception( __( "Geocoding error", 'wp-job-manager' ) );
						break;
					}
				} else {
					throw new Exception( __( "Geocoding error", 'wp-job-manager' ) );
				}
			//}
		} catch ( Exception $e ) {
			return new WP_Error( 'error', $e->getMessage() );
		}

		$address                      = array();
		$address['lat']               = sanitize_text_field( $geocoded_address->results[0]->geometry->location->lat );
		$address['long']              = sanitize_text_field( $geocoded_address->results[0]->geometry->location->lng );
		$address['formatted_address'] = sanitize_text_field( $geocoded_address->results[0]->formatted_address );

		if ( ! empty( $geocoded_address->results[0]->address_components ) ) {
			$address_data             = $geocoded_address->results[0]->address_components;
			$address['street_number'] = false;
			$address['street']        = false;
			$address['city']          = false;
			$address['state_short']   = false;
			$address['state_long']    = false;
			$address['postcode']      = false;
			$address['country_short'] = false;
			$address['country_long']  = false;

			foreach ( $address_data as $data ) {
				switch ( $data->types[0] ) {
					case 'street_number' :
						$address['street_number'] = sanitize_text_field( $data->long_name );
					break;
					case 'route' :
						$address['street']        = sanitize_text_field( $data->long_name );
					break;
					case 'sublocality_level_1' :
					case 'locality' :
					case 'postal_town' :
						$address['city']          = sanitize_text_field( $data->long_name );
					break;
					case 'administrative_area_level_1' :
					case 'administrative_area_level_2' :
						$address['state_short']   = sanitize_text_field( $data->short_name );
						$address['state_long']    = sanitize_text_field( $data->long_name );
					break;
					case 'postal_code' :
						$address['postcode']      = sanitize_text_field( $data->long_name );
					break;
					case 'country' :
						$address['country_short'] = sanitize_text_field( $data->short_name );
						$address['country_long']  = sanitize_text_field( $data->long_name );
					break;
				}
			}
			
	//echo '<pre>';
	//print_r($address);
	//echo '</pre>';	
	
			update_post_meta($post_id, 'geodata', $address);
		}
		 
	
	
	}
	

}
?>