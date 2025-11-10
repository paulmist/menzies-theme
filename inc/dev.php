<?php

// Miscellaneous bits n shits

// ACF options section
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page();
}

// Except length
function custom_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Get page by slug - legacy function carried over from the old theme.
function get_page_by_slug($slug){
	global $wpdb;
	$query = "SELECT * FROM {$wpdb->posts} WHERE {$wpdb->posts}.post_name = '".$slug."' AND  {$wpdb->posts}.post_type = 'page' AND {$wpdb->posts}.post_status = 'publish' ";
	$page = $wpdb->get_row($query);
	return $page;
}

// image sizes
// add_image_size( 'author-thumbnail', 80, 80, TRUE );
add_image_size( 'partners_size', 150, 150, true );
add_image_size( 'award_thumb', 190, 68 );

add_image_size( 'carousel-bg', 1500, 431, true );

// Check is site is passworded (dev mode) and pass teh credentials to FacetWP
add_filter( 'http_request_args', function( $args, $url ) {
    if ( 0 === strpos( $url, get_site_url() ) ) {
        $args['headers'] = array(
            'Authorization' => 'Basic ' . base64_encode( 'menziestheme:5b67e9fe' )
        );
    }
    return $args;
}, 10, 2 );


// FacetsWP Support
add_filter( 'facetwp_is_main_query', function( $bool, $query ) {
    return ( true === $query->get( 'facetwp' ) ) ? true : $bool;
}, 10, 2 );

// do a pre_get_posts to include events in Insight (main blog) view

add_action( 'pre_get_posts', 'add_events_blogindex' );
function add_events_blogindex( $query ) {
	if ( !is_admin() && is_home() && $query->is_main_query() ) :
		$query->set( 'post_type', array(
			'post', 
			'events' ) );
	endif;
}

// Custom image size for people big images (get rid of white space)
add_image_size( 'people-big-cropped', 490, 490, array( 'left', 'top' ) );

// job title on people admin screen
// Add the custom columns to the people post type:
add_filter( 'manage_people_posts_columns', 'set_custom_edit_people_columns' );
function set_custom_edit_people_columns($columns) {
    $columns['position'] = __( 'Position', 'menziestheme' );

    return $columns;
}

// Add the data to the custom columns for the people post type:
add_action( 'manage_people_posts_custom_column' , 'custom_people_column', 10, 2 );
function custom_people_column( $column, $post_id ) {
    switch ( $column ) {

        case 'position' :
            echo get_post_meta( $post_id , 'position' , true ); 
            break;

    }
}

// Google maps API for ACF
function my_acf_google_map_api( $api ){
    
    $api['key'] = 'AIzaSyCrZrpZ58DoHxxNDRcZuUR-y5idDuh63GU';
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

// disable Yoast Schema JSON-LD
// add_filter( 'disable_wpseo_json_ld_search', '__return_true' );

// facetWP ignore sliders / carousels
add_filter( 'facetwp_is_main_query', function( $is_main_query, $query ) {
    if ( 'sliders' == $query->get( 'post_type' ) || 'banners' == $query->get( 'post_type' ) ) {
        $is_main_query = false;
    }
    return $is_main_query;
}, 10, 2 );


// archive titles
add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});

// disable CF7 on homepage
// function conditionally_load_plugin_js_css(){
//     if( is_front_page() ) {  
//         wp_dequeue_script('contact-form-7'); # Restrict scripts.
//         wp_dequeue_script('google-recaptcha');
//         wp_dequeue_style('contact-form-7'); # Restrict css.
//     }
// add_action( 'wp_enqueue_scripts', 'conditionally_load_plugin_js_css' ); 