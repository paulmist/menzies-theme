<?php 

// Partners CPT

function custom_post_partners() {
  $labels = array(
    'name'               => _x( 'Partners', 'post type general name' ),
    'singular_name'      => _x( 'Partner', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'partners' ),
    'add_new_item'       => __( 'Add New Partner' ),
    'edit_item'          => __( 'Edit Partner' ),
    'new_item'           => __( 'New Partner' ),
    'all_items'          => __( 'All Partners' ),
    'view_item'          => __( 'View Partners' ),
    'search_items'       => __( 'Search Partners' ),
    'not_found'          => __( 'No partners found' ),
    'not_found_in_trash' => __( 'No partners found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Partners'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our partners and partners specific data',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'partners', $args ); 
}
add_action( 'init', 'custom_post_partners' );

//Partners Interaction Messages
function my_partners_messages( $messages ) {
  global $post, $post_ID;
  $messages['partners'] = array(
    0 => '', 
    1 => sprintf( __('Partners updated. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Partners updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Partners restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Partners published. <a href="%s">View partners</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Partners saved.'),
    8 => sprintf( __('Partners submitted. <a target="_blank" href="%s">Preview partners</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Partners scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Partners draft updated. <a target="_blank" href="%s">Preview partners</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_partners_messages' );

//Partners Taxonomy
function my_taxonomies_partners() {
  $labels = array(
    'name'              => _x( 'Partner Slots', 'taxonomy general name' ),
    'singular_name'     => _x( 'Partner Slot', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Partners Slots' ),
    'all_items'         => __( 'All Partners Slots' ),
    'parent_item'       => __( 'Parent Partner Slot' ),
    'parent_item_colon' => __( 'Parent Partner Slot:' ),
    'edit_item'         => __( 'Edit Partner Slot' ), 
    'update_item'       => __( 'Update Partner Slot' ),
    'add_new_item'      => __( 'Add New Partner Slot' ),
    'new_item_name'     => __( 'New Partner Slot' ),
    'menu_name'         => __( 'Partner Slots' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'partners_category', 'partners', $args );
}
add_action( 'init', 'my_taxonomies_partners', 0 );