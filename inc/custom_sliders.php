<?php 

// Sliders CPT

function custom_post_sliders() {
  $labels = array(
    'name'               => _x( 'Sliders', 'post type general name' ),
    'singular_name'      => _x( 'Slider', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'sliders' ),
    'add_new_item'       => __( 'Add New Slider' ),
    'edit_item'          => __( 'Edit Slider' ),
    'new_item'           => __( 'New Slider' ),
    'all_items'          => __( 'All Sliders' ),
    'view_item'          => __( 'View Sliders' ),
    'search_items'       => __( 'Search Sliders' ),
    'not_found'          => __( 'No sliders found' ),
    'not_found_in_trash' => __( 'No sliders found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Sliders'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our sliders and sliders specific data',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'sliders', $args ); 
}
add_action( 'init', 'custom_post_sliders' );

//Sliders Interaction Messages

function my_sliders_messages( $messages ) {
  global $post, $post_ID;
  $messages['sliders'] = array(
    0 => '', 
    1 => sprintf( __('Slider updated. <a href="%s">View slider</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Slider updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Slider restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Slider published. <a href="%s">View sliders</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Sliders saved.'),
    8 => sprintf( __('Slider submitted. <a target="_blank" href="%s">Preview sliders</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Slider scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Slider draft updated. <a target="_blank" href="%s">Preview sliders</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_sliders_messages' );