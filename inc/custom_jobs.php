<?php 

// Careers

function custom_post_careers() {
  $labels = array(
    'name'               => _x( 'Careers', 'post type general name' ),
    'singular_name'      => _x( 'Careers', 'post type singular name' ),
    'add_new'            => _x( 'Add New', 'careers' ),
    'add_new_item'       => __( 'Add New Career' ),
    'edit_item'          => __( 'Edit Career' ),
    'new_item'           => __( 'New Career' ),
    'all_items'          => __( 'All Careers' ),
    'view_item'          => __( 'View Career' ),
    'search_items'       => __( 'Search Careers' ),
    'not_found'          => __( 'No careers found' ),
    'not_found_in_trash' => __( 'No careers found in the Trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Careers'
  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Holds our careers and career specific data',
    'public'        => true,
    'menu_position' => 7,
    'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
    'has_archive'   => false,
  );
  register_post_type( 'careers', $args ); 
}
add_action( 'init', 'custom_post_careers' );

//Careers Interaction Messages
function my_careers_messages( $messages ) {
  global $post, $post_ID;
  $messages['careers'] = array(
    0 => '', 
    1 => sprintf( __('Careers updated. <a href="%s">View product</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Careers updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Careers restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Careers published. <a href="%s">View careers</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Careers saved.'),
    8 => sprintf( __('Careers submitted. <a target="_blank" href="%s">Preview careers</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Careers scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview product</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Careers draft updated. <a target="_blank" href="%s">Preview careers</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'my_careers_messages' );

// Careers Taxonomy
function my_taxonomies_careers() {
  $labels = array(
    'name'              => _x( 'Career categories', 'taxonomy general name' ),
    'singular_name'     => _x( 'Career category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search career categories' ),
    'all_items'         => __( 'All career categories' ),
    'parent_item'       => __( 'Parent career category' ),
    'parent_item_colon' => __( 'Parent career category:' ),
    'edit_item'         => __( 'Edit career category' ), 
    'update_item'       => __( 'Update career category' ),
    'add_new_item'      => __( 'Add New Career category' ),
    'new_item_name'     => __( 'New career category' ),
    'menu_name'         => __( 'career categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'careers_category', 'careers', $args );
}
add_action( 'init', 'my_taxonomies_careers', 0 );

?>