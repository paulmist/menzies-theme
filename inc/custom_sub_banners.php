<?php 

// Sub Banners

function custom_post_banners() {
  $labels = array(
    'name'               => _x( 'Sub Banners', 'post type general name' ),
    'singular_name'      => _x( 'Sub Banners', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'banners' ),
    'add_new_item'       => __( 'Add New Sub Banners' ),
    'edit_item'          => __( 'Edit Sub Banners' ),
    'new_item'           => __( 'New Sub Banners' ),
    'all_items'          => __( 'All Sub Banners' ),
    'view_item'          => __( 'View Sub Banners' ),
    'search_items'       => __( 'Search Sub Banners' ),
    'not_found'          => __( 'No banners found' ),
    'not_found_in_trash' => __( 'No banners found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Sub Banners'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our bannerss and banners specific data',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => true,
  );
  register_post_type( 'banners', $args ); 
}
add_action( 'init', 'custom_post_banners' );

//Sub Banners Interaction Messages
function my_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['banners'] = array(
    0 => '', 
    1 => sprintf( __('Sub Banners updated. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Sub Banners updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Sub Banners restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Sub Banners published. <a href="%s">View banners</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Sub Banners saved.'),
    8 => sprintf( __('Sub Banners submitted. <a target="_blank" href="%s">Preview banners</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Sub Banners scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Sub Banners draft updated. <a target="_blank" href="%s">Preview banners</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_updated_messages' );

//Sub Banners Taxonomy
function my_taxonomies_banners() {
  $labels = array(
    'name'              => _x( 'Sub Banners Slots', 'taxonomy general name' ),
    'singular_name'     => _x( 'Sub Banners Slot', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Sub Banners Slots' ),
    'all_items'         => __( 'All Sub Banners Slots' ),
    'parent_item'       => __( 'Parent Sub Banners Slot' ),
    'parent_item_colon' => __( 'Parent Sub Banners Slot:' ),
    'edit_item'         => __( 'Edit Sub Banners Slot' ), 
    'update_item'       => __( 'Update Sub Banners Slot' ),
    'add_new_item'      => __( 'Add New Sub Banners Slot' ),
    'new_item_name'     => __( 'New Sub Banners Slot' ),
    'menu_name'         => __( 'Sub Banners Slots' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'banners_category', 'banners', $args );
}
add_action( 'init', 'my_taxonomies_banners', 0 );

?>