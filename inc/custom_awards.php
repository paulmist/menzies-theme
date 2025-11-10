<?php 

// Awards CPT

function custom_post_awards() {
  $labels = array(
    'name'               => _x( 'Awards', 'post type general name' ),
    'singular_name'      => _x( 'Awards', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'awards' ),
    'add_new_item'       => __( 'Add New Awards' ),
    'edit_item'          => __( 'Edit Awards' ),
    'new_item'           => __( 'New Awards' ),
    'all_items'          => __( 'All Awards' ),
    'view_item'          => __( 'View Awards' ),
    'search_items'       => __( 'Search Awards' ),
    'not_found'          => __( 'No awards found' ),
    'not_found_in_trash' => __( 'No awards found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Awards'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our awards and awards specific data',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'awards', $args ); 
}
add_action( 'init', 'custom_post_awards' );

//Awards Interaction Messages
function my_awards_messages( $messages ) {
  global $post, $post_ID;
  $messages['awards'] = array(
    0 => '', 
    1 => sprintf( __('Awards updated. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Awards updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Awards restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Awards published. <a href="%s">View awards</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Awards saved.'),
    8 => sprintf( __('Awards submitted. <a target="_blank" href="%s">Preview awards</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Awards scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Awards draft updated. <a target="_blank" href="%s">Preview awards</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_awards_messages' );

//Awards Taxonomy
function my_taxonomies_awards() {
  $labels = array(
    'name'              => _x( 'Awards Slots', 'taxonomy general name' ),
    'singular_name'     => _x( 'Awards Slot', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Awards Slots' ),
    'all_items'         => __( 'All Awards Slots' ),
    'parent_item'       => __( 'Parent Awards Slot' ),
    'parent_item_colon' => __( 'Parent Awards Slot:' ),
    'edit_item'         => __( 'Edit Awards Slot' ), 
    'update_item'       => __( 'Update Awards Slot' ),
    'add_new_item'      => __( 'Add New Awards Slot' ),
    'new_item_name'     => __( 'New Awards Slot' ),
    'menu_name'         => __( 'Awards Slots' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'awards_category', 'awards', $args );
}
add_action( 'init', 'my_taxonomies_awards', 0 );